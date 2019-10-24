@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.prioridadeChamado.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.prioridade-chamados.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('prioridade') ? 'has-error' : '' }}">
                            <label for="prioridade">{{ trans('cruds.prioridadeChamado.fields.prioridade') }}*</label>
                            <input type="text" id="prioridade" name="prioridade" class="form-control" value="{{ old('prioridade', isset($prioridadeChamado) ? $prioridadeChamado->prioridade : '') }}" required>
                            @if($errors->has('prioridade'))
                                <p class="help-block">
                                    {{ $errors->first('prioridade') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.prioridadeChamado.fields.prioridade_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.prioridadeChamado.fields.descricao') }}*</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($prioridadeChamado) ? $prioridadeChamado->descricao : '') }}" required>
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.prioridadeChamado.fields.descricao_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection