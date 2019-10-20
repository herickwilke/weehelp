<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusChamadoRequest;
use App\Http\Requests\UpdateStatusChamadoRequest;
use App\Http\Resources\Admin\StatusChamadoResource;
use App\StatusChamado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusChamadoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusChamadoResource(StatusChamado::all());
    }

    public function store(StoreStatusChamadoRequest $request)
    {
        $statusChamado = StatusChamado::create($request->all());

        return (new StatusChamadoResource($statusChamado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StatusChamado $statusChamado)
    {
        abort_if(Gate::denies('status_chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusChamadoResource($statusChamado);
    }

    public function update(UpdateStatusChamadoRequest $request, StatusChamado $statusChamado)
    {
        $statusChamado->update($request->all());

        return (new StatusChamadoResource($statusChamado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StatusChamado $statusChamado)
    {
        abort_if(Gate::denies('status_chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusChamado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
