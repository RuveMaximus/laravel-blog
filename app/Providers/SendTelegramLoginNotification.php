<?php

namespace App\Providers;

use App\Providers\Logined;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class SendTelegramLoginNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logined $event): void
    {
        $now = now();
        $user = $event->user;

        if (is_null($event->user->telegram_id)) {
            return;
        }

        // Лучше, чтобы это было сделанно через Job
        Http::post('https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage', [
            'chat_id' => $event->user->telegram_id,
            'text' => "Выполнен вход в аккаунт $user->name ($user->email)!\n\nДата и время: $now"
        ]);
    }
}
