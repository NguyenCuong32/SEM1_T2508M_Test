<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ItemSale::query();

        // Search Filter
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('item_code', 'like', "%{$search}%")
                  ->orWhere('item_name', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
        $validSorts = ['id', 'item_code', 'item_name', 'quantity', 'unit', 'product_date', 'expried_date'];

        if (in_array($sort, $validSorts)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('id', 'asc');
        }

        // Pagination
        $perPage = $request->input('per_page', 10); // Default 10 items per page
        $items = $query->paginate($perPage)->appends($request->all());

        return view('item_sale.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item_sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => 'required|alpha_num|max:6|unique:item_sale,item_code',
            'item_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:50|unique:item_sale,item_name',
            'quantity' => 'required|integer',
            'unit' => 'required|string|max:20',
            'product_date' => 'required|date',
            'expried_date' => 'required|date|after_or_equal:product_date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.unique' => 'This product already exists, please update from the list.',
            'item_name.unique' => 'This product already exists, please update from the list.',
        ]);

        ItemSale::create($validated);

        return redirect()->route('item_sale.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not required by exam
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ItemSale::findOrFail($id);
        return view('item_sale.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation same as store
        $validated = $request->validate([
            'item_code' => 'required|alpha_num|max:6|unique:item_sale,item_code,' . $id,
            'item_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:50|unique:item_sale,item_name,' . $id,
            'quantity' => 'required|integer',
            'unit' => 'required|string|max:20',
            'product_date' => 'required|date',
            'expried_date' => 'required|date|after_or_equal:product_date',
            'note' => 'nullable|string|max:60',
        ], [
            'item_code.unique' => 'This product already exists, please update from the list.',
            'item_name.unique' => 'This product already exists, please update from the list.',
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($validated);

        return redirect()->route('item_sale.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ItemSale::findOrFail($id);
        $item->delete();

        return redirect()->route('item_sale.index')->with('success', 'Item deleted successfully.');
    }
}
