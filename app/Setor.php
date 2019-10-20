<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    use SoftDeletes;

    public $table = 'setors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'descricao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'setor_id', 'id');
    }

    public function responsavels()
    {
        return $this->belongsToMany(User::class);
    }
}
