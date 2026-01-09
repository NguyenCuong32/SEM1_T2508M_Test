<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>

<h2>ADD NEW ITEM</h2>

<form method="POST" action="/add">
    @csrf

    Item Code: <br>
    <input type="text" name="item_code"><br><br>

    Item Name: <br>
    <input type="text" name="item_name"><br><br>

    Quantity: <br>
    <input type="number" name="quantity"><br><br>

    Expired Date: <br>
    <input type="date" name="expired_date"><br><br>

    Note: <br>
    <input type="text" name="note"><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="/">⬅ Back</a>

</body>
</html>
