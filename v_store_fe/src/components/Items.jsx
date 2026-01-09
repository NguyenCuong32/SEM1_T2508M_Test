import { useEffect, useMemo, useState } from "react";
import api from "../api/api";
import "../assets/items.css";

export default function ItemForm({ editingItem, onSuccess }) {
  const emptyForm = useMemo(
    () => ({
      item_code: "",
      item_name: "",
      quantity: "",
      expired_date: "",
      note: "",
    }),
    []
  );

  const initialForm = useMemo(() => {
    if (!editingItem) return emptyForm;

    return {
      item_code: editingItem.item_code ?? "",
      item_name: editingItem.item_name ?? "",
      quantity: editingItem.quantity ?? "",
      // Fix: Ưu tiên lấy expired_date, nếu không có mới lấy cái sai chính tả expried_date
      expired_date: editingItem.expired_date ?? editingItem.expried_date ?? "",
      note: editingItem.note ?? "",
    };
  }, [editingItem, emptyForm]);

  const [form, setForm] = useState(emptyForm);

  // Sync form khi editingItem thay đổi
  useEffect(() => {
    setForm(initialForm);
  }, [initialForm]);

 const handleSubmit = async (e) => {
 e.preventDefault();

    // Xử lý ngày tháng: Chuyển từ YYYY-MM-DD (input HTML) sang DD/MM/YYYY (Backend yêu cầu)
    let formattedDate = null;
    if (form.expired_date) {
        // form.expired_date đang là "2026-01-09"
        // split('-') -> ["2026", "01", "09"]
        // reverse() -> ["09", "01", "2026"]
        // join('/') -> "09/01/2026"
        formattedDate = form.expired_date.split('-').reverse().join('/');
    }

// CHUẨN HÓA DỮ LIỆU TRƯỚC KHI GỬI
 const payload = {
item_code: form.item_code,
item_name: form.item_name,
 quantity: form.quantity ? Number(form.quantity) : 0,
      // Dùng biến đã format ở trên
expired_date: formattedDate, 
note: form.note,
};

 console.log("Payload gửi đi:", payload); 

 try {
 if (editingItem) {
 await api.put(`/items/${editingItem.id}`, payload);
 } else {
 await api.post("/items", payload);
}
onSuccess();
setForm(emptyForm);
 } catch (err) {
 console.error("Lỗi chi tiết:", err.response?.data); 
      // Hiển thị lỗi rõ ràng hơn
      const errorMsg = err.response?.data?.message || "Có lỗi xảy ra";
 alert("Lỗi: " + errorMsg);
 }
 };

  return (
    <form onSubmit={handleSubmit} className="item-form card p-3 mb-3">
      <div className="row g-2">
        <div className="col-md-2">
          <input
            className="form-control"
            placeholder="Item Code"
            value={form.item_code}
            onChange={(e) => setForm({ ...form, item_code: e.target.value })}
            required
          />
        </div>
        <div className="col-md-3">
          <input
            className="form-control"
            placeholder="Item Name"
            value={form.item_name}
            onChange={(e) => setForm({ ...form, item_name: e.target.value })}
            required
          />
        </div>
        <div className="col-md-2">
          <input
            type="number"
            className="form-control"
            placeholder="Qty"
            value={form.quantity}
            onChange={(e) => setForm({ ...form, quantity: e.target.value })}
          />
        </div>
        <div className="col-md-3">
          <input
            type="date"
            className="form-control"
            value={form.expired_date}
            onChange={(e) => setForm({ ...form, expired_date: e.target.value })}
          />
        </div>
        <div className="col-md-2">
          <input
            className="form-control"
            placeholder="Note"
            value={form.note}
            onChange={(e) => setForm({ ...form, note: e.target.value })}
          />
        </div>
      </div>

      <div className="mt-3">
        <button className="btn btn-success w-100">
          {editingItem ? "Update Item" : "Add New Item"}
        </button>
        {/* Nút hủy edit nếu cần */}
        {editingItem && (
             <button 
                type="button" 
                className="btn btn-secondary w-100 mt-2"
                onClick={() => { onSuccess(); setForm(emptyForm); }} // Hack nhẹ để clear edit mode
             >
                Cancel Edit
             </button>
        )}
      </div>
    </form>
  );
}