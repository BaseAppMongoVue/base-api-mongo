<?php

namespace OdontoInn\Services\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use OdontoInn\Mail\Admin\ResetPasswordMail;
use OdontoInn\Models\User;

/**
 * Class GenerateTokenUserService
 * @package OdontoInn\Services\Auth
 */
class GenerateTokenUserService
{

    /**
     * Generate Token And Send Email
     *
     * @param array $request
     * @return string
     */
    public function make(array $request)
    {

        $user = User::where($request)->first();

        if(!$user) {
            return false;
        }

        $user->tokenResetPassword()
             ->delete();

        $user->tokenResetPassword()->create([
            'token' => str_random(40),
            'time' => time() + 60*60*4
        ]);

        Mail::send( new ResetPasswordMail( User::find( $user->id ) ) );

        return true;
    }

}
