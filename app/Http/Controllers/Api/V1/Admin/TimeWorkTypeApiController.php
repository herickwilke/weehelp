<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeWorkTypeRequest;
use App\Http\Requests\UpdateTimeWorkTypeRequest;
use App\Http\Resources\Admin\TimeWorkTypeResource;
use App\TimeWorkType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeWorkTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_work_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeWorkTypeResource(TimeWorkType::all());
    }

    public function store(StoreTimeWorkTypeRequest $request)
    {
        $timeWorkType = TimeWorkType::create($request->all());

        return (new TimeWorkTypeResource($timeWorkType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeWorkTypeResource($timeWorkType);
    }

    public function update(UpdateTimeWorkTypeRequest $request, TimeWorkType $timeWorkType)
    {
        $timeWorkType->update($request->all());

        return (new TimeWorkTypeResource($timeWorkType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeWorkType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
