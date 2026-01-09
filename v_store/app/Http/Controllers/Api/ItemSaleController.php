<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemSale;
use Illuminate\Http\Request;
use Carbon\Carbon; // Nhớ import thư viện Carbon để xử lý ngày tháng

class ItemSaleController extends Controller
{
    public function index()
    {
       
        return ItemSale::orderBy('id', 'desc')->get();
    }

    // Trong ItemSaleController.php

public function store(Request $request)
{
    $data = $request->validate([
        'item_code' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
        'item_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
        'quantity' => 'numeric',
        // SỬA: Đổi d/m/Y thành Y-m-d
        'expired_date' => 'nullable|date_format:Y-m-d', 
        'note' => 'nullable|string'
    ]);



    return ItemSale::create($data);
}

    public function update(Request $request, $id)
    {
        $item = ItemSale::findOrFail($id);

        $data = $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'quantity' => 'numeric',
            // Validate đúng định dạng VN
            'expired_date' => 'nullable|date_format:d/m/Y',
            'note' => 'nullable|string'
        ]);

        // Convert sang chuẩn MySQL trước khi update
        if (!empty($data['expired_date'])) {
            $data['expired_date'] = Carbon::createFromFormat('d/m/Y', $data['expired_date'])->format('Y-m-d');
        }

        $item->update($data);

        return $item;
    }
}