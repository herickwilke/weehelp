<?php

namespace App\Http\Requests;

use App\TimeWorkType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTimeWorkTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('time_work_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:time_work_types,id',
        ];
    }
}
