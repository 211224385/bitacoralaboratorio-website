@extends('layouts.app') 
@push('scripts')
@if(isset($laboratoryVisits))
new Chart(document.getElementById("usageByLaboratory"), {
  type: 'bar',
  data: {
    labels:@json($laboratoryVisits->pluck('label')),
    datasets: [{
      label: 'Visitas',
      data: @json($laboratoryVisits->map(function($laboratory){
      	return $laboratory->workshops->count();
      })),
       backgroundColor: @json($laboratoryVisits->map(function($laboratory){
      	return \Colors\RandomColor::one();
      })),
    }]
  },
  options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
new Chart(document.getElementById("usageByUsers"), {
  type: 'bar',
  data: {
    labels:@json($laboratoryVisits->pluck('label')),
    datasets: [{
      label: 'Usuarios',
      data: @json($laboratoryVisits->map(function($laboratory){
      	return $laboratory->workshops->pluck('user_id')->unique()->count();
      })),
       backgroundColor: @json($laboratoryVisits->map(function($laboratory){
      	return \Colors\RandomColor::one();
      })),
    }]
  },
  options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
var pieChart = new Chart(document.getElementById("usageByCareer"), {
    type: 'pie',
    data: {
        labels:@json($laboratoryVisits->map->workshops->flatten()->groupBy(function ($workshop) {
								    if(is_null($workshop->career)) {
								        return 'usuario (profesores, administradores)';
								    }

								    return $workshop->career->label;
								})->keys() ),
        datasets: [
            {
                data: @json($laboratoryVisits->map->workshops->flatten()->groupBy(function ($workshop) {
								    if(is_null($workshop->career)) {
								        return 'usuario (profesores, administradores)';
								    }

								    return $workshop->career->label;
								})->map(function($group){
									return $group->count();
								})->values()) ,
				backgroundColor: @json($laboratoryVisits->map->workshops->flatten()->groupBy(function ($workshop) {
								    if(is_null($workshop->career)) {
								        return 'usuario (profesores, administradores)';
								    }

								    return $workshop->career->label;
								})->map(function($laboratory){
      	return \Colors\RandomColor::one();
      })->values()),
 								               
            }
        ]
    }
});
@endif
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reportes</div>

                <div class="card-body">
                {{ Form::model(request()->all(),['route' => 'laboratories.reports.index', 'method'=>'get']) }}
						
                		{{Form::label('start', 'fecha inicio') }}
						{{Form::date('start', null, ['required']) }}

					<br>
						{{Form::label('end', 'fecha fin') }}
						{{Form::date('end', null, ['required']) }}

					<br>
						{{Form::label('laboratory_id', 'laboratorio') }}
						{{Form::select('laboratory_id', $laboratories,null,['placeholder'=>'Todos']) }}

					<br>

					    {{ Form::submit('Generar Reporte') }}

					 {{Form::close() }}


					 @if(isset($laboratoryVisits))
					 
					 <h2>Reporte por Visitas</h2>

					 <canvas id="usageByLaboratory" width="600" height="400"></canvas>
					 <canvas id="usageByCareer" width="600" height="400"></canvas>
					 @foreach($laboratoryVisits as $laboratory)
					 <h6>{{ $laboratory->label}} - {{ $laboratory->workshops->count()}} visitas </h6>
					 <table class="table table-striped table-bordered table-hover">
					    <thead>
					        <tr>
					            <th>Carrera</th>
					            <th>Visitas</th>
					       					    
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($laboratory->workshops->groupBy(function ($workshop) {
								    if(is_null($workshop->career)) {
								        return 'usuario (profesores, administradores)';
								    }

								    return $workshop->career->label;
								} ) as $careerLabel => $group)
 								<tr>
						            <td>{{ $careerLabel }}</td>
						            <td>{{ $group->count()}}</td>
						         
						        </tr>

					    	@endforeach
					        
					    </tbody>
					</table>
					 @endforeach
					 <hr>
					 <h2>Reporte por Usuarios</h2>
					 <canvas id="usageByUsers" width="600" height="400"></canvas>
					  <table class="table table-striped table-bordered table-hover">
					    <thead>
					        <tr>
					            <th>Laboratorio</th>
					            <th>Usuarios</th>
					       					    
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($laboratoryVisits as $laboratory)
 								<tr>

						            <td>{{ $laboratory->label }}</td>
						            <td>{{ $laboratory->workshops->pluck('user_id')->unique()->count()}}</td>
						         
						        </tr>

					    	@endforeach
					        
					    </tbody>
					</table>


					 @endif

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
