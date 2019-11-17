<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parametro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametros = Parametro::all();

        return view('admin.parametros.index', compact('parametros'));
    }

    public function create()
    {
        abort_if(Gate::denies('parametro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.parametros.create');
    }

    public function store(StoreParametroRequest $request)
    {
        $parametro = Parametro::create($request->all());

        return redirect()->route('admin.parametros.index');
    }

    public function edit(Parametro $parametro)
    {
        abort_if(Gate::denies('parametro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.parametros.edit', compact('parametro'));
    }

    public function update(UpdateParametroRequest $request, Parametro $parametro)
    {
        $parametro->update($request->all());

        return redirect()->route('admin.parametros.index');
    }

    public function show(Parametro $parametro)
    {
        abort_if(Gate::denies('parametro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.parametros.show', compact('parametro'));
    }

    public function destroy(Parametro $parametro)
    {
        abort_if(Gate::denies('parametro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametro->delete();

        return back();
    }

    public function massDestroy(MassDestroyParametroRequest $request)
    {
        Parametro::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
