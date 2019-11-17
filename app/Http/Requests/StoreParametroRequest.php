<?php

namespace App\Http\Requests;

use App\Parametro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreParametroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parametro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
