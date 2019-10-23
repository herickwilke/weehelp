<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class finalizado extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'chamados';

    protected $appends = [
        'anexo',
    ];

    protected $dates = [
        'prazo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'prazo',
        'titulo',
        'setor_id',
        'descricao',
        'status_id',
        'projeto_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'prioridade_id',
        'responsavel_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'chamado_id', 'id');
    }

    public function projeto()
    {
        return $this->belongsTo(TimeProject::class, 'projeto_id');
    }

    public function getPrazoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPrazoAttribute($value)
    {
        $this->attributes['prazo'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function getAnexoAttribute()
    {
        return $this->getMedia('anexo');
    }

    public function prioridade()
    {
        return $this->belongsTo(PrioridadeChamado::class, 'prioridade_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusChamado::class, 'status_id');
    }
}
