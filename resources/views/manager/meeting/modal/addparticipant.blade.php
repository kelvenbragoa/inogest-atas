<div class="modal" id="exampleAddEquipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.add')}} {{__('text.participants')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-meetingparticipant.store')}}">
          @csrf
         
        <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Proveniência do Participante:</label>
            <select class="form-control" id="test" name="source" onchange="showDiv(this)">
              <option value="0">--</option>
              <option value="1">{{__('text.department')}}</option>
              <option value="2">{{__('text.other_department')}}</option>
              <option value="3">{{__('text.guest')}}</option>
           </select>
          </div>

          {{-- Atual departamento --}}
          <div id="hidden_div_atual" style="display:none;">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.department')}}:</label>
              <input type="text" class="form-control" placeholder="Nome" value="{{Auth::user()->department->name}}" readonly>
            </div>
            <input type="hidden" value="0" class="form-control" id="obs" name="source_atual" placeholder="{{__('text.department')}}">

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">{{__('text.employee')}}:</label>
                <select type="email" class="form-control" id="user_id_atual" name="user_id_atual" placeholder="{{__('text.employee')}}">
                  @foreach ($participants as $item)
                    <option value="{{$item->id}}">{{$item->name}} | {{$item->email}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.obs')}}</label>
              <input type="text" class="form-control" id="obs" name="obs_atual" placeholder="{{__('text.obs')}}">
            </div>

          </div>
               {{-- FIm Atual departamento --}}


        {{-- Outro departamento --}}
          <div id="hidden_div_outro" style="display:none;">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.department')}}:</label>
                <select type="email" class="form-control" id="department_id_outro" name="department_id_outro" placeholder="{{__('text.department')}}">
                  <option value="">{{__('text.select')}} {{__('text.department')}}</option>
                    @foreach ($departments as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">{{__('text.employee')}}:</label>
                <select  class="form-control" id="participants-dropdown" name="user_id_outro" placeholder="{{__('text.employee')}}">
                  
                </select>
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.obs')}}</label>
              <input type="text" class="form-control" id="obs" name="obs_outro" placeholder="{{__('text.obs')}}">
            </div>
            <input type="hidden" value="1" class="form-control" id="obs" name="source_outro" placeholder="Observação">

          </div>
          {{-- FIm Outro departamento --}}

          {{-- Guest departamento --}}
          <div id="hidden_div_guest" style="display:none;">
            

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">{{__('text.email')}}:</label>
                <input type="email" name="email_guest" class="form-control" placeholder="{{__('text.email')}}">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.name')}}:</label>
              <input type="text" name="name_guest" class="form-control" placeholder="{{__('text.name')}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.obs')}}</label>
            <input type="text" class="form-control" id="obs" name="obs_guest" placeholder="{{__('text.obs')}}">
          </div>
          <input type="hidden" value="0" class="form-control" id="obs" name="source_guest" placeholder="{{__('text.obs')}}">


          </div>
          {{-- Guest departamento --}}

         
       

         
         

          <input type="hidden" class="form-control" id="status" name="status" value="0"> 
          <input type="hidden" class="form-control" id="meeting_id" name="meeting_id" value="{{$meeting->id}}"> 
          
        </div>
        <div class="modal-footer">
            
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
        </form>
          
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function showDiv(select){

      if(select.value==0){
        document.getElementById('hidden_div_atual').style.display = "none";
        document.getElementById('hidden_div_outro').style.display = "none";
        document.getElementById('hidden_div_guest').style.display = "none";
       } 
       if(select.value==1){
        document.getElementById('hidden_div_atual').style.display = "block";
        document.getElementById('hidden_div_outro').style.display = "none";
        document.getElementById('hidden_div_guest').style.display = "none";
       } 
       if(select.value==2){
        document.getElementById('hidden_div_atual').style.display = "none";
        document.getElementById('hidden_div_outro').style.display = "block";
        document.getElementById('hidden_div_guest').style.display = "none";
       } 
       if(select.value==3){
        document.getElementById('hidden_div_atual').style.display = "none";
        document.getElementById('hidden_div_outro').style.display = "none";
        document.getElementById('hidden_div_guest').style.display = "block";
       } 
    } 
    </script>

<script>
  
  $(document).ready(function() {

$('#department_id_outro').on('change', function() {
    var id = this.value;
    
    $("#participants-dropdown").html('');
    $.ajax({
    url:"{{url('get-employee')}}",
    type: "POST",
    data: {
    department_id: id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
      console.log(result);
    $('#participants-dropdown').html('<option value="">Selecione Funcionário</option>'); 
    $.each(result.participants,function(key,value){
    $("#participants-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
   
    }
    });
});  
});





    </script>