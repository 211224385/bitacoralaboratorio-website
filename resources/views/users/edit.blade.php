<a href="{{ route('users.index') }}">Regresar</a>

{{ Form::open(['route'=> ['users.destroy', $user], 'method' => 'DELETE']) }}

    {{ Form::submit('Eliminar') }}
 {{Form::close() }}

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{ Form::model($user, ['route' => ['users.update', $user], 'method' => 'PATCH']) }}
	{{Form::text('label') }}

<br>

    {{ Form::submit('Guardar') }}
 {{Form::close() }}
