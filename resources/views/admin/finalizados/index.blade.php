@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Chamados Finalizados</h4>
                </div>
                <div class="panel-body">

                        <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-onlySoftDeleted">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        ID do chamado
                                    </th>
                                    <th>
                                        Título
                                    </th>
                                    <th>
                                        Anexos
                                    </th>
                                    <th>
                                        Data de finalização
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($onlySoftDeleted as $key => $onlySoftDeleted)
                                    <tr data-entry-id="{{ $onlySoftDeleted->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->titulo ?? '' }}
                                        </td>
                                        <td>
                                            @if($onlySoftDeleted->anexo)
                                                @foreach($onlySoftDeleted->anexo as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }} <br>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->deleted_at ?? '' }}
                                        </td>
                                       

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
