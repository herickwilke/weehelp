<?php

namespace App\Http\Controllers\Admin;

use App\Chamado;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyChamadoRequest;
use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\PrioridadeChamado;
use App\Setor;
use App\StatusChamado;
use App\TimeProject;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChamadoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('chamado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chamados = Chamado::all();

        return view('admin.chamados.index', compact('chamados'));
    }

    public function create()
    {
        abort_if(Gate::denies('chamado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projetos = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsavels = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setor::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prioridades = PrioridadeChamado::all()->pluck('prioridade', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.chamados.create', compact('projetos', 'responsavels', 'setors', 'prioridades', 'statuses'));
    }

    public function store(StoreChamadoRequest $request)
    {
        $chamado = Chamado::create($request->all());

        foreach ($request->input('anexo', []) as $file) {
            $chamado->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexo');
        }

        return redirect()->route('admin.chamados.index');
    }

    public function edit(Chamado $chamado)
    {
        abort_if(Gate::denies('chamado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projetos = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsavels = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setor::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prioridades = PrioridadeChamado::all()->pluck('prioridade', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusChamado::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chamado->load('projeto', 'responsavel', 'setor', 'prioridade', 'status');

        return view('admin.chamados.edit', compact('projetos', 'responsavels', 'setors', 'prioridades', 'statuses', 'chamado'));
    }

    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        $chamado->update($request->all());

        if (count($chamado->anexo) > 0) {
            foreach ($chamado->anexo as $media) {
                if (!in_array($media->file_name, $request->input('anexo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $chamado->anexo->pluck('file_name')->toArray();

        foreach ($request->input('anexo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $chamado->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('anexo');
            }
        }

        return redirect()->route('admin.chamados.index');
    }

    public function show(Chamado $chamado)
    {
        abort_if(Gate::denies('chamado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chamado->load('projeto', 'responsavel', 'setor', 'prioridade', 'status');

        return view('admin.chamados.show', compact('chamado'));
    }

    public function destroy(Chamado $chamado)
    {
        abort_if(Gate::denies('chamado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chamado->delete();

        return back();
    }

    public function massDestroy(MassDestroyChamadoRequest $request)
    {
        Chamado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
