<?php
namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index() {
        $items = ItemSale::orderByDesc('id')->get();
        return view('items.index', compact('items'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'item_code' => ['required','regex:/^[A-Za-z0-9]+$/'],
            'item_name' => ['required','regex:/^[A-Za-z0-9\s]+$/u'],
            'quantity' => ['nullable','numeric'],
            'expried_date' => ['nullable','date'],
            'note' => ['nullable','max:60'],
        ]);
        ItemSale::create($data);
        return redirect()->route('items.index');
    }

    public function edit(ItemSale $item) {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, ItemSale $item) {
        $data = $request->validate([
            'item_code' => ['required','regex:/^[A-Za-z0-9]+$/'],
            'item_name' => ['required','regex:/^[A-Za-z0-9\s]+$/u'],
            'quantity' => ['nullable','numeric'],
            'expried_date' => ['nullable','date'],
            'note' => ['nullable','max:60'],
        ]);
        $item->update($data);
        return redirect()->route('items.index');
    }
}
