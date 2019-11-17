@extends('layouts.admin')
@section('content')
<div class="content">
    
    <div class="row">
        <div class="col-lg-12">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <h3>Notificações 
                    
                    @if(auth()->user()->unreadNotifications->count())

                    <span class="label label-warning">{{ auth()->user()->unreadNotifications->count() }}</span> 
                    
                    @endif
                </h3>
                    <div class="box box-primary">
                        <div class="box-header with-border">            
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">                            
                            
                            {{-- INICIA A LISTA DE NOTIFICAÇÕES --}}
                            <ul class="products-list product-list-in-box">
                                
                                {{-- ITENS DA LISTA, NOTIFICAÇÕES NÃO LIDAS PRIMEIRO --}}

                                @foreach (auth()->user()->unreadNotifications as $notification)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="\notification.svg" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$notification->data['data']}}
                                            <span class="label label-warning pull-right">pendente</span></a>
                                            <span class="product-description">
                                                {{$notification->data['data']}}
                                            </span>
                                        </div>
                                    </li>
                                    
                                    @endforeach
                                    <!-- /.item -->

                                @foreach (auth()->user()->readNotifications as $notification)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="\notification.svg" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$notification->data['data']}}
                                            <span class="badge badge-pill badge-secondary pull-right">lida</span></a>
                                            <span class="product-description">
                                                {{$notification->data['data']}}
                                            </span>
                                        </div>
                                    </li>
                                    
                                    @endforeach
                                    <!-- /.item -->
                                    
                                   
                                    
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{route('markRead')}}" class="uppercase" style="color:green">Marcar todas como lidas</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection