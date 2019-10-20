<?php

namespace App\Http\Requests;

use App\Chamado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateChamadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('chamado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'projeto_id'     => [
                'required',
                'integer',
            ],
            'titulo'         => [
                'min:8',
                'max:100',
                'required',
            ],
            'descricao'      => [
                'required',
            ],
            'prazo'          => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'responsavel_id' => [
                'required',
                'integer',
            ],
            'setor_id'       => [
                'required',
                'integer',
            ],
            'prioridade_id'  => [
                'required',
                'integer',
            ],
            'status_id'      => [
                'required',
                'integer',
            ],
        ];
    }
}
