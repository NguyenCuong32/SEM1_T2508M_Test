<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>

<h2>Edit Item</h2>

{{-- Validation Errors --}}
@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('items.update', $item->id) }}">
    @csrf

    <label>Item Code:</label><br>
    <input type="text" name="item_code" value="{{ $item->item_code }}"><br><br>

    <label>Item Name:</label><br>
    <input type="text" name="item_name" value="{{ $item->item_name }}"><br><br>

    <label>Quantity:</label><br>
    <input type="number" step="0.01" name="quantity" value="{{ $item->quantity }}"><br><br>

    <label>Expired Date:</label><br>
    <input type="date" name="expried_date" value="{{ $item->expried_date }}"><br><br>

    <label>Note:</label><br>
    <input type="text" name="note" value="{{ $item->note }}"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('items.index') }}">⬅ Back to List</a>

</body>
</html>
