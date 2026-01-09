@extends('layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-list me-2"></i>Item List</h5>
        <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Add New Item
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td class="fw-bold">#{{ $item->id }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $item->item_code }}</span></td>
                        <td class="fw-bold text-dark">{{ $item->item_name }}</td>
                        <td>{{ number_format($item->quantity) }}</td>
                        
                        {{-- Logic tô màu nếu hết hạn --}}
                        <td>
                            @if(strtotime($item->expried_date) < time())
                                <span class="text-danger fw-bold"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $item->expried_date }}</span>
                            @else
                                <span class="text-success">{{ $item->expried_date }}</span>
                            @endif
                        </td>
                        
                        <td class="text-muted fst-italic">{{ Str::limit($item->note, 20) }}</td>
                        <td class="text-center">
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-outline-primary btn-sm me-1" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Empty" width="64" class="mb-3 opacity-50">
                            <p>No items found. Click "Add New Item" to start.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection