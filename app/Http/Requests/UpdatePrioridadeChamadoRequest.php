<?php

namespace App\Http\Requests;

use App\PrioridadeChamado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePrioridadeChamadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prioridade_chamado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'prioridade' => [
                'min:3',
                'max:15',
                'required',
            ],
            'descricao'  => [
                'required',
            ],
        ];
    }
}
