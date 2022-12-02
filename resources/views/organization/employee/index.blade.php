@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">
    

    @if ($employee->count() <= 5)
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="mb-3">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        <h4 class="alert-heading">{{__('text.you_have')}} {{$employee->count()}} {{__('text.employees')}}!</h4>
                        <p>{{__('text.employee_message')}}</p>
                        <hr>
                        <div class="btn-list">
                            <button class="btn btn-light" data-dismiss="alert" type="button">OK</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <h1 class="h3 mb-3">{{__('text.employees')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <a href="{{route('employee.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>{{__('text.add')}}</a> 
                   
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
                                <th style="width:30%">{{__('text.name')}}</th>
                                <th style="width:30%">{{__('text.email')}}</th>
                                <th style="width:20%">{{__('text.mobile')}}</th>
                                <th style="width:20%">{{__('text.department')}}</th>
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->department->name}}</td>
                                   

                                    <td class="table-action">
                                        <a href="{{URL::to('/employee/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                        <a href="{{URL::to('/employee/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                       @if ($item->id != Auth::user()->employee_id)
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a>
                                       @endif 
                                    </td> 
                                </tr>
                                @include('organization.employee.modaldelete')
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