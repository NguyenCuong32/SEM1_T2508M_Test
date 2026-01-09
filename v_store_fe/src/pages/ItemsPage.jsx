import { useEffect, useState, useCallback } from "react";
import api from "../api/api";
import ItemForm from "../components/Items";
import '../assets/items-page.css';

export default function Items() {
  const [items, setItems] = useState([]);
  const [editingItem, setEditingItem] = useState(null);

  const loadItems = useCallback(async () => {
    const res = await api.get("/items");
    setItems(res.data);
    setEditingItem(null);
  }, []);

  useEffect(() => {
  const loadItems = async () => {
    const res = await api.get("/items");
    setItems(res.data);
    setEditingItem(null);
  };

  loadItems();
}, []);



  return (
  <div className="container mt-4 items-page">
    <ItemForm editingItem={editingItem} onSuccess={loadItems} />

    <div className="items-table-wrapper mt-4">
      <table className="table table-bordered items-table">
        <thead>
          <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Expired</th>
            <th>Note</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {items.length === 0 ? (
            <tr>
              <td colSpan="7" className="items-empty">
                No items found
              </td>
            </tr>
          ) : (
            items.map((i, index) => (
              <tr key={i.id}>
                <td>{index + 1}</td>
                <td>{i.item_code}</td>
                <td>{i.item_name}</td>
                <td>{i.quantity}</td>
                <td>{i.expired_date}</td>
                <td>{i.note}</td>
                <td>
                  <button
                    className="btn btn-sm btn-primary"
                    onClick={() => setEditingItem(i)}
                  >
                    Edit
                  </button>
                </td>
              </tr>
            ))
          )}
        </tbody>
      </table>
    </div>
  </div>
);

}
