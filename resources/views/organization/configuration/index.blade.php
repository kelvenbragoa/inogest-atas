@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">
   

    <h1 class="h3 mb-3">{{__('text.config')}}</h1>

    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.config')}}</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                        {{__('text.account')}}
                    </a>
                   
                    
                    
                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title mb-0">{{__('text.info')}}</h5>
                        </div>
                        <div class="card-body">
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

                        @if (Session::has('messageSuccessOrganization'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{Session::get('messageSuccessOrganization')}}</strong>
                            </div>
                            </div>
                        @endif

                            <form method="POST" action="{{ route('configuration.update', $organization->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="inputFirstName">{{__('text.name')}}</label>
                                                <input type="text" class="form-control" id="inputFirstName" name="name" value="{{$organization->name}}" required>
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$organization->email}}" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress">{{__('text.mobile')}}</label>
                                            <input type="text" class="form-control" id="inputAddress" name="mobile" value="{{$organization->mobile}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress2">{{__('text.address')}}</label>
                                            <input type="text" class="form-control" id="inputAddress2" name="address" value="{{$organization->address}}">
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputCity">{{__('text.country')}}</label>
                                                <select id="inputState" class="form-control" name="country_id" required>
                                                    <option value="">{{__('text.choose')}}...</option>
                                                    @foreach (\App\Models\Country::orderBy('name','asc')->get() as $item)
                                                        <option value="{{$item->id}}" @if ($item->id == $organization->country_id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                   
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label" for="inputState">{{__('text.province')}}</label>
                                                <select id="inputState" class="form-control" name="province_id" required>
                                                    <option value="">{{__('text.choose')}}...</option>
                                                    @foreach (\App\Models\Province::orderBy('name','asc')->get() as $item)
                                                        <option value="{{$item->id}}" @if ($item->id == $organization->province_id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label class="form-label" for="inputZip">NUIT</label>
                                                <input type="text" class="form-control" id="inputZip" name="nuit" value="{{$organization->nuit}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="inputCity">Website</label>
                                                <input type="text" class="form-control" id="inputCity" name="website" value="{{$organization->website}}">
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="Charles Hall" src="storage/{{$organization->image}}" class="rounded-circle img-responsive mt-2" width="400" height="400" />
                                            <div class="mt-2">
                                                <input class="btn btn-primary" type="file" name="image" id="">
                                                {{-- <span ><i class="fas fa-upload"></i> Upload</span> --}}
                                            </div>
                                            <small>{{__('message.image_message')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">{{__('text.submit')}}</button>
                            </form>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title mb-0">{{__('text.account')}}</h5>
                        </div>
                        <div class="card-body">
                           
                             
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="inputFirstName">{{__('text.name')}}</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="name" value="{{$user->name}}" readonly>
                                    </div>
                                   
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputEmail4">{{__('text.email')}}</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputAddress">{{__('text.mobile')}}</label>
                                    <input type="text" class="form-control" id="inputAddress" name="mobile" value="{{$user->mobile}}" readonly>
                                </div>
                               
                             

                        </div>
                    </div>
                    <div class="card">
                    <div class="card-body">
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

                        @if (Session::has('messageSuccessPassword'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{Session::get('messageSuccessPassword')}}</strong>
                            </div>
                            </div>
                        @endif
                        <h5 class="card-title">Password</h5>

                        <form method="POST" action="{{URL::to('/organization-changepassword')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputPasswordCurrent">{{__('text.current_password')}}</label>
                                <input type="password" class="form-control" id="inputPasswordCurrent" name="current_password" required>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputPasswordNew">{{__('text.new_password')}}</label>
                                <input type="password" class="form-control" id="inputPasswordNew" name="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputPasswordNew2">{{__('text.verify_password')}}</label>
                                <input type="password" class="form-control" id="inputPasswordNew2" name="new_confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('text.submit')}}</button>
                        </form>

                    </div>
                </div>

                    

        </div>



              

               
            </div>
        </div>
    </div>

</div>

@endsection