<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySetorRequest;
use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Setor;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setors = Setor::all();

        return view('admin.setors.index', compact('setors'));
    }

    public function create()
    {
        abort_if(Gate::denies('setor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavels = User::all()->pluck('name', 'id');

        return view('admin.setors.create', compact('responsavels'));
    }

    public function store(StoreSetorRequest $request)
    {
        $setor = Setor::create($request->all());
        $setor->responsavels()->sync($request->input('responsavels', []));

        return redirect()->route('admin.setors.index');
    }

    public function edit(Setor $setor)
    {
        abort_if(Gate::denies('setor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavels = User::all()->pluck('name', 'id');

        $setor->load('responsavels');

        return view('admin.setors.edit', compact('responsavels', 'setor'));
    }

    public function update(UpdateSetorRequest $request, Setor $setor)
    {
        $setor->update($request->all());
        $setor->responsavels()->sync($request->input('responsavels', []));

        return redirect()->route('admin.setors.index');
    }

    public function show(Setor $setor)
    {
        abort_if(Gate::denies('setor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setor->load('responsavels');

        return view('admin.setors.show', compact('setor'));
    }

    public function destroy(Setor $setor)
    {
        abort_if(Gate::denies('setor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setor->delete();

        return back();
    }

    public function massDestroy(MassDestroySetorRequest $request)
    {
        Setor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
