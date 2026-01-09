@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('items.update', $item->id) }}">
    @csrf
    @method('PUT')

    <input name="item_code" value="{{ $item->item_code }}" class="form-control mb-2">
    <input name="item_name" value="{{ $item->item_name }}" class="form-control mb-2">
    <input name="quantity" value="{{ $item->quantity }}" class="form-control mb-2">
    <button class="btn btn-primary">Update</button>
</form>
@endsection
