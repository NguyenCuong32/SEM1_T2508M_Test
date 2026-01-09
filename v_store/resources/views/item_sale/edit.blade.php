@extends('layouts.app')

@section('content')
<div class="card mt-4 shadow-sm border-0">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Item
            <a href="{{ route('item_sale.index') }}" class="btn btn-light btn-sm float-end fw-bold text-success">
                <i class="fa-solid fa-arrow-left me-1"></i> Back
            </a>
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('item_sale.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="item_code" class="form-label">Item Code <span class="text-danger">*</span></label>
                    <input type="text" name="item_code" class="form-control @error('item_code') is-invalid @enderror" value="{{ old('item_code', $item->item_code) }}" required maxlength="6">
                    <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>Letters and numbers only, max 6 characters (e.g., COCA01).</div>
                    @error('item_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name', $item->item_name) }}" required maxlength="50">
                    <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>No special characters allowed (e.g., Coca Cola).</div>
                    @error('item_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $item->quantity) }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="unit" class="form-label">Unit <span class="text-danger">*</span></label>
                    <select name="unit" class="form-select @error('unit') is-invalid @enderror" required>
                        <option value="Piece" {{ $item->unit == 'Piece' ? 'selected' : '' }}>Piece</option>
                        <option value="Bottle" {{ $item->unit == 'Bottle' ? 'selected' : '' }}>Bottle</option>
                        <option value="Pack" {{ $item->unit == 'Pack' ? 'selected' : '' }}>Pack</option>
                        <option value="Box" {{ $item->unit == 'Box' ? 'selected' : '' }}>Box</option>
                        <option value="Can" {{ $item->unit == 'Can' ? 'selected' : '' }}>Can</option>
                        <option value="Bar" {{ $item->unit == 'Bar' ? 'selected' : '' }}>Bar</option>
                    </select>
                     @error('unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="product_date" class="form-label">Product Date <span class="text-danger">*</span></label>
                    <input type="date" name="product_date" class="form-control @error('product_date') is-invalid @enderror" value="{{ old('product_date', $item->product_date) }}" required>
                    @error('product_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="expried_date" class="form-label">Expired Date <span class="text-danger">*</span></label>
                    <input type="date" name="expried_date" class="form-control @error('expried_date') is-invalid @enderror" value="{{ old('expried_date', $item->expried_date) }}" required>
                    @error('expried_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="text" name="note" class="form-control @error('note') is-invalid @enderror" value="{{ old('note', $item->note) }}" maxlength="60">
                <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>Max 60 characters (Optional).</div>
                @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning w-100">
                <i class="fa-solid fa-rotate me-1"></i> Update Item
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const itemCodeInput = document.querySelector('input[name="item_code"]');
        const itemNameInput = document.querySelector('input[name="item_name"]');

        function validateField(input, regex, errorMsg) {
            const value = input.value;
            let invalidFeedback = input.nextElementSibling;
            
            // Check if next sibling is help text, if so, move to next
            if (invalidFeedback && invalidFeedback.classList.contains('form-text')) {
                invalidFeedback = invalidFeedback.nextElementSibling;
            }

            if (!regex.test(value) && value !== '') {
                input.classList.add('is-invalid');
                if (!invalidFeedback || !invalidFeedback.classList.contains('invalid-feedback')) {
                    invalidFeedback = document.createElement('div');
                    invalidFeedback.className = 'invalid-feedback';
                    input.parentNode.appendChild(invalidFeedback);
                }
                invalidFeedback.innerText = errorMsg;
            } else {
                input.classList.remove('is-invalid');
            }
        }

        itemCodeInput.addEventListener('blur', function () {
            const regex = /^[a-zA-Z0-9]{1,6}$/;
            validateField(this, regex, 'Item Code must be alpha-numeric and max 6 characters.');
        });

        itemNameInput.addEventListener('blur', function () {
            const regex = /^[a-zA-Z0-9 ]{1,50}$/;
            validateField(this, regex, 'Item Name must not contain special characters.');
        });
    });
</script>
@endpush
@endsection
