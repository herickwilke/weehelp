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
                        {{-- <div class="box-header with-border">            
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div> --}}

                        @if(auth()->user()->Notifications->count() == 0)
                        <br>
                        <h4>Você ainda não possui notificações.</h4>
                        
                        @else
                        <!-- /.box-header -->
                        <div class="box-body">                            
                                <div class="box-footer text-center" style="border-bottom: 1px solid #f4f4f4;">
                                    @if(auth()->user()->unreadNotifications->count())
                                    <a href="{{route('markRead')}}" class="uppercase btn btn-warning" style="color:white">Marcar todas como lidas</a>
                                    @endif 
                                </div>
                            
                            {{-- INICIA A LISTA DE NOTIFICAÇÕES --}}
                            <ul class="products-list product-list-in-box">
                                
                                {{-- ITENS DA LISTA, NOTIFICAÇÕES NÃO LIDAS PRIMEIRO --}}

                                <style>
                                    .d-none{
                                        display: none;
                                    }
                                    .pagination .active{
                                        z-index: 2;
                                        color: #23527c;
                                        background-color: #eee;
                                        border-color: #ddd;
                                    }
                                </style>

                                <script>
                                    function navigateToPage(n){
                                        var max = 8 * n
                                        var min = max - 8

                                        document.querySelector('#notification-pagination .active').classList.remove('active')
                                        document.querySelector('#notification-pagination .p-'+n).classList.add('active')

                                        document.querySelectorAll('.products-list .item').forEach( (e, i)=> {
                                            e.classList.add('d-none')
                                            if(i < max && i >= min) e.classList.remove('d-none')
                                                
                                        })
                                    }
                                    var init = () => {

                                        var pages = parseInt(document.querySelectorAll('.products-list .item').length / 8)
                                        if((document.querySelectorAll('.products-list .item').length / 8) % 1 > 0) pages++
                                        
                                        document.querySelector('#notification-pagination').insertAdjacentHTML("beforeend", createPagination(pages))
                                        document.querySelector('#notification-pagination .page-link').classList.add('active')

                                        function createPagination(n){
                                            the_return = ''
                                            page = 1
                                            for (let index = n; index > 0; index--) {
                                                the_return+= '<li class="page-item"><a class="page-link p-'+page+'" href="#!" onclick="navigateToPage('+page+')">'+page+'</a></li>'
                                                page++
                                            }
                                            return the_return
                                        }

                                        document.querySelectorAll('.products-list .item').forEach( (e, i) => {
                                            e.classList.remove('d-none')
                                            if(i >= 8) e.classList.add('d-none')
                                        })
                                    }

                                    window.addEventListener('load', init ) 
                                </script>
                                
                                @foreach (auth()->user()->unreadNotifications as $key => $notification)
                                
                                <li class="item d-none">
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
                                
                                <li class="item d-none">
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
                            <!-- /.box-footer -->
                            @endif
                        </div>
                        

                        <div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="notification-pagination"></ul>
                          </nav>
                    </div>
                </div>


            </div>

            

        </div>
    </div>
    @endsection