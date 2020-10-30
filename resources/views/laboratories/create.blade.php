<a href="{{ route('laboratories.index') }}">Regresar</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{ Form::open(['route' => 'laboratories.store']) }}
	{{Form::text('label') }}

<br>

    {{ Form::submit('Guardar') }}
 {{Form::close() }}
