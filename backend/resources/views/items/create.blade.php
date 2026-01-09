<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 420px;
            margin: 60px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Item</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <label>Item Code</label>
        <input type="text" name="item_code" value="{{ old('item_code') }}" required>

        <label>Item Name</label>
        <input type="text" name="item_name" value="{{ old('item_name') }}" required>

        <label>Quantity</label>
        <input type="number" step="0.01" name="quantity" value="{{ old('quantity') }}" required>

        <label>Expired Date</label>
        <input type="date" name="expried_date" value="{{ old('expried_date') }}" required>

        <label>Note</label>
        <input type="text" name="note" value="{{ old('note') }}">

        <button type="submit">Save Item</button>
    </form>

    <a href="{{ route('items.index') }}" class="back">← Back to List</a>
</div>

</body>
</html>
