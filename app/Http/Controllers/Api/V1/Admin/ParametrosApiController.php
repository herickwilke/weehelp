<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParametroRequest;
use App\Http\Requests\UpdateParametroRequest;
use App\Http\Resources\Admin\ParametroResource;
use App\Parametro;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParametrosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parametro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParametroResource(Parametro::all());
    }

    public function store(StoreParametroRequest $request)
    {
        $parametro = Parametro::create($request->all());

        return (new ParametroResource($parametro))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Parametro $parametro)
    {
        abort_if(Gate::denies('parametro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParametroResource($parametro);
    }

    public function update(UpdateParametroRequest $request, Parametro $parametro)
    {
        $parametro->update($request->all());

        return (new ParametroResource($parametro))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Parametro $parametro)
    {
        abort_if(Gate::denies('parametro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametro->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
