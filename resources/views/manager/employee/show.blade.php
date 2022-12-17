@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.employees')}}</h1>

    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.employees')}}</h5>
                </div>
                <div class="card-body text-center">
                   
                    <img src="/storage/{{Auth::user()->organization->image}}" alt="{{Auth::user()->name}}" class="img-fluid rounded-circle mb-2" width="128" height="128" >
                   
                    
                    <h5 class="card-title mb-0">{{$employee->name}}</h5>
                    <div class="text-muted mb-2">{{$employee->department->name}}</div>

                </div>
                
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">{{__('text.details')}}</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><span data-feather="user" class="feather-sm mr-1"></span> ID: <a href="#">{{$employee->id}}</a></li>
                        <li class="mb-1"><span data-feather="phone" class="feather-sm mr-1"></span> {{__('text.mobile')}}: <a href="#">{{$employee->mobile}}</a></li>
                        <li class="mb-1"><span data-feather="at-sign" class="feather-sm mr-1"></span> {{__('text.email')}}: <a href="#">{{$employee->email}}</a></li>
                       
                        <li class="mb-1"><span data-feather="file" class="feather-sm mr-1"></span> {{__('text.role')}}: <a href="#">{{$employee->department->name}}</a></li>
                        
                       
                    </ul>
                </div>
       
            </div>
        </div>



        
        <div class="col-md-8 col-xl-9">
            <div class="row">
                                   
                                    
                                  
                
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">{{__('text.attended_meetings')}}</h5>
                            <div class="row">
                                <div class="col">
                                    <h1 class="mt-1 mb-3">{{$employee->meeting_participant->count()}}</h1>
                                </div>
                                <div class="col">
                                    <i class="align-middle" data-feather="file" style="width: 50px;  height: 50px;"></i>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title mb-4">{{__('text.completed_tasks')}}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="mt-1 mb-3">{{$task_done->count()}}</h1>
                                           
                                        </div>
                                        <div class="col">
                                            <i class="align-middle" data-feather="target" style="width: 50px;  height: 50px; color:green"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <h5 class="card-title mb-4">{{__('text.not_completed_tasks')}}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="mt-1 mb-3">{{$task_not_done->count()}}</h1>
                                            
                                        </div>
                                        <div class="col">
                                            <i class="align-middle" data-feather="target" style="width: 50px;  height: 50px; color:red" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                           
                        </div>
                    </div>

               

               
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">{{__('text.tasks')}}</h5>
                        <div class="row">
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: @if ($employee->task_done->count() + $employee->task_not_done->count() == 0) 0% @else {{number_format($employee->task_done->count()*100/($employee->task_done->count() + $employee->task_not_done->count()),2)}}% @endif" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">@if ($employee->task_done->count() + $employee->task_not_done->count() == 0) 0% @else {{number_format($employee->task_done->count()*100/($employee->task_done->count() + $employee->task_not_done->count()),2)}}% @endif {{__('text.completed_tasks')}}</div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>{{__('text.tasks')}}</h3>
                    
                </div>
                <div class="card-body h-100">
                   
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                               <div class="table-responsive">
                                    <table id="myTable2" class="table display" >
                                        <thead>
                                            <tr>
                                                
                                                <th style="width:20%">{{__('text.meeting')}} {{__('text.id')}}</th>
                                                <th style="width:20%">{{__('text.when')}}</th>
                                                <th style="width:20%">{{__('text.what')}}</th>
                                                <th style="width:20%">{{__('text.status')}}</th>
                                                <th style="width:20%">{{__('text.date')}}</th>
                                                <th>{{__('text.action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employee->meeting_tasks as $item)
                                                <tr>
                                                    
                                                    <td>A-{{$item->meeting_id}}</td>
                                                    <td>{{$item->when}}</td>
                                                    <td>{{$item->what}}</td>
                                                    <td>@if ($item->status == 1) <span class="badge bg-success">{{__('text.done')}}</span> @else <span class="badge bg-danger">{{__('text.pending')}}</span> @endif</td>
                                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                                    
                                                  
                
                                                    <td class="table-action">
                                                        
                                                        <a href="{{URL::to('/manager-meeting/'.$item->meeting_id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                                       
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
        </div>
    </div>

</div>

@endsection