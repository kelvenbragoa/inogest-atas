@extends('layout_organization.master')
@section('content')
<div class="container-fluid p-0">
   

    <h1 class="h3 mb-3">{{__('text.knowledge_base')}}</h1>

    <div class="row">
        <h2>{{__('text.payment')}}</h2>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                
                
               
                <video controls>
                    <source src="/storage/video/payment.mp4" type="video/mp4">
                    
                  Your browser does not support the video tag.
                  </video>
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.how_to_pay')}}</h5>
                </div>
               
            </div>
        </div>


    </div>

    <hr>

    <div class="row">
        <h2>{{__('text.support')}}</h2>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                
                
               
                <video controls>
                    <source src="/storage/video/create_department.mp4" type="video/mp4">
                    
                  Your browser does not support the video tag.
                  </video>
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.how_to_create_department')}}</h5>
                </div>
               
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                
                
               
                <video controls>
                    <source src="/storage/video/create_employee.mp4" type="video/mp4">
                    
                  Your browser does not support the video tag.
                  </video>
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.how_to_create_employee')}}</h5>
                </div>
               
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                
                
               
                <video controls>
                    <source src="/storage/video/manager_department.mp4" type="video/mp4">
                    
                  Your browser does not support the video tag.
                  </video>
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.how_to_manager_department')}}</h5>
                </div>
               
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                
                
               
                <video controls>
                    <source src="/storage/video/type_meeting.mp4" type="video/mp4">
                    
                  Your browser does not support the video tag.
                  </video>
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('text.type_meeting')}}</h5>
                </div>
               
            </div>
        </div>
    </div>

</div>

@endsection