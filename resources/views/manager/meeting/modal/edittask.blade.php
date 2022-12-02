<div class="modal" id="exampleModalCenterEditTask{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('text.edit')}} {{__('text.tasks')}}</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('manager-meetingtask.update',$item->id)}}">
          @csrf
          @method('PATCH')
         
        <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">{{__('text.participants')}}:</label>
              
              <input type="text" class="form-control" value="{{$item->participant->email}}" placeholder="" readonly>
          </div>

        

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.when')}}:</label>
            <input type="date" class="form-control" id="when" name="when" value="{{$item->when}}" placeholder="{{__('text.when')}}">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.what')}}:</label>
            <input type="text" class="form-control" id="what" name="what" value="{{$item->what}}" placeholder="{{__('text.what')}}">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('text.status')}}:</label>
            <select type="text" class="form-control" id="status" name="status" required>
             <option value="1" @if ($item->status == 1) selected @endif>{{__('text.done')}}</option>
             <option value="0" @if ($item->status == 0) selected @endif>{{__('text.pending')}}</option>
            </select>
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