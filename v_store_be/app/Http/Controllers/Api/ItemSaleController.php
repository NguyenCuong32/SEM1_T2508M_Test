<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index()
    {
        return response()->json(ItemSale::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => [
                'required',
                'regex:/^[A-Za-z0-9]+$/'
            ],
            'item_name' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/'
            ],
            'quantity' => 'required|numeric',
            'expired_date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        $item = ItemSale::create($request->all());

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = ItemSale::findOrFail($id);

        $request->validate([
            'item_code' => [
                'required',
                'regex:/^[A-Za-z0-9]+$/'
            ],
            'item_name' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/'
            ],
            'quantity' => 'required|numeric',
            'expired_date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
{
    $item = ItemSale::findOrFail($id);
    $item->delete();

    return response()->json(['message' => 'Deleted']);
}
}