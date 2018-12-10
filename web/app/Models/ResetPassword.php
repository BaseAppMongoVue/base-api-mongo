<?php

namespace OdontoInn\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class ResetPassword
 * @package OdontoInn\Models
 */
class ResetPassword extends Model
{

    protected $fillable = [
        'token',
        'time',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
