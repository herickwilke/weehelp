<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Chamado;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Http\Resources\Admin\ChamadoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChamadoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChamadoResource(Chamado::with(['projeto', 'prioridade', 'responsavel', 'setor', 'status'])->get());
    }

    public function store(StoreChamadoRequest $request)
    {
        $chamado = Chamado::create($request->all());

        if ($request->input('anexo', false)) {
            $chamado->addMedia(storage_path('tmp/uploads/' . $request->input('anexo')))->toMediaCollection('anexo');
        }

        return (new ChamadoResource($chamado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Chamado $chamado)
    {
        abort_if(Gate::denies('chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChamadoResource($chamado->load(['projeto', 'prioridade', 'responsavel', 'setor', 'status']));
    }

    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        $chamado->update($request->all());

        if ($request->input('anexo', false)) {
            if (!$chamado->anexo || $request->input('anexo') !== $chamado->anexo->file_name) {
                $chamado->addMedia(storage_path('tmp/uploads/' . $request->input('anexo')))->toMediaCollection('anexo');
            }
        } elseif ($chamado->anexo) {
            $chamado->anexo->delete();
        }

        return (new ChamadoResource($chamado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Chamado $chamado)
    {
        abort_if(Gate::denies('chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chamado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
