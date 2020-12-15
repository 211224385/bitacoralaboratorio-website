@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Grupos Escolares</div>

                <div class="card-body">

                    <a href="{{ route('scholargroups.create') }}" class="btn btn-primary">Nuevo Grupo </a>
                    <ul class="list-group">
                     @foreach($scholargroups as $scholargroup)

                        <li class="list-group-item">

                            <a href="{{ route('scholargroups.edit', $scholargroup) }}"> 
                                {{$scholargroup->grade}} 
                                {{$scholargroup->career->label}} 
                                <br>
                                {{$scholargroup->start}} 
                                {{$scholargroup->end}} 
                                


                            </a>

                        </li>
                     @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
