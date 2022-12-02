@extends('layout_manager.master')
@section('content')


<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tickets')}}</h1>

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
       
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.tickets')}}</h5>
                </div>
                <div class="card-body">
                   
                  <p>{{__('text.subject')}}: {{$ticket->subject}}</p>
                  <p>{{__('text.status')}}: @if ($ticket->status == 0)
                    <span class="badge bg-danger">{{__('text.closed')}}</span>
                @else
                <span class="badge bg-success">{{__('text.opened')}}</span>
                @endif
            </p>
                  <p>{{__('text.date')}}: {{$ticket->created_at->format('d-m-Y H:i')}}</p>
                  <p>{{__('text.update')}}: {{$ticket->created_at->format('d-m-Y H:i')}}</p>
                  <p>{{__('text.type')}} {{__('text.tickets')}}: {{$ticket->type->name}}</p>
                  <p>{{__('text.message')}}: {!! $ticket->message !!}</p>
                <hr>
                <p>{{__('text.write_message')}}:</p>

                <form method="POST" id="form" action="{{route('tickets-message.store')}}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="inputEmail4">{{__('text.message')}}</label>
                            <textarea id="default-editor" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <button type="submit" class="btn btn-primary" id="buttonSubmit">{{__('text.submit')}}</button>
                    <div class="spinner-border text-info mr-2" role="status" id="spinner" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
                </form>

                <hr>


                </div>

                @foreach ($ticket->messages as $item)
                <div class="d-flex align-items-start m-4">
                    <img src="/storage/{{Auth::user()->organization->image}}" width="36" height="36" class="rounded-circle mr-2" alt="">
                    <div class="flex-grow-1">
                        <strong>{{$item->name}}</strong> {{__('text.replied_on')}} <strong>T-{{$ticket->id}}</strong><br />
                        <small class="text-muted">{{$item->created_at->format('H:i d-m-Y')}}</small>
                            <br><small>{{__('text.message')}}</small>
                            <div class="border text-sm text-muted p-2 mt-1" style="border-radius: 10px; background-color:rgb(235, 235, 235)">
                                {!! $item->message !!}
                            </div>
                           
                            
                        {{-- <a href="" class="btn btn-sm btn-info mt-1"><i class="feather-sm" data-feather="message-square"></i>Responder</a> --}}
                    </div>
                </div>
                @endforeach
                
                
              
       
            </div>
      



     

</div>
</div>
<script>
    tinymce.init({
  selector: 'textarea#default-editor'
});
  </script>

<script>
    document.getElementById("buttonSubmit").onclick = function() {myFunction()};

    function myFunction() {

    document.getElementById('buttonSubmit').style.display = "none";
    document.getElementById('spinner').style.display = "block";
    document.getElementById('form').submit();
    }
</script>
@endsection