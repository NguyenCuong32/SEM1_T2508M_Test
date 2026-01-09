import { FaEdit } from "react-icons/fa";
import "../assets/items.css";

export default function ItemTable({ items, onEdit }) {
  return (
    <div className="item-table">
      <table className="table table-bordered">
        <thead>
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
          {items.map((item) => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{item.item_code}</td>
              <td>{item.item_name}</td>
              <td>{item.quantity}</td>
              <td>{item.expired_date || item.expried_date}</td>
              <td>{item.note}</td>
              <td>
                <FaEdit
                  className="edit-icon"
                  onClick={() =>
                    onEdit({
                      ...item,
                      expired_date:
                        item.expired_date ?? item.expried_date,
                    })
                  }
                />
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
