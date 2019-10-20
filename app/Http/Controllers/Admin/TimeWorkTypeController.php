<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimeWorkTypeRequest;
use App\Http\Requests\StoreTimeWorkTypeRequest;
use App\Http\Requests\UpdateTimeWorkTypeRequest;
use App\TimeWorkType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeWorkTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_work_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeWorkTypes = TimeWorkType::all();

        return view('admin.timeWorkTypes.index', compact('timeWorkTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('time_work_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeWorkTypes.create');
    }

    public function store(StoreTimeWorkTypeRequest $request)
    {
        $timeWorkType = TimeWorkType::create($request->all());

        return redirect()->route('admin.time-work-types.index');
    }

    public function edit(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeWorkTypes.edit', compact('timeWorkType'));
    }

    public function update(UpdateTimeWorkTypeRequest $request, TimeWorkType $timeWorkType)
    {
        $timeWorkType->update($request->all());

        return redirect()->route('admin.time-work-types.index');
    }

    public function show(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeWorkTypes.show', compact('timeWorkType'));
    }

    public function destroy(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeWorkType->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeWorkTypeRequest $request)
    {
        TimeWorkType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
