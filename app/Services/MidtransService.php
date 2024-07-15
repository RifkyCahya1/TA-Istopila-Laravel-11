<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class MidtransService
{
    protected $client;
    protected $serverKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => storage_path('app/cacert.pem'),
        ]);
        $this->serverKey = config('services.midtrans.server_key');
        $this->baseUrl = config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/v1/transactions' : 'https://app.sandbox.midtrans.com/snap/v1/transactions';
    }

    public function createTransaction($orderId, $amount, $params)
    {
        $endpoint = $this->baseUrl;
        $data = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int)$amount,
            ],
            'customer_details' => [
                'first_name' => $params['first_name'],
                'email' => $params['email'],
                'phone' => $params['phone'],
            ],
            'item_details' => [
                [
                    'id' => 'item1',
                    'price' => (int)$amount,
                    'quantity' => 1,
                    'name' => 'Item Name'
                ]
            ],
            'credit_card' => [
                'secure' => true
            ],
        ];

        try {
            $response = $this->client->post($endpoint, [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($this->serverKey . ':'),
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Logging the response
            Log::info('Midtrans response: ', $responseBody);

            if (is_null($responseBody) || !isset($responseBody['token'])) {
                Log::error('Invalid Midtrans response: ', ['response' => $responseBody]);
                return null;
            }

            return $responseBody;
        } catch (RequestException $e) {
            // Log the error
            Log::error('Midtrans API error: ' . $e->getMessage());
            Log::error('Request data: ', $data);
            if ($e->hasResponse()) {
                Log::error('Response: ' . $e->getResponse()->getBody()->getContents());
            }
            return null;
        }
    }
}
