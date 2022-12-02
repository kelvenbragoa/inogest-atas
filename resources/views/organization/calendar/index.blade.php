@extends('layout_organization.master')
@section('content')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var events = @json($cal);
      var calendar = new FullCalendar.Calendar(calendarEl, {
  initialDate: @json($start_date),
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
  },
  height: 'auto',
  navLinks: true, // can click day/week names to navigate views
  editable: false,
  selectable: true,
  selectMirror: true,
  nowIndicator: true,
  events: events
});
      calendar.render();
    });

  </script>
<div class="container-fluid p-0">
    
    <h1 class="h3 mb-3">{{__('text.calendar')}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('meeting.index')}}" class="btn btn-pill btn-primary"><i class="align-middle mr-2" data-feather="arrow-left"></i> {{__('text.back')}}</a> 
                   
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
                   
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection