<!DOCTYPE html>
<html>
<head>
    <title>Sale Items</title>
</head>
<body>

<h2>SALE ITEMS</h2>

<a href="/add">➕ Add New Item</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Expired Date</th>
        <th>Note</th>
        <th>Action</th>
    </tr>

    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->item_code }}</td>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->expired_date }}</td>
        <td>{{ $item->note }}</td>
        <td>
            <a href="/edit/{{ $item->id }}">✏ Edit</a>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
