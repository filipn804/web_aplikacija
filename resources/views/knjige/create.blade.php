<!DOCTYPE html>
<html>
<head>
<title>Knjige</title>
</head>
<body>

<h1>Napravi knjigu</h1>
<div>
    @if($errors->any())
    
    <ul>
     
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach

    </ul>

    @endif
</div>
<form method="post" action="{{route('knjige.store')}}">
    @csrf
    @method('post')
    <div>
    <label>title</label> 
    <input type="text" name="title" placeholder="Title" />
    </div> 
    <div>
    <label>publisher</label> 
    <input type="text" name="publisher" placeholder="Publisher" />
    </div> 
    <div>
    <label>price</label> 
    <input type="text" name="price" placeholder="Price" />
    </div> 
    <div>
    <label>language</label> 
    <input type="text" name="language" placeholder="Language" />
    </div> 
    <div>
    <label>description</label> 
    <input type="text" name="description" placeholder="Description" />
    </div> 
    <div>
     <input type="submit" value="Save a New Book">
    </div>

</form>

</body>
</html>
