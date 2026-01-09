@extends('layouts.app')

@section('content')
<div class="card mt-4 shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fa-solid fa-plus-circle me-2"></i>Add New Item
            <a href="{{ route('item_sale.index') }}" class="btn btn-light btn-sm float-end text-primary fw-bold">
                <i class="fa-solid fa-arrow-left me-1"></i> Back
            </a>
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('item_sale.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="item_code" class="form-label">Item Code <span class="text-danger">*</span></label>
                    <input type="text" name="item_code" class="form-control @error('item_code') is-invalid @enderror" value="{{ old('item_code') }}" required maxlength="6">
                    <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>Letters and numbers only, max 6 characters (e.g., COCA01).</div>
                    @error('item_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" required maxlength="50">
                    <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>No special characters allowed (e.g., Coca Cola).</div>
                    @error('item_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="unit" class="form-label">Unit <span class="text-danger">*</span></label>
                    <select name="unit" class="form-select @error('unit') is-invalid @enderror" required>
                        <option value="Piece">Piece</option>
                        <option value="Bottle">Bottle</option>
                        <option value="Pack">Pack</option>
                        <option value="Box">Box</option>
                        <option value="Can">Can</option>
                        <option value="Bar">Bar</option>
                    </select>
                     @error('unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="product_date" class="form-label">Product Date <span class="text-danger">*</span></label>
                    <input type="date" name="product_date" class="form-control @error('product_date') is-invalid @enderror" value="{{ old('product_date') }}" required>
                    @error('product_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="expried_date" class="form-label">Expired Date <span class="text-danger">*</span></label>
                    <input type="date" name="expried_date" class="form-control @error('expried_date') is-invalid @enderror" value="{{ old('expried_date') }}" required>
                    @error('expried_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="text" name="note" class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" maxlength="60">
                <div class="form-text text-muted"><i class="fa-solid fa-circle-info me-1"></i>Max 60 characters (Optional).</div>
                @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning w-100">
                <i class="fa-solid fa-save me-1"></i> Save Item
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
            // Remove existing client-side error if any
            let invalidFeedback = input.nextElementSibling;
            if (invalidFeedback && invalidFeedback.classList.contains('invalid-feedback')) {
                 // Keep server-side errors until user types? Or just clear/replace.
                 // Strategy: If strict client side, we create/toggle div.
            }

            if (!regex.test(value) && value !== '') {
                input.classList.add('is-invalid');
                // Ensure feedback div exists
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
            // Alpha numeric, max 6
            const regex = /^[a-zA-Z0-9]{1,6}$/;
            validateField(this, regex, 'Item Code must be alpha-numeric and max 6 characters.');
        });

        itemNameInput.addEventListener('blur', function () {
            // No special characters (allow letters, numbers, spaces), max 50
            const regex = /^[a-zA-Z0-9 ]{1,50}$/;
            validateField(this, regex, 'Item Name must not contain special characters.');
        });
    });
</script>
@endpush
@endsection
