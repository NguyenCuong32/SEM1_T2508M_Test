@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <form action="{{ route('item_sale.index') }}" method="GET">
            <div class="row align-items-center g-2">
                <div class="col-md-3">
                    <h4 class="mb-0 text-primary"><i class="fa-solid fa-list me-2"></i>Sale Items</h4>
                </div>
                
                <!-- Search & Filter Controls -->
                <div class="col-md-9">
                    <div class="row justify-content-end g-2">
                        <!-- Per Page Selector -->
                        <div class="col-auto">
                            <select name="per_page" class="form-select" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 per page</option>
                                <option value="10" {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10 per page</option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20 per page</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per page</option>
                            </select>
                        </div>
                        
                        <!-- Search Bar -->
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fa-solid fa-search text-muted"></i>
                                </span>
                                <input type="text" name="search" class="form-control border-start-0 ps-0" 
                                       placeholder="Search by Code or Name..." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">Search</button>
                                @if(request('search'))
                                    <a href="{{ route('item_sale.index') }}" class="btn btn-outline-secondary" title="Clear Search">
                                        <i class="fa-solid fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Add New Button -->
                        <div class="col-auto">
                            <a href="{{ route('item_sale.create') }}" class="btn btn-warning d-flex align-items-center text-white">
                                <i class="fa-solid fa-plus me-1"></i> Add New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="text-center fw-bold text-uppercase">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            ID
                            @if(request('sort') == 'id') <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i> @else <i class="fa-solid fa-sort text-white-50"></i> @endif
                        </a>
                    </th>
                    <th class="text-start fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'item_code', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Item Code
                            @if(request('sort') == 'item_code') <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i> @else <i class="fa-solid fa-sort text-white-50"></i> @endif
                        </a>
                    </th>
                    <th class="text-start fw-bold text-uppercase" style="width: 150px; min-width: 150px;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'item_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Item Name
                            @if(request('sort') == 'item_name') <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i> @else <i class="fa-solid fa-sort text-white-50"></i> @endif
                        </a>
                    </th>
                    <th class="text-end fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'quantity', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Quantity
                            @if(request('sort') == 'quantity') <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i> @else <i class="fa-solid fa-sort text-white-50"></i> @endif
                        </a>
                    </th>
                    <th class="text-center fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'unit', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Unit
                            @if(request('sort') == 'unit') <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i> @else <i class="fa-solid fa-sort text-white-50"></i> @endif
                        </a>
                    </th>
                    
                    <th class="text-center fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'product_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Product Date
                            @if(request('sort') == 'product_date')
                                <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="fa-solid fa-sort text-white-50"></i>
                            @endif
                        </a>
                    </th>
                    
                    <th class="text-center fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('item_sale.index', array_merge(request()->all(), ['sort' => 'expried_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-white text-decoration-none">
                            Expired Date
                            @if(request('sort') == 'expried_date')
                                <i class="fa-solid fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="fa-solid fa-sort text-white-50"></i>
                            @endif
                        </a>
                    </th>
                    
                    <th class="fw-bold text-uppercase" style="min-width: 200px;">Note</th>
                    <th class="text-center fw-bold text-uppercase" style="width: 1%; white-space: nowrap;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-start"><span class="badge bg-secondary">{{ $item->item_code }}</span></td>
                    <td class="text-start fw-bold">{{ $item->item_name }}</td>
                    <td class="text-end">{{ $item->quantity }}</td>
                    <td class="text-center">{{ $item->unit }}</td>
                    <td class="text-center">{{ $item->product_date ? \Carbon\Carbon::parse($item->product_date)->format('d/m/Y') : '-' }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->expried_date)->format('d/m/Y') }}</td>
                    <td><small class="text-muted">{{ $item->note }}</small></td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('item_sale.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('item_sale.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-warning" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white py-3 border-top-0">
        <div class="d-flex justify-content-center">
            {{ $items->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
