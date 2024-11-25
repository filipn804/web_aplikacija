<!DOCTYPE html>
<html>
<head>
<title>Knjige</title>
</head>
<body>

<h1>Napravi korisnika</h1>
<div>
    @if($errors->any())
    
    <ul>
     
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach

    </ul>

    @endif
</div>
<form method="post" action="{{route('users.store')}}">
    @csrf
    @method('post')
    <div>
    <label>name</label> 
    <input type="text" name="name" placeholder="Name" />
    </div> 
    <div>
    <label>email</label> 
    <input type="text" name="email" placeholder="Email" />
    </div>
    <div>
        <label>password</label> 
        <input type="text" name="password" placeholder="Password" />
        </div>  
    <div>
     <input type="submit" value="Save a New User">
    </div>

</form>

</body>
</html>
