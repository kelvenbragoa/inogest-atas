@extends('layout_manager.master')
@section('content')

<div class="container-fluid p-0">

    
    <div class="row mb-2 mb-xl-3">
        @if (Auth::user()->organization_id == null)
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{__('message.finish_config')}}<a href="">{{__('message.click_config')}}</a></strong>
            </div>
        </div>
        @endif

        @if (Auth::user()->organization->is_active == 0 )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{__('message.account_suspended')}}</strong>
            </div>
        </div>
        @endif

       
        
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('text.dashboard')}}</strong></h3>
        </div>

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
                                            <h1 class="mt-1 mb-3">{{$employees->count()}}</h1>
                                            <div class="mb-1">
                                                <a href="{{route('manager-employee.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                            </div>
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
                                            <h1 class="mt-1 mb-3">{{$meetings->count()}}</h1>
                                            <div class="mb-1">
                                                <a href="{{route('manager-meeting.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                            </div>
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
                                    <h5 class="card-title mb-4">{{__('text.open_tickets')}}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="mt-1 mb-3">{{$tickets->count()}}</h1>
                                            <div class="mb-1">
                                                <a href="{{route('manager-tickets.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <i class="align-middle" data-feather="tag" style="width: 50px;  height: 50px;"></i>
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
                                                    <h1 class="mt-1 mb-3">{{$department->task_done->count()}}</h1>
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
                                                    <h1 class="mt-1 mb-3">{{$department->task_not_done->count()}}</h1>
                                                </div>
                                                <div class="col">
                                                    <i class="align-middle" data-feather="target" style="width: 50px;  height: 50px; color:red" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: @if ($department->task_done->count() + $department->task_not_done->count() == 0) 0% @else {{number_format($department->task_done->count()*100/($department->task_done->count() + $department->task_not_done->count()),2)}}% @endif" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">@if ($department->task_done->count() + $department->task_not_done->count() == 0) 0% @else {{number_format($department->task_done->count()*100/($department->task_done->count() + $department->task_not_done->count()),2)}}% @endif {{__('text.completed_tasks')}}</div>
                                    </div>
                                    
                                    
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
          
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{__('text.type_meeting')}}</h5>
                        <h6 class="card-subtitle text-muted">{{__('text.distribuition_types')}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chartjs-polar-area"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
    
                        <h5 class="card-title mb-0">{{__('text.last_10_tasks')}}</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>{{__('text.name')}}</th>
                                <th class="d-none d-xl-table-cell">{{__('text.email')}}</th>
                                <th class="d-none d-xl-table-cell">{{__('text.date')}}</th>
                                <th>{{__('text.status')}}</th>
                                <th class="d-none d-md-table-cell">{{__('text.what')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $item)
                                <tr>
                                    <td>{{$item->participant->name}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->participant->name}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->when}}</td>
                                    <td>
                                        @if ($item->status==1) 
                                            <span class="badge bg-success">{{__('text.done')}}</span> 
                                        @else 
                                            <span class="badge bg-danger">{{__('text.not_done')}} (
    
                                                @if (today() > $item->when)
                                                {{__('text.expired')}} {{now()->diffInDays($item->when)}} {{__('text.days')}}
                                                @else
                                                {{__('text.expires_in')}} {{now()->diffInDays($item->when)}} {{__('text.days')}}
                                                @endif
    
    
    
                                               
                                                )</span> 
                                        @endif
                                       
                                    </td>
    
                                    <td class="d-none d-md-table-cell">{{$item->what}}</td>
                                </tr>
                            @endforeach
                            
                          
                           
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
   

       

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Polar Area chart
        var data_bar = @json($data_meeting);
        var done = @json($data_meeting_count);
        new Chart(document.getElementById("chartjs-polar-area"), {
            type: "polarArea",
            data: {
                labels: data_bar,
                datasets: [{
                    label: "Tipo de reuniões",
                    data: done,
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.success,
                        window.theme.danger,
                        window.theme.warning,
                        window.theme.info
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false
            }
        });
    });
</script>




@endsection