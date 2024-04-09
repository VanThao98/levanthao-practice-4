<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new Post</title>
</head>
<body>
    <h1>Create new post</h1>

    {{-- @if ($errors -> any())
        <div style="color: red">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{route('post.store')}}" method="post">
        @csrf
        <label for="title">Title: </label> <br>
        <input type="text" id="title" value="{{old('title')}}"><br><br>
        <label for="description">description: </label><br>
        <textarea name="description" id="description" cols="30" rows="10"type="text" >{{old('description')}}</textarea> <br><br>
        <button type="submit" >Create Post</button>
    </form>

    
</body>
</html>