import { FaEdit } from "react-icons/fa";
import "../assets/items.css";

export default function ItemTable({ items, onEdit }) {
  return (
    <div className="item-table">
      <table className="table table-bordered table-hover">
        <thead className="table-light">
          <tr>
            <th>Id</th>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Expired date</th>
            <th>Note</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {items.length === 0 ? (
             <tr><td colSpan="7" className="text-center">No data available</td></tr>
          ) : (
            items.map((item) => (
              <tr key={item.id}>
                <td>{item.id}</td>
                <td>{item.item_code}</td>
                <td>{item.item_name}</td>
                <td>{item.quantity}</td>
                {/* Hiển thị ngày: ưu tiên key đúng, fallback key sai */}
                <td>{item.expired_date || item.expried_date}</td>
                <td>{item.note}</td>
                <td className="text-center">
                  <FaEdit
                    className="edit-icon text-primary"
                    style={{ cursor: "pointer" }}
                    onClick={() => onEdit(item)}
                  />
                </td>
              </tr>
            ))
          )}
        </tbody>
      </table>
    </div>
  );
}