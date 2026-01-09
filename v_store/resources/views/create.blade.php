@extends('layout')

@section('content')

<h2 class="page-title">Add New Item</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('item_sale.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Item Code</label>
        <input type="text" name="item_code" class="form-control" value="{{ old('item_code') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" step="0.01" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Expired Date</label>
        <input type="date" name="expried_date" class="form-control" value="{{ old('expried_date') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Note</label>
        <input type="text" name="note" class="form-control" value="{{ old('note') }}">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('item_sale.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
