@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Edit Item
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="item_code" class="form-label">Item Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('item_code') is-invalid @enderror"
                                    id="item_code" name="item_code" value="{{ old('item_code', $item->item_code) }}"
                                    required>
                                @error('item_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="item_name" class="form-label">Item Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('item_name') is-invalid @enderror"
                                    id="item_name" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                                    required>
                                @error('item_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                <input type="number" step="1" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" required>
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="expried_date" class="form-label">Expired Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('expried_date') is-invalid @enderror"
                                    id="expried_date" name="expried_date"
                                    value="{{ old('expried_date', $item->expried_date) }}" required>
                                @error('expried_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note"
                                rows="3">{{ old('note', $item->note) }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('items.index') }}" class="btn btn-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-add-new px-4">
                                <i class="fas fa-check me-2"></i>Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection