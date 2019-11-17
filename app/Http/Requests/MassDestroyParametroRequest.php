<?php

namespace App\Http\Requests;

use App\Parametro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParametroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parametro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:parametros,id',
        ];
    }
}
