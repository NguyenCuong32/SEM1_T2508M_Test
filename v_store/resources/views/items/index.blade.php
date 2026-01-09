@extends('layouts.app')

@section('title', __('messages.title'))

@section('content')
<div class="w-full">
    <!-- Header V_Store Items -->
    <div class="bg-orange-500 text-white p-4 rounded-t-lg shadow-md">
        <h1 class="text-3xl font-bold uppercase">V_Store &nbsp; Items</h1>
    </div>

    <!-- Sub-header Sale Items & Add New -->
    <div class="bg-white p-6 shadow-md rounded-b-lg">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-orange-400 uppercase tracking-wide">Sale Items</h2>
            
            <div class="flex items-center space-x-2">
                <!-- Search Form -->
                <form action="{{ route('items.index') }}" method="GET" class="flex">
                    <div class="relative">
                         <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" name="search" placeholder="Search item name..." value="{{ request('search') }}" class="pl-8 px-3 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-300 text-sm">
                    </div>
                    <button type="submit" class="bg-orange-400 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-r-lg shadow-md hover:shadow-lg transition duration-200 flex items-center">
                         <span>Search</span>
                    </button>
                </form>

                 <a href="{{ route('items.create') }}" class="inline-block bg-orange-400 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transform transition-all duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-orange-300 ml-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>{{ __('messages.add_new') }}</span>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-orange-400 text-white text-sm uppercase leading-normal">
                        <th class="py-3 px-4 text-center">Id</th>
                        <th class="py-3 px-4 text-center">{{ __('messages.item_code') }}</th>
                        <th class="py-3 px-4 text-left">{{ __('messages.item_name') }}</th>
                        <th class="py-3 px-4 text-center">{{ __('messages.quantity') }}</th>
                        <th class="py-3 px-4 text-center">{{ __('messages.expired_date') }}</th>
                        <th class="py-3 px-4 text-left">{{ __('messages.note') }}</th>
                        <th class="py-3 px-4 text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($items as $item)
                    <tr class="border-b border-gray-200 hover:bg-orange-50 transition duration-150">
                        <td class="py-3 px-4 text-center whitespace-nowrap">{{ $item->id }}</td>
                        <td class="py-3 px-4 text-center">{{ $item->item_code }}</td>
                        <td class="py-3 px-4 text-left font-medium">{{ $item->item_name }}</td>
                        <td class="py-3 px-4 text-center">{{ $item->quantity }}</td>
                        <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($item->expried_date)->format('d/m/Y') }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->note }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('items.edit', $item->id) }}" class="flex items-center space-x-2 bg-orange-400 hover:bg-orange-600 text-white font-bold py-1 px-3 rounded shadow-sm hover:shadow-md transform transition-all duration-200 active:scale-95 text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if($items->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    No items found.
                </div>
            @endif

            <!-- Pagination Links -->
            <div class="mt-4 px-4">
                {{ $items->links() }}
            </div>
            
             <!-- Footer Note -->
            <div class="mt-8 bg-orange-400 text-white p-2 rounded text-center text-xs font-bold">
                 Số 8, Tôn Thất Thuyết, Cầu giấy, Hà Nội
            </div>
        </div>
    </div>
</div>
@endsection
