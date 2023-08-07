<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
</head>
<style>
    th { background-color:red; padding:10px }
    td { background-color:#eee; padding:10px }
</style>
<body>
    <h1>Hello</h1>
    <p>{{!!$msg!!}}</p>
    <form action="/hello" method="post">
        @csrf
        <div>NAME:<input type="text" name="name" value={{old('name')}}></div>
        <div>MAIL:<input type="text" name="mail" value={{old('mail')}}></div>
        <div>TEL:<input type="text" name="tel" value={{old('tel')}}></div>
        <input type="submit">
    </form>
    <hr>
    <ol>
        @for($i=0; $i<count($keys); $i++)
            <li>{{$keys[$i]}}:{{$values[$i]}}
        @endfor
    </ol>
</body>
