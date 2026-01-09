<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => ['required', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'item_name' => ['required', 'max:50', 'regex:/^[a-zA-z0-9\s]+$/'],
            'quantity' => ['required', 'numeric'],
            'expried_date' => 'required', 'date',
            'note' => 'nullable|max:60'
        ],
        [
            'item_code.regex' => 'Item Code cannot contain special characters.',
            'item_name.regex' => 'Item Name cannot contain special characters.'
        ]);

        ItemSale::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ItemSale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_code' => ['required', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'item_name' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|max:60'
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ItemSale::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
