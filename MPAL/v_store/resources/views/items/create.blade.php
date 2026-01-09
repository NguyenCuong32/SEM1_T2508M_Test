@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('items.store') }}">
    @csrf

    <input name="item_code" class="form-control mb-2" placeholder="Item Code">
    <input name="item_name" class="form-control mb-2" placeholder="Item Name">
    <input name="quantity" class="form-control mb-2" placeholder="Quantity">
    <button class="btn btn-success">Save</button>
</form>
@endsection
