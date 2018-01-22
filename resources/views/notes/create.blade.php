@extends('layouts.app')
@section('content')
@guest
<p> Please login or register first. </p>
@else

<form action="{{ route('notes.store') }}" method="post">
    {{ csrf_field() }}
	<div class="form-group">
	   <label for="title">Title:</label>
	   <input type="text" class="form-control" name="title">
	</div>
	 <div class="form-group">
	  <label for="txt">Text:</label>
	  <textarea  class="form-control" name="content"></textarea>
	</div>
    
    
    
 <button type="submit" class="btn btn-default btn-small">Add note</button>
</form>

@endguest
@endsection