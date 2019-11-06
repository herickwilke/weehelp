@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.chamado.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $chamado->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.projeto') }}
                                    </th>
                                    <td>
                                        {{ $chamado->projeto->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.titulo') }}
                                    </th>
                                    <td>
                                        {{ $chamado->titulo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.descricao') }}
                                    </th>
                                    <td>
                                        {!! $chamado->descricao !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.prioridade') }}
                                    </th>
                                    <td>
                                        {{ $chamado->prioridade->prioridade ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.prazo') }}
                                    </th>
                                    <td>
                                        {{ $chamado->prazo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.responsavel') }}
                                    </th>
                                    <td>
                                        {{ $chamado->responsavel->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.setor') }}
                                    </th>
                                    <td>
                                        {{ $chamado->setor->nome ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.anexo') }}
                                    </th>
                                    <td>
                                            @if($chamado->anexo)
                                                @foreach($chamado->anexo as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }} <br>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chamado.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $chamado->status->status ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <h2>Comentários</h2> <br>

                         @comments(['model' => $chamado])

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