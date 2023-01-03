<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 13.12.2020
 * Time: 14:39
 */

namespace App\Modules\Admin\Role\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PermService
{
    public function save(Request $request, Model $model) {

        return true;
    }
}