@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 ps-2 pe-2">
        <h5 class="text-muted m-0"><i class="fas fa-list me-2"></i>Item List</h5>
        <a href="{{ route('items.create') }}" class="btn btn-add-new">
            <i class="fas fa-plus me-2"></i>Add New
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover text-center mb-0">
            <thead>
                <tr>
                    <th class="rounded-start">Id</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Expired date</th>
                    <th>Note</th>
                    <th class="rounded-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td class="fw-bold text-secondary">{{ $item->id }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $item->item_code }}</span></td>
                        <td class="fw-semibold text-start ps-5">{{ $item->item_name }}</td>
                        <td>
                            <span class="badge {{ $item->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->quantity }}
                            </span>
                        </td>
                        <td>{{ date('d / m / Y', strtotime($item->expried_date)) }}</td>
                        <td class="text-muted">{{ $item->note }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn-action text-primary me-2" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action text-danger border-0 bg-transparent" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-box-open fa-3x mb-3"></i>
                            <p>No items found. Click "Add New" to create one.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection