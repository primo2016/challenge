@extends('admin.layout')

@section('content')

	<div class="row">

		<div class="col-md-3">
		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Adjuntar Archivo Excel</h3>
				</div>

				<div class="box-body">
					<div class="form-group">
						<div class="dropzone"></div>
					</div>

					<div class="form-group">
						<a href=" {{ route('admin.files.index') }}" class="btn btn-primary btn-block">Volver a la lista</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
		</div>
	</div>

@endsection


@push('styles')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

@endpush

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	<!-- CK Editor -->
	<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
 	<!-- bootstrap datepicker -->
	<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>

	<script>

	    // CKEDITOR.replace('editor');
	    // CKEDITOR.config.height = 330;

	    var myDropzone = new Dropzone('.dropzone', {
	    	url:'/admin/upload/{{ $file->id }}/files',
	    	acceptedFiles: '.xls,.xlsx',
	    	maxFilesize: 2,
	    	maxFiles:1,
	    	paramName: 'file',
	    	headers: {
	    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    	},
	    	dictDefaultMessage: 'Arrastra los archivos aquí'

	    });

	    myDropzone.on('error', function(file, res) {
	    	var msg = res.errors.file[0];

	    	$('.dz-error-message:last > span').text(msg);
	    });

	    Dropzone.autoDiscover = false;
	</script>

@endpush