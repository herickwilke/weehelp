@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.statusChamado.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.status-chamados.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.statusChamado.fields.status') }}*</label>
                            <input type="text" id="status" name="status" class="form-control" value="{{ old('status', isset($statusChamado) ? $statusChamado->status : '') }}" required>
                            @if($errors->has('status'))
                                <p class="help-block">
                                    {{ $errors->first('status') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.statusChamado.fields.status_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.statusChamado.fields.descricao') }}*</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($statusChamado) ? $statusChamado->descricao : '') }}" required>
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.statusChamado.fields.descricao_helper') }}
                            </p>
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