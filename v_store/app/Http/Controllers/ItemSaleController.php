<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => [
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'item_name' => [
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
        ]);

        ItemSale::create($request->all());

        return redirect()->route('items.index');
    }

    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_code' => [
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'item_name' => [
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index');
    }
}
