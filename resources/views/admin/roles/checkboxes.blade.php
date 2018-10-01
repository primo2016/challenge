@foreach ($roles as $role)
	<div class="checkbox">
		<label>
			<input name="roles[]" type="checkbox" value="{{ $role->id }}"
				{{$user->roles->contains($role->id) ? 'checked' : '' }}>
			{{ $role->name }} <br>

		</label>
	</div>
@endforeach