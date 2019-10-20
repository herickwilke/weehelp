<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrioridadeChamadoRequest;
use App\Http\Requests\UpdatePrioridadeChamadoRequest;
use App\Http\Resources\Admin\PrioridadeChamadoResource;
use App\PrioridadeChamado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrioridadeChamadoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prioridade_chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrioridadeChamadoResource(PrioridadeChamado::all());
    }

    public function store(StorePrioridadeChamadoRequest $request)
    {
        $prioridadeChamado = PrioridadeChamado::create($request->all());

        return (new PrioridadeChamadoResource($prioridadeChamado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PrioridadeChamado $prioridadeChamado)
    {
        abort_if(Gate::denies('prioridade_chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrioridadeChamadoResource($prioridadeChamado);
    }

    public function update(UpdatePrioridadeChamadoRequest $request, PrioridadeChamado $prioridadeChamado)
    {
        $prioridadeChamado->update($request->all());

        return (new PrioridadeChamadoResource($prioridadeChamado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PrioridadeChamado $prioridadeChamado)
    {
        abort_if(Gate::denies('prioridade_chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prioridadeChamado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
