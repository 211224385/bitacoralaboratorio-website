@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">

                    <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario </a>
                    <ul class="list-group">
                     @foreach($users as $user)
                        <li class="list-group-item">

                            <a href="{{ route('users.edit', $user) }}"> 
                                {{$user->name}} {{$user->paternal_surname}} <small>{{$user->email}} </small>
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
