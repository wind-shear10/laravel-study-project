<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
</head>
<body>
    <h2>{{ $product ? 'Товар с id '.$product->id : 'Неверный ID товара' }}</h2>
    @if ($product)
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Вес</th>
                    <th>Категория</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->weight_kg }}</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
            </tbody>
        </table>
    @endif
</body>
</html>
