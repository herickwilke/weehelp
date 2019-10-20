@extends('layouts.admin')
@section('content')
<div class="content">
    @can('chamado_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.chamados.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.chamado.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.chamado.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Chamado">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.projeto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.titulo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.prioridade') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prioridadeChamado.fields.descricao') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.prazo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.responsavel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.setor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.anexo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chamado.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.statusChamado.fields.descricao') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chamados as $key => $chamado)
                                    <tr data-entry-id="{{ $chamado->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $chamado->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->projeto->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->titulo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->prioridade->prioridade ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->prioridade->descricao ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->prazo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->responsavel->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->setor->nome ?? '' }}
                                        </td>
                                        <td>
                                            @if($chamado->anexo)
                                                @foreach($chamado->anexo as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ $chamado->status->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chamado->status->descricao ?? '' }}
                                        </td>
                                        <td>
                                            @can('chamado_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.chamados.show', $chamado->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('chamado_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.chamados.edit', $chamado->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('chamado_delete')
                                                <form action="{{ route('admin.chamados.destroy', $chamado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('chamado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.chamados.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Chamado:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection