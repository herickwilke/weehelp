@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.parametro.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.parametros.update", [$parametro->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('parametro') ? 'has-error' : '' }}">
                <label for="parametro">{{ trans('cruds.parametro.fields.parametro') }}*</label>
                <input type="text" id="parametro" name="parametro" class="form-control" value="{{ old('parametro', isset($parametro) ? $parametro->parametro : '') }}" required>
                @if($errors->has('parametro'))
                    <p class="help-block">
                        {{ $errors->first('parametro') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parametro.fields.parametro_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                <label for="valor">{{ trans('cruds.parametro.fields.valor') }}</label>
                <input type="number" id="valor" name="valor" class="form-control" value="{{ old('valor', isset($parametro) ? $parametro->valor : '') }}" step="1">
                @if($errors->has('valor'))
                    <p class="help-block">
                        {{ $errors->first('valor') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parametro.fields.valor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                <label for="descricao">{{ trans('cruds.parametro.fields.descricao') }}</label>
                <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($parametro) ? $parametro->descricao : '') }}">
                @if($errors->has('descricao'))
                    <p class="help-block">
                        {{ $errors->first('descricao') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.parametro.fields.descricao_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection