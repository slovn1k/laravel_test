<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Group extends Model
{
    use Notifiable;

    const ALLOW_CREATE = 1;
    const ALLOW_EDIT = 1;
    const ALLOW_BLOCK = 1;
    const ALLOW_DELETE = 1;

    protected $fillable = [
        'name', 'create', 'edit', 'block', 'delete', 'allow_assign', 'allow_permission',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
