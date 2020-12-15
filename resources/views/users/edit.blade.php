@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar</a>

                    {{ Form::open(['route'=> ['users.destroy', $user], 'method' => 'DELETE']) }}

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


                    {{ Form::model($user, ['route' => ['users.update', $user], 'method' => 'PATCH']) }}
                        {{Form::label('name', 'Nombre') }}
                    <br>
                        {{Form::text('name', null, ['class' => 'form-control']) }}
                    <br>
                        {{Form::label('paternal_surname', 'Apeído Paterno') }}
                    <br>
                        {{Form::text('paternal_surname', null, ['class' => 'form-control']) }}
                    <br>
                    {{Form::label('maternal_surname', 'Apeído Materno') }}
                    <br>
                        {{Form::text('maternal_surname', null, ['class' => 'form-control']) }}
                    <br>
                    {{Form::label('email', 'Correo electronico') }}
                    <br>
                        {{Form::text('email', null, ['class' => 'form-control']) }}
                    <br>
                    {{Form::label('password', 'Contraseña') }}
                    <br>
                        {{Form::text('password', '', ['class' => 'form-control']) }}
                    <br>
                    {{Form::label('code', 'Código') }}
                    <br>
                    {{Form::text('code', null, ['class' => 'form-control']) }}
                    <br>
                    {{Form::label('role_id', 'Rol') }}
                    <br>
                    {{Form::select('role_id',[1=>'Administrador',2=>'Profesor',3=>'Estudiante'], null, ['class' => 'form-control']) }}
                    <br>

                    <br>

                        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                     {{Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
