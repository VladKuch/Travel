<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use App\Models\Session;
use App\Models\RefRole;

class Admin extends Model {
    public $id;
    public $name;
    public $email;
    public $password;
    public $logo;
    public $created_at;

    public function initialize()
    {
        $this->setSource('admins');
        $this->hasMany(
            'id',
            Session::class,
            'admin_id',
            []
        );

        $this->belongsTo(
            'role',
            RefRole::class,
            'ref_role_id',
            ['alias' => 'ref_roles']
        );
    }
}