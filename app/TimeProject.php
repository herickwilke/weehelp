<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeProject extends Model
{
    use SoftDeletes;

    public $table = 'time_projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'projeto_id', 'id');
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'project_id', 'id');
    }
}
