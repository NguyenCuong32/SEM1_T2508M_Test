@extends('layouts.app')

@section('title', __('messages.edit_item'))

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('messages.edit_item') }}</h1>
        <a href="{{ route('items.index') }}" class="text-gray-600 hover:text-gray-800 transition duration-200 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            {{ __('messages.cancel') }}
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-4">
            <div class="md:col-span-4">
                <label for="item_code" class="block text-gray-700 font-bold mb-2">{{ __('messages.item_code') }} <span class="text-red-500">*</span></label>
                <input type="text" name="item_code" id="item_code" value="{{ old('item_code', $item->item_code) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('item_code') border-red-500 @enderror" maxlength="6" required>
            </div>
            <div class="md:col-span-8">
                <label for="item_name" class="block text-gray-700 font-bold mb-2">{{ __('messages.item_name') }} <span class="text-red-500">*</span></label>
                <input type="text" name="item_name" id="item_name" value="{{ old('item_name', $item->item_name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('item_name') border-red-500 @enderror" maxlength="50" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="quantity" class="block text-gray-700 font-bold mb-2">{{ __('messages.quantity') }} <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="quantity" id="quantity" value="{{ old('quantity', $item->quantity) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror" required min="0">
            </div>
            <div>
                <label for="expried_date" class="block text-gray-700 font-bold mb-2">{{ __('messages.expired_date') }} <span class="text-red-500">*</span></label>
                <input type="date" name="expried_date" id="expried_date" value="{{ old('expried_date', $item->expried_date) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('expried_date') border-red-500 @enderror" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="note" class="block text-gray-700 font-bold mb-2">{{ __('messages.note') }}</label>
            <textarea name="note" id="note" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('note') border-red-500 @enderror" maxlength="60">{{ old('note', $item->note) }}</textarea>
        </div>

        <div class="flex justify-between items-center">
             <!-- Delete Button -->
            <button type="button" onclick="if(confirm('{{ __('messages.confirm_delete') }}')) document.getElementById('delete-form-{{ $item->id }}').submit();" class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded transform transition-all duration-200 active:scale-95 focus:outline-none flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ __('messages.delete') }}
            </button>

            <!-- Update Button -->
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-md hover:shadow-lg transform transition-all duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                {{ __('messages.update') }}
            </button>
        </div>
    </form>

    <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
