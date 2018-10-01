<!-- Modal -->
<div class="modal fade" id="modalCreateRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action=" {{ route('admin.roles.store', '#create') }} ">
  {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id=" ModalLabel">Datos del Rol</h4>
      </div>
      <div class="modal-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="name">Nombre del Rol</label>
          <input name="name" class="form-control" placeholder="Nombre" value="{{ old('title') }}" autofocus required>

          {!! $errors->first('title', '<span class="help-block">:message</span>') !!}

        </div>

        <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
          <label for="display_name">Nombre a mostrar</label>
          <input name="display_name" class="form-control" placeholder="Nombre a mostrar al usuario" value="{{ old('title') }}" autofocus required>

          {!! $errors->first('display_name', '<span class="help-block">:message</span>') !!}

        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
          <label for="description">Descripcion</label>
          <input name="description" class="form-control" placeholder="Nombre a mostrar al usuario" value="{{ old('title') }}" autofocus required>

          {!! $errors->first('display_name', '<span class="help-block">:message</span>') !!}

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Crear Rol</button>
      </div>
    </div>
  </div>
  </form>
</div>