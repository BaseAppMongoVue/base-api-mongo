<?php

namespace OdontoInn\Services\Auth;

use OdontoInn\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use OdontoInn\Mail\Admin\UpdatePasswordMail;

/**
 * Class ChangePasswordUserService
 * @package OdontoInn\Services\Auth
 */
class ChangePasswordUserService
{

    /**
     * Change Password
     *
     * @param array $request
     * @return string
     */
    public function change(array $request)
    {
        
        $update = User::where('_id', $request['user_id'])
                ->where('tokenResetPassword.token', $request['token'])
                ->update([
                    'password' => Hash::make( $request['password'] )
                ]);

        if ($update) {

            $user = User::find($request['user_id']);
            $user->tokenResetPassword()->delete();

            Mail::send( new UpdatePasswordMail( $user ) );

            return true;

        }

        return false;
        
    }
    
}
