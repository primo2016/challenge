@extends('admin.layout')


@section('header')

  <h1>
    USUARIOS
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Usuarios</li>
  </ol>

@stop

@section('content')
<div class="box">
    <div class="box-header box-primary">
      <h3 class="box-title">Listado de usuarios</h3>
      @if(auth()->user()->hasRoles(['admin']))
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear usuarios</a>
      @endif
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="users-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($users as $user)
    		  <tr>
	          <td> {{ $user->id }}</td>
	          <td> {{ $user->name }} </td>
	          <td> {{ $user->email }} </td>
	          <td> {{ $user->roles()->pluck('name')->implode(', ') }} </td> {{-- {{ $user->getRoleNames()->implode(', ') }} --}}
	          <td>
              	<a href=" {{ route('admin.users.show', $user) }} "
                	class="btn btn-default btn-xs"><i class="fa fa-eye"></i>
                </a>
                @if(auth()->user()->hasRoles(['admin']))
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-xs" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')"><i class="fa fa-times"></i></button>
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
      $('#users-table').DataTable({
            "ordering": true,
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
          }
        });
     });
  </script>

@endpush