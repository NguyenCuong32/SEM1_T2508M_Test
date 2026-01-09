@extends('layout')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 fw-bold text-warning"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Item #{{ $item->id }}</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Item Code <span class="text-danger">*</span></label>
                    <input type="text" name="item_code" class="form-control" value="{{ $item->item_code }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Item Name <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Quantity</label>
                    <input type="number" name="quantity" class="form-control" step="0.01" value="{{ $item->quantity }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Expired Date</label>
                    <input type="date" name="expried_date" class="form-control" value="{{ $item->expried_date }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-secondary small text-uppercase">Note</label>
                <textarea name="note" class="form-control" rows="3">{{ $item->note }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('items.index') }}" class="btn btn-light text-secondary">Cancel</a>
                <button type="submit" class="btn btn-warning px-4 text-white"><i class="fa-solid fa-save me-2"></i>Update</button>
            </div>
        </form>
    </div>
</div>
@endsection