@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carreras</div>

                <div class="card-body">

                <a href="{{ route('careers.index') }}" class="btn btn-secondary">Regresar</a>

                {{ Form::open(['route'=> ['careers.destroy', $career], 'method' => 'DELETE']) }}

                    {{ Form::submit('Eliminar', ['class' => 'btn btn-danger float-right']) }}
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
                    {{ Form::label('label', 'Nombre de la carrera') }}
                    {{Form::text('label', null, ['class' => 'form-control']) }}

                <br>

                    {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                 {{Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
