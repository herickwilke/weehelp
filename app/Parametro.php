<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parametro extends Model
{
    use SoftDeletes;

    public $table = 'parametros';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'valor',
        'parametro',
        'descricao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
