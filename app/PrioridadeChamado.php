<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrioridadeChamado extends Model
{
    use SoftDeletes;

    public $table = 'prioridade_chamados';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'descricao',
        'prioridade',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'prioridade_id', 'id');
    }
}
