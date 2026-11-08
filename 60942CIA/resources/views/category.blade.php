<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
</head>
<body>
    <h2>{{ $category ? 'Список товаров категории '.$category->name : 'Неверный ID категории' }}</h2>
    @if ($category)
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
