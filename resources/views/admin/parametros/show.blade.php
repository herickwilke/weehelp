@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.parametro.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
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
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection