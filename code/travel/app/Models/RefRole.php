<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use App\Models\Admin;

class RefRole extends Model {
    public $ref_role_id;
    public $role_name;

    public function initialize()
    {
        $this->setSource('ref_roles');
        $this->hasOne(
            'ref_role_id',
            Admin::class,
            'role',
            ['alias' => 'admins']
        );
    }
}