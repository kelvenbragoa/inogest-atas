@extends('layout_manager.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.meeting')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.edit')}} {{__('text.meeting')}}</h5>
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
                    <form action="{{ route('manager-meeting.update', $meeting->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                     
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.subject')}}</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="" value="{{ $meeting->subject }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.date')}}</label>
                                <input type="date" class="form-control" name="date" id="date" placeholder="" value="{{ $meeting->date }}"required>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.start')}}</label>
                                <input type="time" class="form-control" name="start_time" id="start_time" placeholder="" value="{{ $meeting->start_time }}" required>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.end')}}</label>
                                <input type="time" class="form-control" name="end_time" id="end_time" placeholder="" value="{{ $meeting->end_time }}" required>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="inputEmail4">{{__('text.body')}}</label>
                                <textarea class="form-control" name="body" id="default-editor" placeholder="Corpo da Reunião" rows="20">{{ $meeting->body}}</textarea>
                            </div>
                        </div>

                      
                       
        
                        <button type="submit" class="btn btn-primary">{{__('text.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    tinymce.init({
  selector: 'textarea#default-editor'
});
  </script>
@endsection