@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.timeEntry.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.time-entries.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('work_type_id') ? 'has-error' : '' }}">
                            <label for="work_type">{{ trans('cruds.timeEntry.fields.work_type') }}</label>
                            <select name="work_type_id" id="work_type" class="form-control select2">
                                @foreach($work_types as $id => $work_type)
                                    <option value="{{ $id }}" {{ (isset($timeEntry) && $timeEntry->work_type ? $timeEntry->work_type->id : old('work_type_id')) == $id ? 'selected' : '' }}>{{ $work_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('work_type_id'))
                                <p class="help-block">
                                    {{ $errors->first('work_type_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                            <label for="project">{{ trans('cruds.timeEntry.fields.project') }}</label>
                            <select name="project_id" id="project" class="form-control select2">
                                @foreach($projects as $id => $project)
                                    <option value="{{ $id }}" {{ (isset($timeEntry) && $timeEntry->project ? $timeEntry->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project_id'))
                                <p class="help-block">
                                    {{ $errors->first('project_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('chamado_id') ? 'has-error' : '' }}">
                            <label for="chamado">{{ trans('cruds.timeEntry.fields.chamado') }}</label>
                            <select name="chamado_id" id="chamado" class="form-control select2">
                                @foreach($chamados as $id => $chamado)
                                    <option value="{{ $id }}" {{ (isset($timeEntry) && $timeEntry->chamado ? $timeEntry->chamado->id : old('chamado_id')) == $id ? 'selected' : '' }}>{{ $chamado }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('chamado_id'))
                                <p class="help-block">
                                    {{ $errors->first('chamado_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('prazo') ? 'has-error' : '' }}">
                            <label for="prazo">{{ trans('cruds.timeEntry.fields.prazo') }}</label>
                            <input type="text" id="prazo" name="prazo" class="form-control datetime" value="{{ old('prazo', isset($timeEntry) ? $timeEntry->prazo : '') }}">
                            @if($errors->has('prazo'))
                                <p class="help-block">
                                    {{ $errors->first('prazo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.timeEntry.fields.prazo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.timeEntry.fields.status') }}*</label>
                            <select name="status_id" id="status" class="form-control select2" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ (isset($timeEntry) && $timeEntry->status ? $timeEntry->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_id'))
                                <p class="help-block">
                                    {{ $errors->first('status_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                            <label for="start_time">{{ trans('cruds.timeEntry.fields.start_time') }}*</label>
                            <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($timeEntry) ? $timeEntry->start_time : '') }}" required>
                            @if($errors->has('start_time'))
                                <p class="help-block">
                                    {{ $errors->first('start_time') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.timeEntry.fields.start_time_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                            <label for="end_time">{{ trans('cruds.timeEntry.fields.end_time') }}*</label>
                            <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($timeEntry) ? $timeEntry->end_time : '') }}" required>
                            @if($errors->has('end_time'))
                                <p class="help-block">
                                    {{ $errors->first('end_time') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.timeEntry.fields.end_time_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('usuario_id') ? 'has-error' : '' }}">
                            <label for="usuario">{{ trans('cruds.timeEntry.fields.usuario') }}*</label>
                            <select name="usuario_id" id="usuario" class="form-control select2" required>
                                @foreach($usuarios as $id => $usuario)
                                    <option value="{{ $id }}" {{ (isset($timeEntry) && $timeEntry->usuario ? $timeEntry->usuario->id : old('usuario_id')) == $id ? 'selected' : '' }}>{{ $usuario }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('usuario_id'))
                                <p class="help-block">
                                    {{ $errors->first('usuario_id') }}
                                </p>
                            @endif
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection