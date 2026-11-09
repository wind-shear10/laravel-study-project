<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
    <style>
        .is-invalid { color: red; }
    </style>
</head>
<body>
    <h2>Редактирование товара</h2>
    <form method="post" action="{{ url('product/update/'.$product->id) }}">
        @csrf
        <label>Наименование</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Цена</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}">
        @error('price')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Вес, кг</label>
        <input type="text" name="weight_kg" value="{{ old('weight_kg', $product->weight_kg) }}">
        @error('weight_kg')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Категория:</label>
        <select name="category_id">
            <option value="" style="display: none;"></option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if (old('category_id', $product->category_id) == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit">
    </form>
</body>
</html>
