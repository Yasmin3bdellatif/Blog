<h1>Edit Article</h1>

<form action="{{ route('articles.update',[$article]) }}" method="POST">
    @method('PATCH')
    @csrf

    <input type="text" name="title" value="{{$article->title}}" >

    <textarea name="body" id="" cols="30" rows="10">{{$article->body}}</textarea>

    <button type="submit">Update</button>
</form>


<form action="{{route('articles.destroy', [$article])}}"
      method="POST">

    @csrf
    @method('DELETE');
    <button type="submit" > Delete </button>

</form>

