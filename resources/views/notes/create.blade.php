<form action="{{ route('notes.store') }}" method="post">

    {{ csrf_field() }}

    <textarea name="title"></textarea>
    <textarea name="content"></textarea>
    <BR>
    <input type="submit">

</form>