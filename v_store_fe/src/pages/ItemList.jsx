import { useEffect, useState } from "react";

function ItemList() {
  const [items, setItems] = useState([]);
  const [showForm, setShowForm] = useState(false);
  const [isEdit, setIsEdit] = useState(false);
  const [currentId, setCurrentId] = useState(null);

  const [formData, setFormData] = useState({
    item_code: "",
    item_name: "",
    quantity: "",
    expired_date: ""
  });

  /* ================= LOAD ITEMS ================= */
  const loadItems = () => {
    fetch("http://127.0.0.1:8000/api/items")
      .then(res => res.json())
      .then(data => setItems(data));
  };

  useEffect(() => {
    loadItems();
  }, []);

  /* ================= FORM ================= */
  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const openAddForm = () => {
    setFormData({
      item_code: "",
      item_name: "",
      quantity: "",
      expired_date: ""
    });
    setIsEdit(false);
    setCurrentId(null);
    setShowForm(true);
  };

  const openEditForm = (item) => {
    setFormData({
      item_code: item.item_code,
      item_name: item.item_name,
      quantity: item.quantity,
      expired_date: item.expired_date
        ? item.expired_date.split(" ")[0]
        : ""
    });
    setCurrentId(item.id);
    setIsEdit(true);
    setShowForm(true);
  };

  /* ================= SAVE ================= */
  const handleSave = () => {
    const url = isEdit
      ? `http://127.0.0.1:8000/api/items/${currentId}`
      : "http://127.0.0.1:8000/api/items";

    const payload = {
      ...formData,
      quantity: Number(formData.quantity) // ⭐ FIX LỖI QUAN TRỌNG
    };

    fetch(url, {
      method: isEdit ? "PUT" : "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload)
    })
      .then(async res => {
        if (!res.ok) {
          const err = await res.json();
          alert(JSON.stringify(err.errors));
          throw new Error("Save failed");
        }
        return res.json();
      })
      .then(() => {
        loadItems();
        setShowForm(false);
        setIsEdit(false);
        setFormData({
          item_code: "",
          item_name: "",
          quantity: "",
          expired_date: ""
        });
      });
  };

  /* ================= DELETE ================= */
  const deleteItem = (id) => {
    if (!window.confirm("Delete this item?")) return;

    fetch(`http://127.0.0.1:8000/api/items/${id}`, {
      method: "DELETE"
    }).then(() => loadItems());
  };

  /* ================= UI ================= */
  return (
    <div className="container">
      <div className="top-bar">
        <span>V_Store</span>
        <span>Items</span>
      </div>

      <h2 className="title">Sale Items</h2>

      <button className="add-btn" onClick={openAddForm}>
        Add New
      </button>

      {showForm && (
        <div className="form-box">
          <input
            name="item_code"
            placeholder="Item Code"
            value={formData.item_code}
            onChange={handleChange}
          />

          <input
            name="item_name"
            placeholder="Item Name"
            value={formData.item_name}
            onChange={handleChange}
          />

          <input
            type="number"              // ⭐ FIX
            name="quantity"
            placeholder="Quantity"
            value={formData.quantity}
            onChange={handleChange}
          />

          <input
            type="date"
            name="expired_date"
            value={formData.expired_date}
            onChange={handleChange}
          />

          <button onClick={handleSave}>
            {isEdit ? "Update" : "Save"}
          </button>
          <button onClick={() => setShowForm(false)}>Cancel</button>
        </div>
      )}

      <table className="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Expired Date</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {items.map((item, index) => (
            <tr key={item.id}>
              <td>{index + 1}</td>
              <td>{item.item_code}</td>
              <td>{item.item_name}</td>
              <td>{item.quantity}</td>
              <td>{item.expired_date}</td>
              <td className="action">
                <button onClick={() => openEditForm(item)}>✏️</button>
                <button onClick={() => deleteItem(item.id)}>🗑</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      <div className="footer">
        So 8, Ton That Thuyet, Cau Giay, Ha Noi
      </div>
    </div>
  );
}

export default ItemList;
