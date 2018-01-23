@extends('layouts.app')
@section('content')
@guest
<p> Please login or register first. </p>
@else


<form method="get" action="{{ route('notes.searchView') }}">
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
				</div>
				<div class="col-md-6">
					<button class="btn btn-success">Search</button>
				</div>
			</div>
		</form>

    
             <h3>Search result </h3>
                @if($notes->count())
				@foreach($notes as $note)
				<p>Title: {{ $note->title}} </p>
			    <p>Content: {{ $note->content }}</p>
					
				@endforeach
			@else
			<tr>
				<td colspan="3">Result not found.</td>
			</tr>
			@endif

@endguest
@endsection