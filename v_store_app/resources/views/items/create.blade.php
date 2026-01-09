<!DOCTYPE html>
<html>
<head>
    <title>V_Store - Add New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .v-header { background-color: #e67e22; color: white; padding: 15px; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="v-header"><h1>V_Store Management</h1></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark"><strong>Add New Item</strong></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                            </div>
                        @endif

                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Item Code</label>
                                <input type="text" name="item_code" class="form-control" value="{{ old('item_code') }}" placeholder="Max 6 chars">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" placeholder="Max 50 chars">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Expired Date</label>
                                    <input type="date" name="expired_date" class="form-control" value="{{ old('expired_date') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Note</label>
                                <textarea name="note" class="form-control" rows="2">{{ old('note') }}</textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Save Item</button>
                                <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>