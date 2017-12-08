<form action="{{ route('notes.update', $note) }}" method="post">
 
    {{ csrf_field() }}
 
    {{ method_field('PUT') }}
 
    <textarea name="title">{{ $note->title }}</textarea>
 
    <BR>
    <input type="submit">
 
</form>