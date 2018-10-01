@extends('admin.layout')


@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Datos del rol</h3>
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

					<form method="POST" action="{{ route('admin.roles.update', $role) }}">
						{{ csrf_field() }} {{ method_field('PUT') }}

						<div class="form-group">
							<label for="name">Nombre:</label>
							<input name="name" value="{{ old('name', $role->name) }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="display_name">Nombre visible:</label>
							<input name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control">
						</div>

						<div class="form-group">
							<label for="description">Descripción:</label>
							<input name="description" value="{{ old('description', $role->description) }}" class="form-control">
						</div>

						<button class="btn btn-primary btn-block">Actualizar rol</button>
					</form>
				</div>
			</div>
		</div>
	</div>


@endsection