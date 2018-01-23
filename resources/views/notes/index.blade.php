@extends('layouts.app')
@section('content')
@guest
<p> Please login or register first. </p>
@else
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
	            <button type="submit" class="btn btn-default btn-small">Delete</button>
	            <button type ="button" class="btn btn-default btn-small" onclick="window.location='{{ route('notes.edit', $note) }}'" name="edit">Edit</button>
	        </form>
	 
	    </li>
	@endforeach
	</ul>

	</div><!-- end of taskWrapper -->
<form action="{{ route('notes.create') }}">
   <button type="submit" class="btn btn-default btn-small">Add note</button>
</form>
<form action="{{ route('notes.searchView') }}">
   <button type="submit" class="btn btn-default btn-small">Search</button>
</form>
</div><!-- end of wrapper -->
@endguest
@endsection
