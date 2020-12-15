@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carreras</div>

                <div class="card-body">

                    <a href="{{ route('careers.create') }}" class="btn btn-primary">Nueva Carrera </a>
                    <ul class="list-group">
                     @foreach($careers as $career)

                        <li class="list-group-item"  >

                            <a href="{{ route('careers.edit', $career) }}"> 
                                {{$career->label}}
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
