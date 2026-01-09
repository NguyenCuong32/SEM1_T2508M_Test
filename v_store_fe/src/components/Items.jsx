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
      expired_date: editingItem.expried_date ?? "",
      note: editingItem.note ?? "",
    };
  }, [editingItem, emptyForm]);

  const [form, setForm] = useState(emptyForm);

  // ✅ SYNC FORM KHI editingItem THAY ĐỔI (CHUẨN REACT)
  useEffect(() => {
    setForm(initialForm);
  }, [initialForm]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const payload = {
      ...form,
      expried_date: form.expired_date,
    };

    try {
      if (editingItem) {
        await api.put(`/items/${editingItem.id}`, payload);
      } else {
        await api.post("/items", payload);
      }

      onSuccess();
      setForm(emptyForm);
    } catch (err) {
      console.error("Submit item error:", err);
    }
  };

  return (
    <form onSubmit={handleSubmit} className="item-form card p-3 mb-3">
      <div className="row g-2">
        <input
          className="form-control col"
          placeholder="Item Code"
          value={form.item_code}
          onChange={(e) => setForm({ ...form, item_code: e.target.value })}
          required
        />
        <input
          className="form-control col"
          placeholder="Item Name"
          value={form.item_name}
          onChange={(e) => setForm({ ...form, item_name: e.target.value })}
          required
        />
        <input
          type="number"
          className="form-control col"
          value={form.quantity}
          onChange={(e) => setForm({ ...form, quantity: e.target.value })}
        />
        <input
          type="date"
          className="form-control col"
          value={form.expired_date}
          onChange={(e) =>
            setForm({ ...form, expired_date: e.target.value })
          }
        />
        <input
          className="form-control col"
          placeholder="Note"
          value={form.note}
          onChange={(e) => setForm({ ...form, note: e.target.value })}
        />
      </div>

      <button className="btn btn-success mt-3 w-100">
        {editingItem ? "Update" : "Add New"}
      </button>
    </form>
  );
}
