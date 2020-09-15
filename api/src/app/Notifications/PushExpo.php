<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\ExpoPushNotifications\ExpoChannel;
use NotificationChannels\ExpoPushNotifications\ExpoMessage;

class PushExpo extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var array
     */
    protected $data;


    /**
     * Create a new notification instance.
     * @param  string  $title
     * @param  string  $body
     * @param  array  $data
     * @return void
     */
    public function __construct(string $title, string $body, array $data = null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ExpoChannel::class];
    }

    public function toExpoPush($notifiable)
    {
        // リソースに関してはドキュメント参照
        // https://github.com/Alymosul/laravel-exponent-push-notifications#available-message-methods
        $message = ExpoMessage::create()
            ->enableSound()
            ->title($this->title)
            ->body($this->body);

        if (!empty($this->data)) {
            $message->setJsonData($this->data);
        }

        return $message;
    }
}
