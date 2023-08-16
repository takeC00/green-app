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
    <ol>
        @foreach($data as $item)
        <li>
            {{$item->name}}
            [{{$item->email}}]
        </li>
        @endforeach
    </ol>
</body>
