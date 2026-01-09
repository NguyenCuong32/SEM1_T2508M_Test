<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    # 1.4. Display item 
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    # 1.3 Add item
    public function create()
    {
        return view('items.create');
    }

    # 1.3 Store item
    public function store(Request $request)
    {
        $request->validate([ # 1.2
            'item_code' => [ 
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'item_name' => [ # 1.2
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
        ]);

        ItemSale::create($request->all());

        return redirect()->route('items.index');
    }

    # 1.5 Edit item
    public function edit($id)
    {
        $item = ItemSale::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    # 1.5 Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_code' => [ # 1.2
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
            'item_name' => [ # 1.2
                'required',
                'regex:/^[a-zA-Z0-9 ]+$/'
            ],
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index');
    }
}
