<a href="{{ route('laboratories.index') }}">Regresar</a>

{{ Form::open(['route'=> ['laboratories.destroy', $laboratory], 'method' => 'DELETE']) }}

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


{{ Form::model($laboratory, ['route' => ['laboratories.update', $laboratory], 'method' => 'PATCH']) }}
	{{Form::text('label') }}

<br>

    {{ Form::submit('Guardar') }}
 {{Form::close() }}
