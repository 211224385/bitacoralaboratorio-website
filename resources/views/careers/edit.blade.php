<a href="{{ route('careers.index') }}">Regresar</a>

{{ Form::open(['route'=> ['careers.destroy', $career], 'method' => 'DELETE']) }}

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


{{ Form::model($career, ['route' => ['careers.update', $career], 'method' => 'PATCH']) }}
	{{Form::text('label') }}

<br>

    {{ Form::submit('Guardar') }}
 {{Form::close() }}
