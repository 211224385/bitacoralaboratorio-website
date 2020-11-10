@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Grupos Escolares</div>

                <div class="card-body">

					<a href="{{ route('scholargroups.index') }}">Regresar</a>

					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif


					{{ Form::open(['route' => 'scholargroups.store']) }}
						{{Form::label('grade', 'Grado') }}
					<br>
						{{Form::number('grade', null, ['min'=>1, 'max'=>8]) }}
					<br>
						{{Form::label('start', 'Inicio') }}
					<br>
						{{Form::date('start') }}
					<br>
					{{Form::label('end', 'Termino') }}
					<br>
						{{Form::date('end') }}
					<br>
					{{Form::label('career_id', 'Id Carrera') }}
					<br>
						{{Form::select('career_id', $careers) }}
								
					<br>


					    {{ Form::submit('Guardar') }}
					 {{Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
