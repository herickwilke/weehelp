<?php

namespace App\Http\Controllers\Admin;

use App\finalizado;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyfinalizadoRequest;
use App\Http\Requests\StorefinalizadoRequest;
use App\Http\Requests\UpdatefinalizadoRequest;
use App\PrioridadeChamado;
use App\Prioridadefinalizado;
use App\Setor;
use App\StatusChamado;
use App\Statusfinalizado;
use App\TimeProject;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinalizadosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('finalizado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finalizados = finalizado::all();

        return view('admin.finalizados.index', compact('finalizados'));
    }

    public function create()
    {
        abort_if(Gate::denies('finalizado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projetos = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsavels = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setor::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prioridades = Prioridadechamado::all()->pluck('prioridade', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.finalizados.create', compact('projetos', 'responsavels', 'setors', 'prioridades', 'statuses'));
    }

    public function store(StorefinalizadoRequest $request)
    {
        $finalizado = finalizado::create($request->all());

        foreach ($request->input('anexo', []) as $file) {
            $finalizado->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexo');
        }

        return redirect()->route('admin.finalizados.index');
    }

    public function edit(finalizado $finalizado)
    {
        abort_if(Gate::denies('finalizado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projetos = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsavels = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setor::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prioridades = PrioridadeChamado::all()->pluck('prioridade', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $finalizado->load('projeto', 'responsavel', 'setor', 'prioridade', 'status');

        return view('admin.finalizados.edit', compact('projetos', 'responsavels', 'setors', 'prioridades', 'statuses', 'chamado'));
    }

    public function update(UpdatefinalizadoRequest $request, finalizado $finalizado)
    {
        $finalizado->update($request->all());

        if (count($finalizado->anexo) > 0) {
            foreach ($finalizado->anexo as $media) {
                if (!in_array($media->file_name, $request->input('anexo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $finalizado->anexo->pluck('file_name')->toArray();

        foreach ($request->input('anexo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $finalizado->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexo');
            }
        }

        return redirect()->route('admin.finalizados.index');
    }

    public function show(finalizado $finalizado)
    {
        abort_if(Gate::denies('finalizado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finalizado->load('projeto', 'responsavel', 'setor', 'prioridade', 'status');

        return view('admin.finalizados.show', compact('finalizado'));
    }

    public function destroy(finalizado $finalizado)
    {
        abort_if(Gate::denies('finalizado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finalizado->delete();

        return back();
    }

    public function massDestroy(MassDestroyfinalizadoRequest $request)
    {
        finalizado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
