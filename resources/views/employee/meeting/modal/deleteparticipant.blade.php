<div class="modal" id="exampleModalCenterDeleteParticipant{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Deseja mesmo eliminar este item</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Ao apagar este item, irá apagar todos os registros relacionados a ele.
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('manager-meetingparticipant.destroy', $item->id)}}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-info">Submeter</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>