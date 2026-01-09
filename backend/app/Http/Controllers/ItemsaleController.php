<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemsale;

class ItemsaleController extends Controller
{
    public function index()
    {
        $items = Itemsale::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function edit($id)
    {
        $item = Itemsale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'item_code' => ['required', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
                'item_name' => ['required', 'max:50', 'regex:/^[a-zA-z0-9\s]+$/'],
                'quantity' => ['required', 'numeric'],
                'expried_date' => 'required',
                'date',
                'note' => 'nullable|max:60'
            ],
            [
                'item_code.regex' => 'Item Code cannot contain special characters.',
                'item_name.regex' => 'Item Name cannot contain special characters.'
            ]
        );

        Itemsale::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'item_code' => ['required', 'max:6', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'item_name' => ['required', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|max:60'
        ]);

        $item = Itemsale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(string $id)
    {
        $item = Itemsale::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
