@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">{{__('text.tickets')}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('text.tickets')}}</h5>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    @endif
                    <form method="POST" id="form" action="{{route('tickets.store')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.name')}}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                <input type="text" class="form-control"  value="{{ Auth::user()->email }}" readonly>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.mobile')}}</label>
                                <input type="text" class="form-control"  value="{{ Auth::user()->mobile }}" readonly>
                            </div>
                    
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.type')}} {{__('text.tickets')}}</label>
                                <select type="text" class="form-control" name="type_ticket_id" id="type_ticket_id" placeholder="Departamento" value="{{ old('department_id') }}" required>
                                  <option value="4">{{__('text.support')}}</option>
                                  <option value="5">{{__('text.sales')}}</option>
                                  <option value="6">{{__('text.payment')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.priority')}}</label>
                                <select type="text" class="form-control" name="priority" id="priority" placeholder="Departamento" value="{{ old('department_id') }}" required>
                                  <option value="1">{{__('text.high')}}</option>
                                  <option value="2" selected>{{__('text.medium')}}</option>
                                  <option value="3">{{__('text.low')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputEmail4">{{__('text.subject')}}</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                    
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="inputEmail4">{{__('text.message')}}</label>
                                <textarea id="default-editor" name="message" class="form-control" rows="20" required></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="status" class="form-control"  value="1">
                        <input type="hidden" name="user_id" class="form-control"  value="{{ Auth::user()->id }}">
                        <input type="hidden" name="organization_id" class="form-control"  value="{{ Auth::user()->organization_id }}">

                        <button type="submit" class="btn btn-primary" id="buttonSubmit">{{__('text.submit')}}</button>
                        <div class="spinner-border text-info mr-2" role="status" id="spinner" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
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

<script>
    document.getElementById("buttonSubmit").onclick = function() {myFunction()};

    function myFunction() {

    document.getElementById('buttonSubmit').style.display = "none";
    document.getElementById('spinner').style.display = "block";
    document.getElementById('form').submit();
    }
</script>

@endsection