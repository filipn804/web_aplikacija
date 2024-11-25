<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
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
<form method="post" action="{{route('knjige.update', ['knjige' => $knjige])}}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$knjige->id}}"/>
    <div>
    <label>title</label> 
    <input type="text" name="title" placeholder="Title" value="{{$knjige->title}}"/>
    </div> 
    <div>
    <label>publisher</label> 
    <input type="text" name="publisher" placeholder="Publisher" value="{{$knjige->publisher}}" />
    </div> 
    <div>
    <label>price</label> 
    <input type="text" name="price" placeholder="Price" value="{{$knjige->price}}" />
    </div> 
    <div>
    <label>language</label> 
    <input type="text" name="language" placeholder="Language" value="{{$knjige->language}}" />
    </div> 
    <div>
    <label>description</label> 
    <input type="text" name="description" placeholder="Description" value="{{$knjige->description}}" />
    </div> 
    <div>
     <input type="submit" value="Update a New Book">
    </div>

</form>

</body>
</html>
