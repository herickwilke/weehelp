@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.finalizado.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.projeto') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->projeto->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.titulo') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->titulo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.descricao') }}
                                    </th>
                                    <td>
                                        {!! $finalizados->descricao !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.prioridade') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->prioridade->prioridade ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.prazo') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->prazo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.responsavel') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->responsavel->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.setor') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->setor->nome ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.anexo') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->anexo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.finalizado.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $finalizados->status->status ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection