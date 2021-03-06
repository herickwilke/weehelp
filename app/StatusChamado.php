<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusChamado extends Model
{
    use SoftDeletes;

    public $table = 'status_chamados';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'descricao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'status_id', 'id');
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'status_id', 'id');
    }
}
