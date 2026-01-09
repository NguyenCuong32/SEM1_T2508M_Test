<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    // 1. Display list
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    // 2. Show add form
    public function create()
    {
        return view('items.create');
    }

    // 3. Store item (Add New)
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
        ]);

        ItemSale::create($request->all());

        return redirect()->route('items.index');
    }

    // 4. Show edit form
    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // 5. Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index');
    }
}

