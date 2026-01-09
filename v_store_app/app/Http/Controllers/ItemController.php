<?php

namespace App\Http\Controllers;
use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        'item_code' => 'required|alpha_num|max:15',
        'item_name' => 'required|string|max:50',
        'quantity' => 'required|numeric',
        'expired_date' => 'required|date',
    ]);
    \App\Models\ItemSale::create($request->all());
    return redirect()->route('items.index')->with('success', 'Thêm mới thành công!');
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
        $item = \App\Models\ItemSale::findOrFail($id);
    return view('items.edit', compact('item'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'item_code' => 'required|alpha_num|max:15',
        'item_name' => 'required|string|max:50',
        'quantity' => 'required|numeric',
        'expired_date' => 'required|date',
    ]);

    $item = \App\Models\ItemSale::findOrFail($id);
    $item->update($request->all());

    return redirect()->route('items.index')->with('success', 'Cập nhật thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $item = \App\Models\ItemSale::findOrFail($id);
       $item->delete();
       return redirect()->route('items.index')->with('success', 'Xóa thành công!');
    }
}
