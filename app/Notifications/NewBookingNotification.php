<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
{
    use Queueable;
    public $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking)
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
                    ->subject('حجز ملكي جديد ⚓ - ' . $this->booking->customer_name)
                    ->greeting('أهلاً بك يا مدير،')
                    ->line('لقد تلقيت طلب حجز جديد عبر الموقع الإلكتروني.')
                    ->line('**تفاصيل الحجز:**')
                    ->line('الاسم: ' . $this->booking->customer_name)
                    ->line('الهاتف: ' . $this->booking->customer_phone)
                    ->line('التاريخ: ' . $this->booking->trip_date)
                    ->line('التوقيت: ' . $this->booking->trip_time)
                    ->action('عرض كافة الحجوزات', url('/admin/bookings')) // رابط لوحة تحكم فيلامينت
                    ->line('شكراً لاستخدامك نظام الحجز الملكي!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
