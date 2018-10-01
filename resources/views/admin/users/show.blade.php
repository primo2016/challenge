@extends('admin.layout')

@section('content')

	<div class="row">

		<div class="col-md-6">

			<div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="/adminlte/img/user4-128x128.jpg" alt="{{ $user->name }}">

	              <h3 class="profile-username text-center">{{ $user->name }}</h3>

	              <p class="text-muted text-center">{{ $user->roles()->pluck('name')->implode(', ') }}</p>

	              <ul class="list-group list-group-unbordered">
	              	<li class="list-group-item">
	                  <b>Nombre</b> <a class="pull-right">{{ $user->name }}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Miembro desde</b> <a class="pull-right">{{ $user->created_at->format('d/m/Y') }}</a>
	                </li>
	                {{-- <li class="list-group-item">
	                  <b>Archivos</b> <a class="pull-right">{{ $user->posts->count() }}</a>
	                </li> --}}
	                @if ($user->roles()->count())
	                	<li class="list-group-item">
		                  <b>Roles</b> <a class="pull-right">{{ $user->roles()->pluck('name')->implode(', ') }}</a>
		                </li>
	                @endif

	              </ul>
					@if(auth()->user()->hasRoles(['admin']))
					<a href=" {{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
					@endif

	            </div>
	            <!-- /.box-body -->
	          </div>

		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						Roles
					</h3>
				</div>
				<div class="box-body">
					@forelse ($user->roles as $role)
						<strong>{{ $role->display_name }}</strong>


						@unless ($loop->last)
							<hr>
						@endunless
					@empty
						<small class="text-muted">No tiene ningun rol asociado</small>
					@endforelse
				</div>

			</div>

		</div>


	</div>

@endsection