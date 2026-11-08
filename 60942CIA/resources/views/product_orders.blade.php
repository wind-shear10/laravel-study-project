<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
</head>
<body>
    <h2>{{$product && $orders ? 'Заказы с товаром «'.$product->name.'»' : 'Неверный ID заказа' }}</h2>
    @if ($product && $orders)

    <table border="1">
        <thead>
            <tr>
                <th>id заказа</th>
                <th>Страница заказа</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <a href="{{ url('/order/'.$order->id) }}">
                            Открыть заказ
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
