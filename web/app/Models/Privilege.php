<?php

namespace OdontoInn\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class Privilege
 * @package OdontoInn\Models
 */
class Privilege extends Model
{

    use SoftDeletes;

    const ALL     = 'ALL';
    const READ    = 'READ';
    const ADD     = 'ADD';
    const EDIT    = 'EDIT';
    const DELETE  = 'DELETE';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $dates = ['deleted_at'];

}
