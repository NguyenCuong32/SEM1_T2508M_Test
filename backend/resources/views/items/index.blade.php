<!DOCTYPE html>
<html>
<head>
    <title>Item Sale List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
        a, button {
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2 style="text-align:center ; color: yellow;">Item Sale List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('items.create') }}">➕ Add New Item</a>

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
                <a href="{{ route('items.edit', $item->id) }}">✏ Edit</a>

                <form action="{{ route('items.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Delete this item?')">
                        🗑 Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
