<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatusChamadoRequest;
use App\Http\Requests\StoreStatusChamadoRequest;
use App\Http\Requests\UpdateStatusChamadoRequest;
use App\StatusChamado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusChamadoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusChamados = StatusChamado::all();

        return view('admin.statusChamados.index', compact('statusChamados'));
    }

    public function create()
    {
        abort_if(Gate::denies('status_chamado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusChamados.create');
    }

    public function store(StoreStatusChamadoRequest $request)
    {
        $statusChamado = StatusChamado::create($request->all());

        return redirect()->route('admin.status-chamados.index');
    }

    public function edit(StatusChamado $statusChamado)
    {
        abort_if(Gate::denies('status_chamado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusChamados.edit', compact('statusChamado'));
    }

    public function update(UpdateStatusChamadoRequest $request, StatusChamado $statusChamado)
    {
        $statusChamado->update($request->all());

        return redirect()->route('admin.status-chamados.index');
    }

    public function show(StatusChamado $statusChamado)
    {
        abort_if(Gate::denies('status_chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusChamados.show', compact('statusChamado'));
    }

    public function destroy(StatusChamado $statusChamado)
    {
        abort_if(Gate::denies('status_chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusChamado->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatusChamadoRequest $request)
    {
        StatusChamado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
