<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>V_Store Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .header-custom { background-color: #e62222ff; color: white; padding: 10px; text-align: center; }
        .table-header { background-color: #db1616ff; color: white; }
       
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="header-custom"><h2>V_Store Items</h2></div>
    <h3 class="text-center mt-3" style="color: #d30000ff;">Sale Items</h3>
    
    <a href="{{ route('items.create') }}" class="btn btn-danger mb-3">Add New</a>

    <table class="table table-bordered text-center">
        <thead class="table-header">
            <tr>
                <th>Id</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expired date</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ number_format($item->quantity, 0) }}</td>
                <td>{{ date('d/m/Y', strtotime($item->expired_date)) }}</td>
                <td>{{ $item->note }}</td>
                <td>
                <div class="d-flex justify-content-center">
                <a href="{{ route('items.edit', $item->id) }}" class="text-primary me-3">
                <i class="fa-solid fa-pen"></i>
                </a>
               <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
               @csrf
               @method('DELETE')
                <button type="submit" style="border: none; background: none;" class="text-danger">
                <i class="fa-solid fa-trash"></i>
                </button>
               </form>
                </div>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>