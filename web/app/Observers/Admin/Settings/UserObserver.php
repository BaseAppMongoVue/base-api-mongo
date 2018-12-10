<?php

namespace OdontoInn\Observers\Admin\Settings;

use Illuminate\Http\Request;
use OdontoInn\Models\User;
use Illuminate\Support\Facades\Mail;
use OdontoInn\Mail\Admin\AccountCreateMail;

class UserObserver
{

    public function created(User $user)
    {
        Mail::send(new AccountCreateMail(User::find($user->id)));
    }

}
