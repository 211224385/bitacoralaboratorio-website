@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laboratorios</div>

                <div class="card-body">

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

				</div>
			</div>
		</div>
	</div>
</div>

@endsection