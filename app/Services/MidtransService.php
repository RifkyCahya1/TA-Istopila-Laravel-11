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

    public function createTransaction($order_id, $amount, $params)
    {
        try {
            $response = $this->client->post($this->baseUrl, [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($this->serverKey . ':'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'transaction_details' => [
                        'order_id' => $order_id,
                        'gross_amount' => $amount,
                    ],
                    'customer_details' => $params,
                ],
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);
            Log::info('Midtrans createTransaction response:', $responseBody);

            return $responseBody;
        } catch (RequestException $e) {
            Log::error('Midtrans createTransaction error:', ['message' => $e->getMessage()]);
            return null;
        }
    }
}

