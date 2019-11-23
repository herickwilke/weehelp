@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">

                    <div class="col-lg-12">
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3> Olá, {{ auth()->user()->name }}. </h3>
                            </div>
                        </div>
                    </div>
            </div>                    

        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $settings1['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-exclamation-circle"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings1['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings1['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings2['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings2['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings2['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings3['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings3['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings3['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings4['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-suitcase"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings4['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings4['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings5['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa  fa-question-circle-o"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings5['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings5['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings6['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa  fa-arrow-circle-up"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings6['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings6['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings7['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-snowflake-o"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings7['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings7['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings8['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa  fa-check-circle-o"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings8['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings8['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $chart9->options['column_class'] }}">
                    <h3>{!! $chart9->options['chart_title'] !!}</h3>
                    {!! $chart9->renderHtml() !!}
                </div>
                <div class="{{ $chart10->options['column_class'] }}">
                    <h3>{!! $chart10->options['chart_title'] !!}</h3>
                    {!! $chart10->renderHtml() !!}
                </div>
                <div class="{{ $chart11->options['column_class'] }}">
                    <h3>{!! $chart11->options['chart_title'] !!}</h3>
                    {!! $chart11->renderHtml() !!}
                </div>
                <div class="{{ $chart12->options['column_class'] }}">
                    <h3>{!! $chart12->options['chart_title'] !!}</h3>
                    {!! $chart12->renderHtml() !!}
                </div>

                <!-- ÚLTIMOS CHAMADOS ABERTOS -->

                <!-- <div class="panel panel-default">
                    <div class="panel-body">
                    

                {{-- Widget - latest entries --}}
                <div class="{{ $settings13['column_class'] }}">
                    <h3>{{ $settings13['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings13['fields'] as $field)
                                    <th>
                                     {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings13['data'] as $row)
                                <tr>
                                    @foreach($settings13['fields'] as $field)
                                        <td>
                                            {{ $row->{$field} }}
                                        </td>
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings13['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $chart9->renderJs() !!}
{!! $chart10->renderJs() !!}
{!! $chart11->renderJs() !!}
{!! $chart12->renderJs() !!}
@endsection
