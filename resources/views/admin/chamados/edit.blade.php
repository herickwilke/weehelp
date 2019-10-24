@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.chamado.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.chamados.update", [$chamado->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('projeto_id') ? 'has-error' : '' }}">
                            <label for="projeto">{{ trans('cruds.chamado.fields.projeto') }}*</label>
                            <select name="projeto_id" id="projeto" class="form-control select2" required>
                                @foreach($projetos as $id => $projeto)
                                    <option value="{{ $id }}" {{ (isset($chamado) && $chamado->projeto ? $chamado->projeto->id : old('projeto_id')) == $id ? 'selected' : '' }}>{{ $projeto }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('projeto_id'))
                                <p class="help-block">
                                    {{ $errors->first('projeto_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                            <label for="titulo">{{ trans('cruds.chamado.fields.titulo') }}*</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($chamado) ? $chamado->titulo : '') }}" required>
                            @if($errors->has('titulo'))
                                <p class="help-block">
                                    {{ $errors->first('titulo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.chamado.fields.titulo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">{{ trans('cruds.chamado.fields.descricao') }}*</label>
                            <textarea id="descricao" name="descricao" class="form-control ckeditor">{{ old('descricao', isset($chamado) ? $chamado->descricao : '') }}</textarea>
                            @if($errors->has('descricao'))
                                <p class="help-block">
                                    {{ $errors->first('descricao') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.chamado.fields.descricao_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('prioridade_id') ? 'has-error' : '' }}">
                            <label for="prioridade">{{ trans('cruds.chamado.fields.prioridade') }}*</label>
                            <select name="prioridade_id" id="prioridade" class="form-control select2" required>
                                @foreach($prioridades as $id => $prioridade)
                                    <option value="{{ $id }}" {{ (isset($chamado) && $chamado->prioridade ? $chamado->prioridade->id : old('prioridade_id')) == $id ? 'selected' : '' }}>{{ $prioridade }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('prioridade_id'))
                                <p class="help-block">
                                    {{ $errors->first('prioridade_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('prazo') ? 'has-error' : '' }}">
                            <label for="prazo">{{ trans('cruds.chamado.fields.prazo') }}*</label>
                            <input type="text" id="prazo" name="prazo" class="form-control datetime" value="{{ old('prazo', isset($chamado) ? $chamado->prazo : '') }}" required>
                            @if($errors->has('prazo'))
                                <p class="help-block">
                                    {{ $errors->first('prazo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.chamado.fields.prazo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('responsavel_id') ? 'has-error' : '' }}">
                            <label for="responsavel">{{ trans('cruds.chamado.fields.responsavel') }}*</label>
                            <select name="responsavel_id" id="responsavel" class="form-control select2" required>
                                @foreach($responsavels as $id => $responsavel)
                                    <option value="{{ $id }}" {{ (isset($chamado) && $chamado->responsavel ? $chamado->responsavel->id : old('responsavel_id')) == $id ? 'selected' : '' }}>{{ $responsavel }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('responsavel_id'))
                                <p class="help-block">
                                    {{ $errors->first('responsavel_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('setor_id') ? 'has-error' : '' }}">
                            <label for="setor">{{ trans('cruds.chamado.fields.setor') }}*</label>
                            <select name="setor_id" id="setor" class="form-control select2" required>
                                @foreach($setors as $id => $setor)
                                    <option value="{{ $id }}" {{ (isset($chamado) && $chamado->setor ? $chamado->setor->id : old('setor_id')) == $id ? 'selected' : '' }}>{{ $setor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('setor_id'))
                                <p class="help-block">
                                    {{ $errors->first('setor_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('anexo') ? 'has-error' : '' }}">
                            <label for="anexo">{{ trans('cruds.chamado.fields.anexo') }}</label>
                            <div class="needsclick dropzone" id="anexo-dropzone">

                            </div>
                            @if($errors->has('anexo'))
                                <p class="help-block">
                                    {{ $errors->first('anexo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.chamado.fields.anexo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.chamado.fields.status') }}*</label>
                            <select name="status_id" id="status" class="form-control select2" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ (isset($chamado) && $chamado->status ? $chamado->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_id'))
                                <p class="help-block">
                                    {{ $errors->first('status_id') }}
                                </p>
                            @endif
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

@section('scripts')
<script>
    var uploadedAnexoMap = {}
Dropzone.options.anexoDropzone = {
    url: '{{ route('admin.chamados.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="anexo[]" value="' + response.name + '">')
      uploadedAnexoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAnexoMap[file.name]
      }
      $('form').find('input[name="anexo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($chamado) && $chamado->anexo)
          var files =
            {!! json_encode($chamado->anexo) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="anexo[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop