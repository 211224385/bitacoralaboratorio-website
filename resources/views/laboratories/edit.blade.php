@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laboratorios</div>

                <div class="card-body">

                    <a href="{{ route('laboratories.index') }}" class="btn btn-secondary">Regresar</a>

                    {{ Form::open(['route'=> ['laboratories.destroy', $laboratory], 'method' => 'DELETE']) }}

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


                    {{ Form::model($laboratory, ['route' => ['laboratories.update', $laboratory], 'method' => 'PATCH']) }}
                        {{ Form::label('label', 'Nombre del laboratorio') }}
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

