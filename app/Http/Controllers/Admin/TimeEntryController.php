<?php

namespace App\Http\Controllers\Admin;

use App\Chamado;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimeEntryRequest;
use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Notifications\NovaTarefa;
use App\Parametro;
use App\StatusChamado;
use App\TimeEntry;
use App\TimeProject;
use App\TimeWorkType;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Notification;

class TimeEntryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeEntries = TimeEntry::all();
        
        return view('admin.timeEntries.index', compact('timeEntries'));
    
}

public function create()
{
    abort_if(Gate::denies('time_entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
    $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $projects = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $chamados = Chamado::all()->pluck('titulo', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    
    return view('admin.timeEntries.create', compact('work_types', 'projects', 'chamados', 'statuses', 'usuarios'));
}

public function store(StoreTimeEntryRequest $request)
{
    $timeEntry = TimeEntry::create($request->all());
    
    // NOTIFICAÇÃO
    $email = Parametro::where('id', '=', '1')->value('notif_email');
    if ($email == true){
    $user_responsavel = User::get()->where('id', '=', $timeEntry->usuario_id);
    Notification::send($user_responsavel, new NovaTarefa($timeEntry));

        return redirect()->route('admin.time-entries.index');
    }}

    public function edit(TimeEntry $timeEntry)
    {
        abort_if(Gate::denies('time_entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chamados = Chamado::all()->pluck('titulo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timeEntry->load('work_type', 'project', 'chamado', 'status', 'usuario');

        return view('admin.timeEntries.edit', compact('work_types', 'projects', 'chamados', 'statuses', 'usuarios', 'timeEntry'));
    }

    public function update(UpdateTimeEntryRequest $request, TimeEntry $timeEntry)
    {
        $timeEntry->update($request->all());

        return redirect()->route('admin.time-entries.index');
    }

    public function show(TimeEntry $timeEntry)
    {
        abort_if(Gate::denies('time_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeEntry->load('work_type', 'project', 'chamado', 'status', 'usuario');

        return view('admin.timeEntries.show', compact('timeEntry'));
    }

    public function destroy(TimeEntry $timeEntry)
    {
        abort_if(Gate::denies('time_entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeEntry->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeEntryRequest $request)
    {
        TimeEntry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
