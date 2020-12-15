@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Grupos Escolares</div>

                <div class="card-body">

                    <a href="{{ route('scholargroups.index') }}">Regresar</a>

                    {{ Form::open(['route'=> ['scholargroups.destroy', $scholargroup], 'method' => 'DELETE']) }}

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


                    {{ Form::model($scholargroup, ['route' => ['scholargroups.update', $scholargroup], 'method' => 'PATCH']) }}
                        {{Form::label('grade', 'Grado', null, ['class' => 'form-control']) }}
                    <br>
                        {{Form::number('grade', null, ['min'=>1, 'max'=>8, 'class' => 'form-control']) }}
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

                    <br>

                        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                     {{Form::close() }}
                      <br> 
                    <p>Aqui podrás añadir estudiantes a este grupo</p>
                     {{Form::open (['route' => ['scholargroups.students', $scholargroup]]) }}
                     {{Form::select('student_id', $students, null, ['class' => 'form-control']) }}
                    
                      {{ Form::submit('Agregar', ['class' => 'btn btn-success']) }}

                     {{Form::close() }}

                     <hr>

                     @if($scholargroup->students->isEmpty())
                        <p>Aún no ha agregado estudiantes</p>
                     @else
                        <ul class="list-group">
                            @foreach($scholargroup->students as $student)
                                <li class="list-group-item">{{ $student->code }} - {{ $student->name }}
                                {{ Form::open(['route'=> ['scholargroups.students.destroy', $scholargroup], 'method' => 'DELETE']) }}

                            {{ Form::hidden('student_id', $student->id) }}
                        {{ Form::submit('Remover', ['class' => 'btn btn-danger']) }}
                     {{Form::close() }}

                                </li>
                            @endforeach
                        </ul>
                     @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
