<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    protected $fillable = ['user_id', 'permission_id'];
}
