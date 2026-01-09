@extends('layouts.app')

@section('content')
<a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add New Item</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->item_code }}</td>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
