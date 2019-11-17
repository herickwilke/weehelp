<?php

namespace App\Http\Requests;

use App\Parametro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateParametroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parametro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'parametro' => [
                'required',
            ],
            'valor'     => [
                'nullable',
                'integer',
                'min:5',
                'max:999',
            ],
        ];
    }
}
