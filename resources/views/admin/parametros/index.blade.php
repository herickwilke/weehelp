@extends('layouts.admin')
@section('content')
<div class="content">
    @can('time_entry_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <h4>Parâmetros do Sistema</h4>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Parametrizações do sistema
                </div>
                <div class="panel-body">

                        <div class="card">
                                <h5 class="card-header">Featured</h5>
                                <div class="card-body">
                                  <h5 class="card-title">Special title treatment</h5>
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>

                                  <input type="checkbox" checked data-toggle="toggle">

                                </div>
                              </div>
                </div>
                </div>
    
            </div>
        </div>
    </div>
    @endsection
</div>
@section('scripts')
@parent
<script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</script>
@endsection