<!-- resources/views/items/index.blade.php -->
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Item Sale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h3 class="mb-3">Item Sale</h3>

  <form class="row g-2 mb-4" method="post" action="{{ route('items.store') }}">
    @csrf
    <div class="col-md-2"><input name="item_code" class="form-control" placeholder="Code" required></div>
    <div class="col-md-3"><input name="item_name" class="form-control" placeholder="Name" required></div>
    <div class="col-md-2"><input name="quantity" class="form-control" placeholder="Qty"></div>
    <div class="col-md-2"><input type="date" name="expried_date" class="form-control"></div>
    <div class="col-md-2"><input name="note" class="form-control" placeholder="Note"></div>
    <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th><th>Code</th><th>Name</th><th>Qty</th><th>Expried</th><th>Note</th><th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->item_code }}</td>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->expried_date }}</td>
        <td>{{ $item->note }}</td>
        <td><a class="btn btn-sm btn-warning" href="{{ route('items.edit',$item) }}">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
