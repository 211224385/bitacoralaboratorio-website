<a href="{{ route('users.create') }}">Nuevo Usuario </a>
<ul>
 @foreach($users as $user)

 	<li>

 		<a href="{{ route('users.edit', $user) }}"> 
 			{{$user->label}}
 		</a>

 	</li>
 @endforeach

</ul>
