@extends('layouts.app')
@section('content')
@guest
<!-- if user is not registered show this -->
<div id="content">
   <p> Please login or register first. </p>
</div>
@else
<h1 class="text-center">Notes Organizer - Laravel  </h1>
<div id= "notesWrapper">
	<!-- get all notes in database and list them-->
   @foreach( $notes as $note )
   <li>
      <p> Title: {{ $note->title }} </p>
      <p> Content: {{ $note->content }} </p>
      <form action="{{ route('notes.delete', $note )}}" method="post">
      	<!-- form to delete a note -->
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
         <button type="submit" class="btn btn-default btn-small">Delete</button>
         <button type ="button" class="btn btn-default btn-small" onclick="window.location='{{ route('notes.edit', $note) }}'" name="edit">Edit</button>
      </form>
   </li>
   <p> ------ </p>
   @endforeach
   </ul>
</div>
<!-- end of taskWrapper -->
<!-- two forms to create or search for a note -->
<form action="{{ route('notes.create') }}" class="text-center" style="margin-bottom:10px">
   <button type="submit" class="btn btn-default btn-small">Add note</button>
</form>
<form action="{{ route('notes.searchView') }}" class="text-center">
   <button type="submit" class="btn btn-default btn-small">Search</button>
</form>
@endguest
@endsection