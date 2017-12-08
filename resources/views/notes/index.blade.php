<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



<div id ="wrapper">
<h1>Notes Organizer - Laravel  </h1>
	<div id= "notesWrapper">
	@foreach( $notes as $note )

	    <li>
	      <p> Title: {{ $note->title }} </p>
	       <p> Content: {{ $note->content }} </p>
	    
	       
	        <form action="{{ route('notes.delete', $note )}}" method="post">
	            {{ csrf_field() }}
	            {{ method_field('DELETE') }}
	            <button type="submit" class="btn btn-default btn-small pull-right">Delete</button>
	            <button type ="button" class="btn btn-default btn-small pull-left" onclick="window.location='{{ route('notes.edit', $note) }}'" name="edit">Edit</button>
	        </form>
	 
	    </li>
	@endforeach
	</ul>

	</div><!-- end of taskWrapper -->
<form action="{{ route('notes.create') }}">
   <button type="submit" class="btn btn-default btn-small pull-left">Add note</button>
</form>
</div><!-- end of wrapper -->

