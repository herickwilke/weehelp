<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $table = 'oauth_clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'secret',
        'id',
        'user_id',
        'name',
    ];
}
