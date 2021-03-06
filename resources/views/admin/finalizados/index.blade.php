@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 style="font-weight:bold">Chamados Finalizados</h4>
                </div>
                <div class="panel-body">

                        <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-onlySoftDeleted">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        ID do chamado
                                    </th>
                                    <th>
                                        Título
                                    </th>
                                    <th>
                                        Anexos
                                    </th>
                                    <th>
                                        Data de finalização
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($onlySoftDeleted as $key => $onlySoftDeleted)
                                    <tr data-entry-id="{{ $onlySoftDeleted->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->titulo ?? '' }}
                                        </td>
                                        <td>
                                            @if($onlySoftDeleted->anexo)
                                                @foreach($onlySoftDeleted->anexo as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }} <br>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ $onlySoftDeleted->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('status_chamado_show')
                                                <!-- <a class="btn btn-xs btn-primary" href="{{ route('admin.status-chamados.show', $onlySoftDeleted->id) }}"> -->
                                                    <!-- {{ trans('global.view') }} -->
                                                </a>
                                            @endcan

                                            @can('status_chamado_edit')
                                                <!-- <a class="btn btn-xs btn-info" href="{{ route('admin.status-chamados.edit', $onlySoftDeleted->id) }}"> -->
                                                    <!-- {{ trans('global.edit') }} -->
                                                </a>
                                            @endcan

                                            @can('status_chamado_delete')
                                                <form action="{{ route('admin.status-chamados.destroy', $onlySoftDeleted->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <!-- <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}"> -->
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
@can('chamado_delete_test')
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
    "language": { select: {rows: "%d linhas selecionadas"},
    }});
  $('.datatable-onlySoftDeleted:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection