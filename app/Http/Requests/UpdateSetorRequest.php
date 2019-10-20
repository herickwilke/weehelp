<?php

namespace App\Http\Requests;

use App\Setor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSetorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'           => [
                'min:3',
                'max:25',
                'required',
            ],
            'responsavels.*' => [
                'integer',
            ],
            'responsavels'   => [
                'required',
                'array',
            ],
        ];
    }
}
