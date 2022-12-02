<div class="modal" id="exampleModalCenterEditParticipant{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.edit')}} {{__('text.participants')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-meetingparticipant.update',$item->id)}}">
          @csrf
          @method('PATCH')
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.name')}}:</label>
              <input type="text" class="form-control" placeholder="Nome" value="{{$item->name}}" readonly>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.email')}}:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$item->email}}" readonly>
          </div>

       

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.obs')}}</label>
            <input type="text" class="form-control" id="obs" name="obs" value="{{$item->obs}}" placeholder="{{__('text.obs')}}">
          </div>
         

          
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