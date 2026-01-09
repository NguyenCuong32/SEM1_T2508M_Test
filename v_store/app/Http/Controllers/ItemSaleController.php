<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index(Request $request)
    {
        $query = ItemSale::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('item_name', 'like', '%' . $request->search . '%');
        }

        // Paginate 13 items per page as requested
        $items = $query->paginate(13);
        
        // Append search query to pagination links
        $items->appends($request->all());

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required|alpha_num|max:6|unique:item_sale,item_code',
            'item_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:50',
            'quantity' => 'required|numeric|min:0',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.alpha_num' => 'Item code must not contain special characters.',
            'item_name.regex' => 'Item name must not contain special characters.',
        ]);

        ItemSale::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit(ItemSale $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, ItemSale $item)
    {
        $request->validate([
            'item_code' => 'required|alpha_num|max:6|unique:item_sale,item_code,' . $item->id,
            'item_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:50',
            'quantity' => 'required|numeric|min:0',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.alpha_num' => 'Item code must not contain special characters.',
            'item_name.regex' => 'Item name must not contain special characters.',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(ItemSale $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
