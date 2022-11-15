<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('create')}}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="datetime-local" name="date">
        <button type="submit">add</button>
    </form>
</body>
</html>