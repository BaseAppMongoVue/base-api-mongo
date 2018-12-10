<?php

namespace OdontoInn\Listeners\Log\User;

use OdontoInn\Events\Log\User\UserAuthenticateEvent;
use OdontoInn\Models\Log;
use OdontoInn\Traits\RequestHeadersTrait;

class UserAuthenticateListener
{

    use RequestHeadersTrait;

    /**
     * Handle the event.
     *
     * @param UserAuthenticateEvent $event
     */
    public function handle(UserAuthenticateEvent $event)
    {
        Log::create([
            'user_id' => $event->user->id,
            'headers' => $this->requestHeaders(),
        ]);
    }
}
