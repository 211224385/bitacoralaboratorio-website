@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Grupos Escolares</div>

				<div class="card-body">

					<a href="{{ route('scholargroups.index') }}" class="btn btn-secondary">Regresar</a>

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
						{{Form::number('grade', null, ['class' => 'form-control', 'min'=>1, 'max'=>8]) }}
					<br>
						{{Form::label('start', 'Inicio') }}
					<br>
						{{Form::date('start', null, ['class' => 'form-control']) }}
					<br>
					{{Form::label('end', 'Termino') }}
					<br>
						{{Form::date('end', null, ['class' => 'form-control']) }}
					<br>
					{{Form::label('career_id', 'Id Carrera') }}
					<br>
						{{Form::select('career_id', $careers, null, ['class' => 'form-control']) }}
								
					<br>


						{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
					 {{Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
