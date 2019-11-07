<?php

namespace App\Http\Controllers\Admin;

use App\Chamado;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinalizadosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('finalizado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlySoftDeleted = Chamado::onlyTrashed()->get();

        // return $onlySoftDeleted;

        return view('admin.finalizados.index', compact('onlySoftDeleted'));


    }
}
