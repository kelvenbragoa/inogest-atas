@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.meeting_minutes')}} - {{$meeting->department->name}}</h1>

    <div class="row">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.meeting_minutes')}}</h5>
                    <a target="_blank" href="{{URL::to('/organization-download-ata/'.$meeting->id)}}" class="btn btn-pill btn-primary"><i class="far fa-arrow-down"></i>Baixar</a>
                    
                    {{-- <a  class="btn btn-pill btn-secondary"><i class="far fa-file"></i>Enviar Email a todos(Indisponivel)</a> --}}

                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col">
                        <p>ID : A{{$meeting->id}}</p>
                        <p>{{__('text.subject')}} :{{$meeting->subject}}</p>
                        <p>{{__('text.type_meeting')}} : {{$meeting->type_meeting->name}}</p>
                        <p>{{__('text.body')}}</p>
                        {{-- <textarea class="form-control" name="body" id="default-editor" placeholder="Corpo da Acta" rows="20">{{ $meeting->body}}</textarea> --}}
                        {{-- html_entity_decode($meeting->body) --}}
                        {!! $meeting->body !!}
                    </div>
                 
                   </div>
                   <hr>
                   <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>{{__('text.meeting_participants_tasks')}}</strong></h3>
                    </div> 
                </div>
                {{-- <a href="" data-toggle="modal" data-target="#exampleAddEquipment" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar Intervenientes</a>
                @include('employee.meeting.modal.addparticipant') --}}

                <div class="table-responsive">
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:30%">{{__('text.name')}}</th>
                                <th style="width:30%">{{__('text.email')}}</th>
                                <th style="width:30%">{{__('text.obs')}}</th>
                                {{--<th style="width:30%">Envio Email</th>
                                 <th>Ação</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meeting->participants as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->obs}}</td>
                                    {{-- <td>@if ($item->status == 1) <span class="badge bg-success">Enviado</span> @else <span class="badge bg-danger">Pendente</span> @endif</td>
                                    
                                  

                                    <td class="table-action">
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenterEditParticipant{{$item->id}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenterMail{{$item->id}}"><i class="align-middle" data-feather="mail"></i></a>
                                       
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenterDeleteParticipant{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a>
                                    </td>  --}}
                                </tr>
                                @include('organization.meeting.modal.editparticipant')
                                @include('organization.meeting.modal.deleteparticipant')
                                @include('organization.meeting.modal.sendmail')
                            @endforeach
                        </tbody>
                    </table>
                    </div>


                    <hr>
                   <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>{{__('text.meeting_participants_tasks')}}</strong></h3>
                    </div> 
                </div>
                {{-- <a href="" data-toggle="modal" data-target="#exampleAddTask" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar Tarefas</a>
                @include('organization.meeting.modal.addtask') --}}

                <div class="table-responsive">
                    <table id="myTable2" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:20%">{{__('text.name')}}</th>
                                <th style="width:25%">{{__('text.email')}}</th>
                                <th style="width:25%">{{__('text.tasks')}}</th>
                                <th style="width:20%">{{__('text.when')}}</th>
                                <th style="width:20%">{{__('text.status')}}</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meeting->tasks as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->participant->name}}</td>
                                    <td>{{$item->participant->email}}</td>
                                    <td>{{$item->what}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->when))}}</td>
                                    <td>@if ($item->status == 1) <span class="badge bg-success">{{__('text.done')}}</span> @else <span class="badge bg-danger">{{__('text.pending')}}</span> @endif</td>
                                    
                                </tr>
                                @include('organization.meeting.modal.edittask')
                                @include('organization.meeting.modal.deletetask')
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                
                    
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    tinymce.init({
  selector: 'textarea#default-editor',
  readonly : 1
  
});
  </script>

@endsection