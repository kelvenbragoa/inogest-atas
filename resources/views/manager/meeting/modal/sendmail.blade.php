<div class="modal" id="exampleModalCenterMail{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{__('message.email_message')}} {{$item->email}}?</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{__('message.email_confirm')}}.
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ URL::to('/sendmail/participant')}}">
                @csrf
                <input type="hidden" name="participant_id" value="{{$item->id}}" id="">
                <input type="hidden" name="meeting_id" value="{{$meeting->id}}" id="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('text.close')}}</button>
                <button type="submit" class="btn btn-info">{{__('text.submit')}}</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>