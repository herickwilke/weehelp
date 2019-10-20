<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeWorkType extends Model
{
    use SoftDeletes;

    public $table = 'time_work_types';

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

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'work_type_id', 'id');
    }
}
