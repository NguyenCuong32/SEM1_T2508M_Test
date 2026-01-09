<!DOCTYPE html>
<html>
<head>
    <title>Item Sale List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a.button {
            padding: 6px 10px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>Item Sale List</h2>

<a href="{{ route('items.create') }}" class="button">➕ Add New Item</a>

<br><br>

<table>
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
            <td>{{ $item->expried_date }}</td>
            <td>{{ $item->note }}</td>
            <td>
                <a href="{{ route('items.edit', $item->id) }}">✏️ Edit</a>
            </td>
        </tr>
    @endforeach

</table>

</body>
</html>
