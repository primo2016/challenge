@extends('admin.layout')

@section('content')
<div class="box">
    <div class="box-header box-primary">
      <h3 class="box-title">Listado de roles</h3>
      @if(auth()->user()->hasRoles(['admin']))
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalCreateRole"><i class="fa fa-plus"></i> Crear Rol</button>
      @endif
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="roles-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Nombre Visible</th>
          <th>Descripcion</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($roles as $role)
    		  <tr>
	          <td> {{ $role->id }}</td>
	          <td> {{ $role->name }} </td>
	          <td> {{ $role->display_name }} </td>
	          <td> {{ $role->description }} </td> {{-- {{ $user->getRoleNames()->implode(', ') }} --}}
	          <td>
              	{{-- <a href=" {{ route('admin.users.show', $user) }} "
                	class="btn btn-default btn-xs"><i class="fa fa-eye"></i>
                </a> --}}
              @if(auth()->user()->hasRoles(['admin']))
	          	<a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
              <form method="POST" action=" {{ route('admin.roles.destroy', $role) }}" style="display: inline">
                  {{ csrf_field() }} {{ method_field('DELETE') }}
                  <button class="btn btn-danger btn-xs" onclick="return confirm('¿Estás seguro de que quieres eliminar este rol?')"><i class="fa fa-times"></i></button>
              </form>
              @endif
	          </td>
	        </tr>
        	@endforeach
        </tbody>

      </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@stop

@push('styles')
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
 	<!-- DataTables -->
	<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#roles-table').DataTable({
            responsive: true,
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
          }
        });
     });
  </script>

@endpush