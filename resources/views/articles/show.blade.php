@if($article->status=='approve')
    <h1>The Articles Details</h1>

    <h2>{{$article->title}}</h2>

    <h3>{{$article->body}}</h3>


@endif

