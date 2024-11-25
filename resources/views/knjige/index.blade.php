<!DOCTYPE html>
<html>
<head>
<title>Document</title>
</head>
<body>

<h1>Knjige</h1>
<div>
   @if (session()->has('success'))
   <div>
      {{session('success')}}
   </div>

   @endif
</div>
<div>
<div>
   <a href="{{route('knjige.create')}}">Napravi knjigu</a> 
</div>
<table border="1">
    <tr>
       <th>Title</th> 
       <th>Publisher</th> 
       <th>Price</th> 
       <th>Language</th> 
       <th>Description</th> 
       <th>Edit</th> 
       <th>Delete</th> 
    </tr>

    @foreach ($knjige as $knjige )
        <tr>
         <td>{{$knjige->title}}</td>   
         <td>{{$knjige->publisher}}</td>  
         <td>{{$knjige->price}}</td>  
         <td>{{$knjige->language}}</td>  
         <td>{{$knjige->description}}</td>  
         <td>
            <a href="{{route('knjige.edit', ['knjige' => $knjige])}}">Edit</a>
         </td>
         <td>
            <form method="post" action="{{route('knjige.destroy', ['knjige' => $knjige])}}">
                @csrf
                @method('delete')
                <input type="submit" value="delete" />
            </form>
         </td>
        </tr>
    @endforeach

</table>    
</div>

</body>
</html>