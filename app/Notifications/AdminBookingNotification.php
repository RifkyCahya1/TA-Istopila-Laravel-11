<?php

namespace App\Notifications;

use App\Models\booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminBookingNotification extends Notification
{
    use Queueable;

    protected $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct(booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello Admin,')
                    ->line('A new booking has been made.')
                    ->line('Booking Details:')
                    ->line('Name: ' . $this->booking->nama)
                    ->line('Email: ' . $this->booking->email)
                    ->line('Phone: ' . $this->booking->phone)
                    ->line('Date and Time: ' . $this->booking->date)
                    ->line('Location: ' . $this->booking->alamat)
                    ->line('Package: ' . $this->booking->paket)
                    ->line('Price: Rp ' . number_format($this->booking->harga, 0, ',', '.'))
                    ->action('View Booking', url('/admin/bookings/' . $this->booking->id))
                    ->line('Please follow up on this booking.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'nama' => $this->booking->nama,
            'email' => $this->booking->email,
            'phone' => $this->booking->phone,
            'date' => $this->booking->date,
            'alamat' => $this->booking->alamat,
            'paket' => $this->booking->paket,
            'harga' => $this->booking->harga,
        ];
    }
}
