@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $laboratory->label}}</div>

                <div class="card-body">
                    <h2 class="text-center"> 
                        Centro Universitario de los Valles <br> Bienvenido
                    </h2>
                    <br>
                    <form method="POST" action="{{ route('laboratories.kiosk.store', $laboratory) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Código</label> 

                            <div class="col-md-6">
                                
                                <input onkeydown="return (event.keyCode!=13);" id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="off" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input name="duration" style="width:55.56px;" value="15m" type="submit" class="btn btn-primary">
                                 <input name="duration" style="width:55.56px;" value="30m" type="submit" class="btn btn-primary">
                                  <input name="duration" style="width:55.56px;" value="1h" type="submit" class="btn btn-primary">
                                   <input name="duration" style="width:55.56px;" value="2h" type="submit" class="btn btn-primary">
                                    <input name="duration" style="width:55.56px;" value="3h" type="submit" class="btn btn-primary">



                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
