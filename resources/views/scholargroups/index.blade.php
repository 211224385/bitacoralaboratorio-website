@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Grupos Escolares</div>

                <div class="card-body">

					<a href="{{ route('scholargroups.create') }}">Nuevo Grupo </a>
					<ul>
					 @foreach($scholargroups as $scholargroup)

					 	<li>

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
