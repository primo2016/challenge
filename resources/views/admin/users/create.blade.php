@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Datos de Usuario</h3>
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

					<form method="POST" action="{{ route('admin.users.store') }}">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="name">Nombre:</label>
							<input name="name" value="{{ old('name') }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input name="email" value="{{ old('email') }}" class="form-control">
						</div>

						<div class="form-group">
							<label for="password">Contraseña:</label>
							<input name="password" type="password" class="form-control" placeholder="Contraseña">
						</div>

						<div class="form-group">
							<label for="password_confirmation">Confirmar Contraseña:</label>
							<input name="password_confirmation" type="password" class="form-control" placeholder="Confirmar Contraseña">
						</div>

						<div class="form-group col-md-6">
							<label>Roles</label>
							@include('admin.roles.checkboxes')
						</div>

						<button class="btn btn-primary btn-block">Crear usuario</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection