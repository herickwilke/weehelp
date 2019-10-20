<?php

namespace App\Http\Requests;

use App\Chamado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyChamadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:chamados,id',
        ];
    }
}
