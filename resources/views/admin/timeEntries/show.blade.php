@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.timeEntry.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.work_type') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->work_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.project') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->project->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.chamado') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->chamado->titulo ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.prazo') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->prazo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.start_time') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.end_time') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->end_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.timeEntry.fields.usuario') }}
                                    </th>
                                    <td>
                                        {{ $timeEntry->usuario->name ?? '' }}
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