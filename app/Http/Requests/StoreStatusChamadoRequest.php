<?php

namespace App\Http\Requests;

use App\StatusChamado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStatusChamadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('status_chamado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'status'    => [
                'min:3',
                'max:15',
                'required',
                'unique:status_chamados',
            ],
            'descricao' => [
                'required',
            ],
        ];
    }
}
