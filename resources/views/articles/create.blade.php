<h1>Hello</h1>

<form action="{{route('articles.store')}}"
      method="post">

    @csrf
    <div>
      Title :  <input type="text" name="title" >
    </div>

    <br>

    <div>
    Body :   <textarea name="body" id="" cols="30" rows="10"></textarea>
    </div>

    <br>
    <div>
        <label>
          Tags :   <select multiple name="tags[]" >
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </label>
    </div>

    <br>
    <div>
        <label>
          Categories:  <select multiple name="categories[]" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </label>
    </div>

    <br>
    <button type="submit" >send</button>

</form>
