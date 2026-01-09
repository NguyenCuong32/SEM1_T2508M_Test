import { useState } from "react";
import axios from "axios";

export default function ItemForm({ onSuccess }) {
  const [form, setForm] = useState({
    item_code: "",
    item_name: "",
    quantity: "",
    expired_date: "",
    note: "",
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const submit = async () => {
    if (!form.item_code || !form.item_name || form.quantity <= 0) {
      alert("Vui lòng nhập đủ dữ liệu");
      return;
    }

    await axios.post("http://127.0.0.1:8000/api/items", form);
    onSuccess();
    setForm({
      item_code: "",
      item_name: "",
      quantity: "",
      expired_date: "",
      note: "",
    });
  };

  return (
    <div className="form-row">
      <input name="item_code" placeholder="Item Code" onChange={handleChange} />
      <input name="item_name" placeholder="Item Name" onChange={handleChange} />
      <input name="quantity" type="number" onChange={handleChange} />
      <input name="expired_date" type="date" onChange={handleChange} />
      <input name="note" placeholder="Note" onChange={handleChange} />
      <button onClick={submit}>Add New</button>
    </div>
  );
}
