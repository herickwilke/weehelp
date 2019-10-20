<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimeProjectRequest;
use App\Http\Requests\StoreTimeProjectRequest;
use App\Http\Requests\UpdateTimeProjectRequest;
use App\TimeProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeProjects = TimeProject::all();

        return view('admin.timeProjects.index', compact('timeProjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('time_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeProjects.create');
    }

    public function store(StoreTimeProjectRequest $request)
    {
        $timeProject = TimeProject::create($request->all());

        return redirect()->route('admin.time-projects.index');
    }

    public function edit(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeProjects.edit', compact('timeProject'));
    }

    public function update(UpdateTimeProjectRequest $request, TimeProject $timeProject)
    {
        $timeProject->update($request->all());

        return redirect()->route('admin.time-projects.index');
    }

    public function show(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.timeProjects.show', compact('timeProject'));
    }

    public function destroy(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeProjectRequest $request)
    {
        TimeProject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
