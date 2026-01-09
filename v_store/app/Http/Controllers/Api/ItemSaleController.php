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
        // Khi trả về frontend, nếu muốn format lại ngày hiển thị, 
        // bạn nên xử lý trong Model (accessor) hoặc Resource, 
        // nhưng ở đây return raw data thì nó sẽ trả về Y-m-d chuẩn của MySQL.
        return ItemSale::orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'quantity' => 'numeric',
            // SỬA 1: Dùng date_format:d/m/Y để bắt buộc frontend gửi đúng định dạng ngày VN
            'expired_date' => 'nullable|date_format:d/m/Y', 
            'note' => 'nullable|string'
        ]);

        // SỬA 2: Chuyển đổi từ dd/mm/yyyy sang yyyy-mm-dd để lưu vào MySQL
        if (!empty($data['expired_date'])) {
            $data['expired_date'] = Carbon::createFromFormat('d/m/Y', $data['expired_date'])->format('Y-m-d');
        }

        // Lưu ý: Mình đã xóa dòng gán lỗi chính tả 'expried_date'. 
        // Hãy đảm bảo cột trong database của bạn tên là 'expired_date'.

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