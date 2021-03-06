@extends('admin.layout')

@section('content')

  <div class="row">

      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box box-header with-border">
            <h3 class="box-title">Datos del archivo</h3>
          </div>

          <div class="box-body">
            @if ($errors->any())
                <ul class="list-group">
                  @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">
                      {{ $error }}
                    </li>
                  @endforeach
                </ul>
              @endif


              <form method="POST" action="{{ route('admin.files.update', $file) }}">
              {{ csrf_field() }} {{ method_field('PUT') }}

                <div class="form-group">
                  <label for="title">Título:</label>
                  <input name="title" value="{{ old('title', $file->title) }}" class="form-control">
                </div>
                <div class="form-group">
                  <label for="description">Descripción:</label>
                  <textarea name="description"  class="form-control">{{ old('description', $file->description) }}</textarea>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary btn-block">Guardar</button>
                </div>
              </form>
          </div>


        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box box-header with-border">
            <h3 class="box-title">Actualización del archivo Excel</h3>

          </div>

          <div class="box-body">
            <div class="form-group">
              <div class="dropzone"></div>
            </div>
            <div class="form-group">
              <p>Este archivo reemplazará el existente.</p>
            </div>
            <div class="form-group">
              <a href=" {{ route('admin.files.index') }}" class="btn btn-primary btn-block">Volver a la lista</a>
            </div>
          </div>
        </div>
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
        url:'/admin/upload/{{ $file->id }}/update',
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