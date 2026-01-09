import { useEffect, useState, useCallback } from "react";
import api from "../api/api";
import ItemForm from "../components/Items";
import ItemTable from "../components/ItemTable"; // Import Table
import '../assets/items-page.css';

export default function ItemsPage() {
  const [items, setItems] = useState([]);
  const [editingItem, setEditingItem] = useState(null);

  // --- 1. Khai báo loadItems (Dùng useCallback để tránh lỗi lặp vô hạn) ---
  const loadItems = useCallback(async () => {
    try {
      const res = await api.get("/items");
      // Sắp xếp item mới nhất lên đầu (nếu muốn)
      const sortedItems = res.data.sort((a, b) => b.id - a.id);
      setItems(sortedItems);
      setEditingItem(null); // Reset trạng thái edit
    } catch (error) {
      console.error("Failed to load items:", error);
    }
  }, []); // Dependency array rỗng vì api và setState là ổn định

 
  useEffect(() => {
    loadItems();
  }, [loadItems]);

  return (
    <div className="container mt-4 items-page">
      {/* Truyền hàm loadItems vào onSuccess để Form gọi lại sau khi thêm/sửa xong */}
      <ItemForm editingItem={editingItem} onSuccess={loadItems} />

      <div className="items-table-wrapper mt-4">
        <ItemTable 
          items={items} 
          onEdit={(item) => setEditingItem(item)} 
        />
      </div>
    </div>
  );
}