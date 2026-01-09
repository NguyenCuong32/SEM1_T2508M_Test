@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="custom-card">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                    <h4 class="mb-0 text-secondary">Edit Item <span class="text-primary">#{{ $item->id }}</span></h4>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="item_code" class="form-label fw-bold text-secondary">Item Code</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-barcode text-muted"></i></span>
                                    <input type="text" class="form-control @error('item_code') is-invalid @enderror"
                                        id="item_code" name="item_code" value="{{ old('item_code', $item->item_code) }}"
                                        required>
                                    @error('item_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="item_name" class="form-label fw-bold text-secondary">Item Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-tag text-muted"></i></span>
                                    <input type="text" class="form-control @error('item_name') is-invalid @enderror"
                                        id="item_name" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                                        required>
                                    @error('item_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label fw-bold text-secondary">Quantity</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i
                                            class="fas fa-sort-numeric-up text-muted"></i></span>
                                    <input type="number" step="1"
                                        class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                        name="quantity" value="{{ old('quantity', $item->quantity) }}" required>
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="expried_date" class="form-label fw-bold text-secondary">Expired Date</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i
                                            class="fas fa-calendar-alt text-muted"></i></span>
                                    <input type="date" class="form-control @error('expried_date') is-invalid @enderror"
                                        id="expried_date" name="expried_date"
                                        value="{{ old('expried_date', $item->expried_date) }}" required>
                                    @error('expried_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label fw-bold text-secondary">Note</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note"
                                rows="3">{{ old('note', $item->note) }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-block text-end">
                            <a href="{{ route('items.index') }}" class="btn btn-light me-2 text-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-custom px-5">
                                <i class="fas fa-save me-2"></i> Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection