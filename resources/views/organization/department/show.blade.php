@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.department')}} - {{$department->name}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                           
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">{{__('text.employees')}}</h5>
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="mt-1 mb-3">{{$department->employee->count()}}</h1>
                                            </div>
                                            <div class="col">
                                                <i class="align-middle" data-feather="users" style="width: 50px;  height: 50px;"></i>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                          
        
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">{{__('text.meeting')}}</h5>
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="mt-1 mb-3">{{$department->meeting->count()}}</h1>
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
                                                <h5 class="card-title mb-4">{{__('text.tasks')}} - {{__('text.done')}}</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <h1 class="mt-1 mb-3">{{$department->task_done->count()}}</h1>
                                                    </div>
                                                    <div class="col">
                                                        <i class="align-middle" data-feather="target" style="width: 50px;  height: 50px; color:green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
    
                                                <h5 class="card-title mb-4">{{__('text.tasks')}} - {{__('text.not_done')}}</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <h1 class="mt-1 mb-3">{{$department->task_not_done->count()}}</h1>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.department')}}</h5>
                </div>
                <div class="card-body">
                  
                    <p><strong>{{__('text.department')}}:</strong> {{$department->name}}</p>
                    <p><strong>{{__('text.manager_department')}}:</strong> {{$department->manager->name ?? __('text.undefined')}}</p>
                    <p><strong>{{__('text.employees')}}:</strong> {{$department->employee->count()}}</p>
                    <p><strong>{{__('text.meeting')}}:</strong> {{$department->meeting->count()}}</p>

                    
                
                </div>
                    
                  
                    
                </div>
                <hr>

                <h1 class="h3 mb-3">{{__('text.employee')}}</h1>
                <div class="card">
                    <div class="card-body">
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
                                    @foreach ($department->employee as $item)
                                        <tr>
                                            {{-- <td>{{$item->id}}</td> --}}
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td>{{$item->department->name}}</td>
                                           
        
                                            <td class="table-action">
                                                
                                                <a href="{{URL::to('/employee/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                                
                                            </td> 
                                        </tr>
                                       
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
                <hr>

                <h1 class="h3 mb-3">{{__('text.meeting')}}</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable2" class="table display" >
                                <thead>
                                    <tr>
                                        {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                        <th style="width:20%">ID {{__('text.meeting')}}</th>
                                        <th style="width:20%">{{__('text.subject')}}</th>
                                        <th style="width:20%">{{__('text.participants')}}</th>
                                        <th style="width:20%">{{__('text.tasks')}}</th>
                                        <th style="width:20%">{{__('text.date')}}</th>
                                        <th>{{__('text.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($department->meeting as $item)
                                        <tr>
                                            {{-- <td>{{$item->id}}</td> --}}
                                            <td>A-{{$item->id}}</td>
                                            <td>{{$item->subject}}</td>
                                            <td>{{$item->participants->count()}}</td>
                                            <td>{{$item->tasks->count()}}</td>
                                            <td>{{$item->created_at->format('d-m-Y')}}</td>
                                            
                                          
        
                                            <td class="table-action">
                                                
                                                <a href="{{URL::to('/meeting/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                               
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