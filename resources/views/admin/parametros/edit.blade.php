@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Definir Parâmetros do Sistema
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.parametros.update", [$parametro->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('parametro') ? 'has-error' : '' }}" hidden>
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
                            <label for="valor">Tempo de inatividade de sessão (min):</label>
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
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}" hidden>
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
                        <div class="form-group {{ $errors->has('notif_email') ? 'has-error' : '' }}">
                            <label for="notif_email">Receber notificações por e-mail?   </label>
                            <input name="notif_email" type="hidden" value="0">
                            <input value="1" type="checkbox" id="notif_email" name="notif_email" {{ (isset($parametro) && $parametro->notif_email) || old('notif_email', 0) === 1 ? 'checked' : '' }}>
                            @if($errors->has('notif_email'))
                                <p class="help-block">
                                    {{ $errors->first('notif_email') }}
                                </p>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.parametro.fields.notif_email_helper') }}
                            </p> --}}
                        </div>

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}" >
                                <label for="descricao">Chave de acesso API:</label>
                                <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('secret', isset($token) ? $token : '') }}" disabled>
                                
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