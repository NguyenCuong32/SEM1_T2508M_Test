@extends('layouts.app')

@section('title', __('messages.add_new'))

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('messages.add_new') }}</h1>
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

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-4">
            <div class="md:col-span-4">
                <label for="item_code" class="block text-gray-700 font-bold mb-2">{{ __('messages.item_code') }} <span class="text-red-500">*</span></label>
                <input type="text" name="item_code" id="item_code" value="{{ old('item_code') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('item_code') border-red-500 @enderror" maxlength="6" required>
                <p class="text-xs text-gray-500 mt-1">Max 6 chars.</p>
            </div>
            <div class="md:col-span-8">
                <label for="item_name" class="block text-gray-700 font-bold mb-2">{{ __('messages.item_name') }} <span class="text-red-500">*</span></label>
                <input type="text" name="item_name" id="item_name" value="{{ old('item_name') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('item_name') border-red-500 @enderror" maxlength="50" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="quantity" class="block text-gray-700 font-bold mb-2">{{ __('messages.quantity') }} <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="quantity" id="quantity" value="{{ old('quantity') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('quantity') border-red-500 @enderror" required min="0">
            </div>
            <div>
                <label for="expried_date" class="block text-gray-700 font-bold mb-2">{{ __('messages.expired_date') }} <span class="text-red-500">*</span></label>
                <input type="date" name="expried_date" id="expried_date" value="{{ old('expried_date') }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('expried_date') border-red-500 @enderror" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="note" class="block text-gray-700 font-bold mb-2">{{ __('messages.note') }}</label>
            <textarea name="note" id="note" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('note') border-red-500 @enderror" maxlength="60">{{ old('note') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-md hover:shadow-lg transform transition-all duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                {{ __('messages.save') }}
            </button>
        </div>
    </form>
    </form>

    <!-- Footer Note -->
    <div class="mt-8 bg-orange-400 text-white p-2 rounded text-center text-xs font-bold">
            Số 8, Tôn Thất Thuyết, Cầu giấy, Hà Nội
    </div>
</div>
@endsection
