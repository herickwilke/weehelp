@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.setor.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $setor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setor.fields.nome') }}
                                    </th>
                                    <td>
                                        {{ $setor->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.setor.fields.descricao') }}
                                    </th>
                                    <td>
                                        {{ $setor->descricao }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Responsáveis
                                    </th>
                                    <td>
                                        @foreach($setor->responsavels as $id => $responsavel)
                                            <span class="label label-info label-many">{{ $responsavel->name }}</span>
                                        @endforeach
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