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
    <p>{{$msg}}</p>
    <form action="/hello" method="post">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
