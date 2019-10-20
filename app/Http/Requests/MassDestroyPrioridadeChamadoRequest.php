<?php

namespace App\Http\Requests;

use App\PrioridadeChamado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPrioridadeChamadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prioridade_chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:prioridade_chamados,id',
        ];
    }
}
