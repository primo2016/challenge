@extends('admin.layout')


@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Datos Personales</h3>
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

					<form method="POST" action="{{ route('admin.users.update', $user) }}">
						{{ csrf_field() }} {{ method_field('PUT') }}

						<div class="form-group">
							<label for="name">Nombre:</label>
							<input name="name" value="{{ old('name', $user->name) }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input name="email" value="{{ old('email', $user->email) }}" class="form-control">
						</div>

						<div class="form-group">
							<label for="password">Contraseña:</label>
							<input name="password" type="password" class="form-control" placeholder="Contraseña">
						</div>

						<div class="form-group">
							<label for="password_confirmation">Confirmar Contraseña:</label>
							<input name="password_confirmation" type="password" class="form-control" placeholder="Confirmar Contraseña">
						</div>

						<button class="btn btn-primary btn-block">Actualizar usuario</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box box-header with-border">
					<h3 class="box-title">Roles</h3>
				</div>

				<div class="box-body">
					@if(auth()->user()->hasRoles(['admin']))
						<form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
							{{ csrf_field() }} {{ method_field('PUT') }}

								@include('admin.roles.checkboxes')

							<button class="btn btn-primary btn-block">Actualizar roles</button>
						</form>
					@else
						<ul class="list-group">
							@forelse ($user->roles as $role)
								<li class="list-group-item">{{ $role->name }}</li>
							@empty
								<li class="list-group-item">No tiene roles</li>
							@endforelse
						</ul>
					@endif
				</div>
			</div>


		</div>
	</div>


@endsection