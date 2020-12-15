@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laboratorios</div>

                <div class="card-body">
                    @if(auth()->user()->role_id==1)
                    <a href="{{ route('laboratories.create') }}" class="btn btn-primary">Nuevo Laboratorio </a>
                    @endif
                    <ul class="list-group">
                     @foreach($laboratories as $laboratory)

                        <li class="list-group-item">
                            @if(auth()->user()->role_id==1)
                            <a href="{{ route('laboratories.edit', $laboratory) }}"> 
                                {{$laboratory->label}}
                            </a>
                            @else
                            {{$laboratory->label}}
                            @endif
|                   
                            <a href="{{ route('laboratories.kiosk.index', $laboratory) }}"> 
                             modo kiosko
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
