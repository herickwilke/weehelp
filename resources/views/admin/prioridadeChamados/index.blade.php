@extends('layouts.admin')
@section('content')
<div class="content">
    @can('prioridade_chamado_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.prioridade-chamados.create") }}">
                    Cadastrar Nova Prioridade
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.prioridadeChamado.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PrioridadeChamado">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.prioridadeChamado.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prioridadeChamado.fields.prioridade') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.prioridadeChamado.fields.descricao') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prioridadeChamados as $key => $prioridadeChamado)
                                    <tr data-entry-id="{{ $prioridadeChamado->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $prioridadeChamado->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prioridadeChamado->prioridade ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prioridadeChamado->descricao ?? '' }}
                                        </td>
                                        <td>
                                            @can('prioridade_chamado_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.prioridade-chamados.show', $prioridadeChamado->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('prioridade_chamado_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.prioridade-chamados.edit', $prioridadeChamado->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('prioridade_chamado_delete')
                                                <form action="{{ route('admin.prioridade-chamados.destroy', $prioridadeChamado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('prioridade_chamado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.prioridade-chamados.massDestroy') }}",
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
    "language": { select: {rows: "%d linhas selecionadas"}},
  });
  $('.datatable-PrioridadeChamado:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection