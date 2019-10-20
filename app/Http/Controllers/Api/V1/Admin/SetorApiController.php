<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Http\Resources\Admin\SetorResource;
use App\Setor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SetorResource(Setor::with(['responsavels'])->get());
    }

    public function store(StoreSetorRequest $request)
    {
        $setor = Setor::create($request->all());
        $setor->responsavels()->sync($request->input('responsavels', []));

        return (new SetorResource($setor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Setor $setor)
    {
        abort_if(Gate::denies('setor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SetorResource($setor->load(['responsavels']));
    }

    public function update(UpdateSetorRequest $request, Setor $setor)
    {
        $setor->update($request->all());
        $setor->responsavels()->sync($request->input('responsavels', []));

        return (new SetorResource($setor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Setor $setor)
    {
        abort_if(Gate::denies('setor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
