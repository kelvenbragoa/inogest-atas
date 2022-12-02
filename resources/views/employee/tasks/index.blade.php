@extends('layout_employee.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tasks')}} </h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     {{-- <a href="{{route('manager-employee.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>  --}}
                   
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
                                <th style="width:15%">{{__('text.name')}} </th>
                                <th style="width:15%">{{__('text.email')}} </th>
                                <th style="width:10%">{{__('text.date')}} </th>
                                <th style="width:15%">{{__('text.status')}} </th>
                                <th style="width:30%">{{__('text.what')}} </th>
                                <th>{{__('text.action')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->participant->name}}</td>
                                    <td>{{$item->participant->email}}</td>
                                    <td>{{$item->when}}</td>
                                    <td>
                                        @if ($item->status==1) 
                                        <span class="badge bg-success">{{__('text.done')}} </span> 
                                         @else 
                                        <span class="badge bg-danger">{{__('text.not_done')}}  (

                                            @if (today() > $item->when)
                                            {{__('text.expired')}}  {{now()->diffInDays($item->when)}} {{__('text.days')}} 
                                            @else
                                            {{__('text.expires_in')}}  {{now()->diffInDays($item->when)}} {{__('text.days')}} 
                                            @endif
                                            )</span> 
                                    @endif    
                                    </td>
                                    <td>{{$item->what}}</td>
                                   

                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/manager-employee/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        @if ($item->department_id == Auth::user()->department_id)
                                        <a href="{{URL::to('/employee-meeting/'.$item->meeting_id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        @else
                                        <a href="{{URL::to('/employee-other-meeting/'.$item->meeting_id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        @endif
                                        
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                    </td> 
                                </tr>
                                @include('manager.employee.modaldelete')
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