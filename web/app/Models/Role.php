<?php

namespace OdontoInn\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package OdontoInn\Models
 */
class Role extends Model
{

    use SoftDeletes;

    const ADMIN = 'ADMIN';
    const STAFF_AUDITOR = 'STAFF_AUDITOR';
    const STAFF_FINANCE = 'STAFF_FINANCE';
    const STAFF_EDITOR = 'STAFF_EDITOR';

    const DATA_ROLES = [

        [
            'name' => Role::ADMIN,
            'description' => 'Administrador Geral',
        ],
        [
            'name' => Role::STAFF_AUDITOR,
            'description' => 'Auditoria',
        ],
        [
            'name' => Role::STAFF_FINANCE,
            'description' => 'Financeiro',
        ],      
        [
            'name' => Role::STAFF_EDITOR,
            'description' => 'Editor',
        ]

    ];

    protected $fillable = [
        'name',
        'description',
        'default',
        'privileges'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_ids'        
    ];

    /**
     * @return \Jenssegers\Mongodb\Relations\EmbedsMany
     */
    public function privileges()
    {
        return $this->embedsMany(Privilege::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
