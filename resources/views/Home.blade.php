<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>HomePage</title>
</head>

<body>
    <h1>測試區：按鈕與連結自己設自己要的頁面，路徑及controller函式記得自己建</h1>
    <div class="user-tom" style="border: 2px solid black; padding: 20px">
        <h2>TomChen</h2>
        <button><a href="{{ route('syntaxPract') }}">語法練習</a></button>
        <button><a href="{{ route('debug') }}">進階debug</a></button>
        <button><a href="{{ route('projTest') }}">專案練習</a></button>
    </div>

</body>

</html>