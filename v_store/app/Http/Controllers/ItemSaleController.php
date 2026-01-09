<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index()
    {
        $items = ItemSale::all();
        return view('index', compact('items'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => ['required', 'string', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'item_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ]);

        ItemSale::create($request->all());

        return redirect()->route('item_sale.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_code' => ['required', 'string', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'item_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('item_sale.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = ItemSale::findOrFail($id);
        $item->delete();

        return redirect()->route('item_sale.index')->with('success', 'Item deleted successfully.');
    }
}
