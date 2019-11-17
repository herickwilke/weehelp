@extends('layouts.admin')
@section('content')
<div class="content">
    @can('parametro_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.parametros.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.parametro.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.parametro.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Parametro">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.parametro.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.parametro.fields.parametro') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.parametro.fields.valor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.parametro.fields.descricao') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.parametro.fields.notif_email') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parametros as $key => $parametro)
                                    <tr data-entry-id="{{ $parametro->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $parametro->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $parametro->parametro ?? '' }}
                                        </td>
                                        <td>
                                            {{ $parametro->valor ?? '' }}
                                        </td>
                                        <td>
                                            {{ $parametro->descricao ?? '' }}
                                        </td>
                                        <td>
                                            {{ $parametro->notif_email ? trans('global.yes') : trans('global.no') }}
                                        </td>
                                        <td>
                                            @can('parametro_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.parametros.show', $parametro->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('parametro_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.parametros.edit', $parametro->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('parametro_delete')
                                                <form action="{{ route('admin.parametros.destroy', $parametro->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('parametro_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.parametros.massDestroy') }}",
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
  $('.datatable-Parametro:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection