@extends('layout_organization.master')
@section('content')

<div class="container-fluid p-0">

    
    <div class="row mb-2 mb-xl-3">
   

        

       
        
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('text.dashboard')}} - {{Auth::user()->organization->name ?? ''}}</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">{{__('text.department')}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$departments->count()}}</h1>
                                        <div class="mb-1">
                                            <a href="{{route('department.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <i class="align-middle" data-feather="box" style="width: 50px;  height: 50px;"></i>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">{{__('text.employees')}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$employees->count()}}</h1>
                                        <div class="mb-1">
                                            <a href="{{route('employee.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
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
                                <h5 class="card-title mb-4">{{__('text.type_meeting')}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$type_meetings->count()}}</h1>
                                        <div class="mb-1">
                                            <a href="{{route('type-meeting.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <i class="align-middle" data-feather="file-text" style="width: 50px;  height: 50px;"></i>
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
                                            <a href="{{route('meeting.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <i class="align-middle" data-feather="file" style="width: 50px;  height: 50px;"></i>
                                    </div>
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
                    <h5 class="card-title">{{__('text.tasks')}}</h5>
                    <h6 class="card-subtitle text-muted">{{__('text.done')}} {{__('text.and')}} {{__('text.not_done')}}</h6>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="chartjs-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.type_meeting')}}</h5>
                    <h6 class="card-subtitle text-muted">{{__('text.distribuition_types')}}.</h6>
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
    <hr>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">{{__('text.invoice')}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$invoice->count()}}</h1>
                                        <div class="mb-1">
                                            <a href="{{route('invoice.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <i class="align-middle" data-feather="credit-card" style="width: 50px;  height: 50px;"></i>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">{{__('text.tickets')}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$tickets->count()}}</h1>
                                        <div class="mb-1">
                                            <a href="{{route('tickets.index')}}"><i class="align-middle" data-feather="eye"></i>{{__('text.view')}}</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <i class="align-middle" data-feather="tag" style="width: 50px;  height: 50px;"></i>
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
                    label: @json(__('text.type_meeting')),
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        var data_bar = @json($data_bar);
        var done = @json($task_done);
        var not_done = @json($task_not_done);
        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: {
                labels: data_bar,
                datasets: [{
                    label: @json(__('text.done')),
                    backgroundColor: window.theme.success,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: done,
                    barPercentage: .75,
                    categoryPercentage: .5
                }, {
                    label: @json(__('text.not_done')),
                    backgroundColor: window.theme.danger,
                    borderColor: window.theme.danger,
                    hoverBackgroundColor: window.theme.danger,
                    hoverBorderColor: window.theme.danger,
                    data: not_done,
                    barPercentage: .75,
                    categoryPercentage: .5
                },
            ]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
@endsection