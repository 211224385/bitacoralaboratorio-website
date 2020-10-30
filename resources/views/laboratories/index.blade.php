<a href="{{ route('laboratories.create') }}">Nuevo Laboratorio </a>
<ul>
 @foreach($laboratories as $laboratory)

 	<li>

 		<a href="{{ route('laboratories.edit', $laboratory) }}"> 
 			{{$laboratory->label}}
 		</a>

 	</li>
 @endforeach

</ul>
