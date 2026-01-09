@extends('layout')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 fw-bold text-primary"><i class="fa-solid fa-plus-circle me-2"></i>Add New Item</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Item Code <span class="text-danger">*</span></label>
                    <input type="text" name="item_code" class="form-control" placeholder="Ex: A001 (Max 6 chars)" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Item Name <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" class="form-control" placeholder="Enter item name..." required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Quantity</label>
                    <input type="number" name="quantity" class="form-control" step="0.01" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Expired Date</label>
                    <input type="date" name="expried_date" class="form-control" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-secondary small text-uppercase">Note</label>
                <textarea name="note" class="form-control" rows="3" placeholder="Additional information..."></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('items.index') }}" class="btn btn-light text-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-save me-2"></i>Save Item</button>
            </div>
        </form>
    </div>
</div>
@endsection