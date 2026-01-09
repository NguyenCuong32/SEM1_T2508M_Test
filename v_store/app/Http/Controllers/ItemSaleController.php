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
        return view('items.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required|alpha_num',
            'item_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/'
        ]);

        ItemSale::create($request->all());
        return redirect('/');
    }

    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ItemSale::findOrFail($id);
        $item->update($request->all());
        return redirect('/');
    }
}
