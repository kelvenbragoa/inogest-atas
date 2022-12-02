@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">
    
    
    
    <h1 class="h3 mb-3">{{__('text.invoice')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     {{-- <a href="{{route('invoice.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>  --}}
                   
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
                                <th style="width:10%">{{__('text.invoice')}}#</th>
                                <th style="width:20%">{{__('text.emission_date')}}</th>
                                <th style="width:20%">{{__('text.due_date')}}</th>
                                <th style="width:20%">{{__('text.total')}}</th>
                                <th style="width:20%">{{__('text.status')}}</th>
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->id}}/{{$item->created_at->format('Y')}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->start_date))}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->end_date))}}</td>
                                    <td>{{$item->amount}} MT</td>
                                    <td> @if ($item->status == 0)
                                        <span class="badge bg-danger">{{__('text.not_paid')}}</span>
                                    @else
                                        <span class="badge bg-success">{{__('text.paid')}}</span>
                                    @endif </td>

                                    <td class="table-action">
                                        
                                        <a href="{{URL::to('/invoice/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                    </td> 
                                </tr>
                                @include('organization.invoice.modaldelete')
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