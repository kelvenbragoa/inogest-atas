<div class="modal" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Deseja mesmo @if ($item->is_deleted == 1) reativar @else desativar @endif este item: <br>"{{$item->name}}"</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ($item->is_deleted == 1) Ao reativar este funcionário, irá ter acesso registros. @else Ao desativar este funcionário, não terá acesso ao registros @endif
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('employee.destroy', $item->id)}}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" @if ($item->is_deleted == 1) class="btn btn-success" @else class="btn btn-danger" @endif >@if ($item->is_deleted == 1) Reativar @else Desativar @endif</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>