<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrioridadeChamadoRequest;
use App\Http\Requests\StorePrioridadeChamadoRequest;
use App\Http\Requests\UpdatePrioridadeChamadoRequest;
use App\PrioridadeChamado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrioridadeChamadoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prioridade_chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prioridadeChamados = PrioridadeChamado::all();

        return view('admin.prioridadeChamados.index', compact('prioridadeChamados'));
    }

    public function create()
    {
        abort_if(Gate::denies('prioridade_chamado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prioridadeChamados.create');
    }

    public function store(StorePrioridadeChamadoRequest $request)
    {
        $prioridadeChamado = PrioridadeChamado::create($request->all());

        return redirect()->route('admin.prioridade-chamados.index');
    }

    public function edit(PrioridadeChamado $prioridadeChamado)
    {
        abort_if(Gate::denies('prioridade_chamado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prioridadeChamados.edit', compact('prioridadeChamado'));
    }

    public function update(UpdatePrioridadeChamadoRequest $request, PrioridadeChamado $prioridadeChamado)
    {
        $prioridadeChamado->update($request->all());

        return redirect()->route('admin.prioridade-chamados.index');
    }

    public function show(PrioridadeChamado $prioridadeChamado)
    {
        abort_if(Gate::denies('prioridade_chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prioridadeChamados.show', compact('prioridadeChamado'));
    }

    public function destroy(PrioridadeChamado $prioridadeChamado)
    {
        abort_if(Gate::denies('prioridade_chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prioridadeChamado->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrioridadeChamadoRequest $request)
    {
        PrioridadeChamado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
