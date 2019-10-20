<?php

namespace App\Http\Requests;

use App\TimeProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTimeProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('time_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
