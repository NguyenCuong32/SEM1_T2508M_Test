@extends('layout.app')

@section('content')
    <div class="custom-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 text-muted">Item List</h4>
            <a href="{{ route('items.create') }}" class="btn btn-custom">
                <i class="fas fa-plus me-2"></i> Add New Item
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th class="rounded-start">Id</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>Note</th>
                        <th class="rounded-end text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td class="fw-bold text-muted">#{{ $item->id }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $item->item_code }}</span></td>
                            <td class="fw-bold">{{ $item->item_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->expried_date)) }}</td>
                            <td class="text-muted">{{ $item->note ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('items.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-primary border-0 me-2" title="Edit">
                                    <i class="fas fa-pencil-alt fa-lg"></i>
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Delete">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="fas fa-box-open fa-3x mb-3 d-block opacity-50"></i>
                                No items found. Click "Add New Item" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection