<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
</head>
<body>
    <h2>Список товаров</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Вес</td>
            <td>Категория</td>
        </thead>
    @foreach ($products as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->weight_kg}}</td>
            <td>{{$item->category->name}}</td>
            <td> <a href="{{ url('/product/destroy/'.$item->id) }}">Удалить</a>
             <a href="{{ url('/product/edit/'.$item->id) }}">Редактировать</a> </td>
        </tr>
    @endforeach
    </table>
</body>
</html>
