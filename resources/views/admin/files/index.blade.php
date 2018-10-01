@extends('admin.layout')

@section('content')
<div class="box">
    <div class="box-header box-primary">
      <h3 class="box-title">Listado de archivos</h3>

      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalCreateFile"><i class="fa fa-plus"></i> Crear archivo</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="files-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Url</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($files as $file)
    		  <tr>
	          <td> {{ $file->id }}</td>
	          <td> {{ $file->title }} </td>
	          <td> {{ isset($file->upload) ? $file->upload->url : ''  }} </td>
	          <td>
              @if ($file->upload === null )
                <a href=" {{ route('admin.files.upload.edit', $file) }} "
                  class="btn btn-default btn-xs"><i class="fa fa-upload"></i>
                </a>
              @endif

              @if(auth()->user()->hasRoles(['admin']))
	          	<a href=" {{ route('admin.files.edit', $file) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a> {{-- {{ route('admin.roles.edit', $user) }} --}}
              <form method="POST" action=" {{ route('admin.files.destroy', $file) }}" style="display: inline">
                  {{ csrf_field() }} {{ method_field('DELETE') }}
                  <button class="btn btn-danger btn-xs" onclick="return confirm('¿Estás seguro de que quieres eliminar este archivo?')"><i class="fa fa-times"></i></button>
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
      $('#files-table').DataTable({
            responsive: true,
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
          }
        });
     });
  </script>

@endpush