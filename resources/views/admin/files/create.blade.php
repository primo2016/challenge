<!-- Modal -->
<div class="modal fade" id="modalCreateFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action=" {{ route('admin.files.store') }} ">
  {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id=" ModalLabel">Datos del archivo</h4>
      </div>
      <div class="modal-body">

          @if ($errors->any())
            <ul class="list-group">
              @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          @endif

          <div class="form-group">
            <label for="title">Título:</label>
            <input name="title" value="{{ old('title') }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" value="{{ old('description') }}" class="form-control"></textarea>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Crear archivo</button>
      </div>
    </div>
  </div>
  </form>
</div>

