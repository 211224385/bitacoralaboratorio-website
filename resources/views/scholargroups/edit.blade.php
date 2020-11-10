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


                    {{ Form::model($scholargroup, ['route' => ['scholargroups.update', $scholargroup], 'method' => 'PATCH']) }}
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

                    <br>

                        {{ Form::submit('Guardar') }}
                     {{Form::close() }}
                      <br> 
                    <p>Aqui podrás añadir estudiantes a este grupo</p>
                     {{Form::open (['route' => ['scholargroups.students', $scholargroup]]) }}
                     {{Form::select('student_id', $students) }}
                    
                      {{ Form::submit('Agregar') }}

                     {{Form::close() }}


                     @if($scholargroup->students->isEmpty())
                        <p>Aún no ha agregado estudiantes</p>
                     @else
                        <ul>
                            @foreach($scholargroup->students as $student)
                                <li>{{ $student->code }} - {{ $student->name }}
                                {{ Form::open(['route'=> ['scholargroups.students.destroy', $scholargroup], 'method' => 'DELETE']) }}

                            {{ Form::hidden('student_id', $student->id) }}
                        {{ Form::submit('Remover') }}
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
