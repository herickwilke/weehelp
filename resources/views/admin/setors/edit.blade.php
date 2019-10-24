@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.setor.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.setors.update", [$setor->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">{{ trans('cruds.setor.fields.nome') }}*</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', isset($setor) ? $setor->nome : '') }}" required>
                            @if($errors->has('nome'))
                                <p class="help-block">
                                    {{ $errors->first('nome') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.setor.fields.nome_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.setor.fields.descricao') }}</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao', isset($setor) ? $setor->descricao : '') }}">
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.setor.fields.descricao_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('responsavels') ? 'has-error' : '' }}">
                            <label for="responsavel">{{ trans('cruds.setor.fields.responsavel') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="responsavels[]" id="responsavels" class="form-control select2" multiple="multiple" required>
                                @foreach($responsavels as $id => $responsavel)
                                    <option value="{{ $id }}" {{ (in_array($id, old('responsavels', [])) || isset($setor) && $setor->responsavels->contains($id)) ? 'selected' : '' }}>{{ $responsavel }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('responsavels'))
                                <p class="help-block">
                                    {{ $errors->first('responsavels') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.setor.fields.responsavel_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-Success" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection