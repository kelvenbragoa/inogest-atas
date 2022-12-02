@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tickets')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <a  data-toggle="modal" data-target="#defaultModalPrimary" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>{{__('text.add')}}</a> 
                     <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{__('text.type')}} {{__('text.tickets')}}</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-3">
                                    <div class="row">


                                        
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">{{__('text.support')}}</h5>
                                                    <div class="row">
                                                        
                                                            <p class="mt-1 mb-3">{{__('message.support_message')}}</p>
                                                           
                                                        
                                                       
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Vendas</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mt-1 mb-3">Utilize este departamento para apresentar as suas questões ou dúvidas sobre os nosssos serviços. Poderá também utilizar este departamento para solicitar orçamentos sobre os nossos serviços.</p>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Pagamento</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mt-1 mb-3">Utilize este departamento para submeter os comprovativos de pagamento do serviço encomendado ou dúvidas sobre os seus pagamentos, activação de serviços e/ou facturas.</p>
                                                          
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div> --}}


                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                                    <a href="{{route('manager-tickets.create')}}" class="btn btn-primary">{{__('text.add')}}</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if (Session::has('messageSuccess'))
                       
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{Session::get('messageSuccess')}}</strong>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('messageError'))
                   
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        <div class="alert-icon">
                            <i class="far fa-fw fa-bell"></i>
                        </div>
                        <div class="alert-message">
                            <strong>{{Session::get('messageError')}}</strong>
                        </div>
                    </div>
                    @endif
                    <div class="table-responsive">
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:30%">{{__('text.type')}} {{__('text.tickets')}}</th>
                                <th style="width:30%">{{__('text.subject')}}</th>
                                <th style="width:20%">{{__('text.status')}}</th>
                                <th style="width:20%">{{__('text.update')}}</th>
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->type->name}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>@if ($item->status == 0)
                                        <span class="badge bg-danger">{{__('text.closed')}}</span>
                                    @else
                                    <span class="badge bg-success">{{__('text.opened')}}</span>
                                    @endif</td>
                                    <td>{{$item->updated_at->format('d-m-Y H:i')}}</td>
                                   

                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/manager-tickets/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        <a href="{{URL::to('/manager-tickets/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                    </td> 
                                </tr>
                                @include('manager.tickets.modaldelete')
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