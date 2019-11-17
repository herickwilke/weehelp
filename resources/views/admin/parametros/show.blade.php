@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.parametro.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.parametro.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $parametro->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.parametro.fields.parametro') }}
                                    </th>
                                    <td>
                                        {{ $parametro->parametro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.parametro.fields.valor') }}
                                    </th>
                                    <td>
                                        {{ $parametro->valor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.parametro.fields.descricao') }}
                                    </th>
                                    <td>
                                        {{ $parametro->descricao }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.parametro.fields.notif_email') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled {{ $parametro->notif_email ? "checked" : "" }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection