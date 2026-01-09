<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>

<h2>EDIT ITEM</h2>

<form method="POST" action="/update/{{ $item->id }}">
    @csrf

    Item Code: <br>
    <input type="text" name="item_code" value="{{ $item->item_code }}"><br><br>

    Item Name: <br>
    <input type="text" name="item_name" value="{{ $item->item_name }}"><br><br>

    Quantity: <br>
    <input type="number" name="quantity" value="{{ $item->quantity }}"><br><br>

    Expired Date: <br>
    <input type="date" name="expired_date" value="{{ $item->expired_date }}"><br><br>

    Note: <br>
    <input type="text" name="note" value="{{ $item->note }}"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="/">⬅ Back</a>

</body>
</html>
