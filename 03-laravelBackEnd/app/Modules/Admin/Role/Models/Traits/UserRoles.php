<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 20.12.2020
 * Time: 13:25
 */

namespace App\Modules\Admin\Role\Models\Traits;


use App\Modules\Admin\Role\Models\Role;

trait UserRoles
{
    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function canDo($alias, $require = false) {

    }

    public function hasRole($alias, $require = false) {

    }

    public function getMergedPermissions() {

    }

    public function getRoles() {

    }

}