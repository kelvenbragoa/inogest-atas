@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">
    

    <h1 class="h3 mb-3">{{__('text.meeting')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{URL::to('/calendar/'.Auth::user()->organization_id)}}" class="btn btn-pill btn-primary"><i class="far fa-calendar"></i>{{__('text.view')}} {{__('text.calendar')}}</a> 
                   
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
                                <th style="width:20%">ID {{__('text.meeting')}}</th>
                                <th style="width:20%">{{__('text.subject')}}</th>
                                <th style="width:20%">{{__('text.participants')}}</th>
                                <th style="width:20%">{{__('text.tasks')}}</th>
                                <th style="width:20%">{{__('text.date')}}</th>
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meetings as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>A-{{$item->id}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>{{$item->participants->count()}}</td>
                                    <td>{{$item->tasks->count()}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    
                                  

                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/employee-meeting/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        <a href="{{URL::to('/meeting/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                    </td> 
                                </tr>
                                @include('organization.meeting.modaldelete')
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