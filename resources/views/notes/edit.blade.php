@extends('layouts.app')
@section('content')
@guest
<!-- if user is not registered show this -->
<div id="content">
   <p> Please login or register first. </p>
</div>
@else
<div id="wrapper">
	<!-- form to edit a specific note -->
   <form action="{{ route('notes.update', $note) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="form-group">
         <label for="title">Title:</label>
         <input type="text" name="title" value="{{$note->title}}">
      </div>
      <div class="form-group">
         <label for="title">Content:</label>
         <textarea  class="form-control" name="content">{{$note->content}}</textarea>
      </div>
      <button type="submit" class="btn btn-default btn-small">Edit note</button>
   </form>
</div>
@endguest
@endsection