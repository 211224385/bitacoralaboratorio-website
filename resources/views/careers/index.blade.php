<a href="{{ route('careers.create') }}">Nueva Carrera </a>
<ul>
 @foreach($careers as $career)

 	<li>

 		<a href="{{ route('careers.edit', $career) }}"> 
 			{{$career->label}}
 		</a>

 	</li>
 @endforeach

</ul>
