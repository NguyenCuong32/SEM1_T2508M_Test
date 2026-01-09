import { useEffect, useState } from "react";

export default function Home() {
    const [list, setList] = useState([]);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/item", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                type: "get_list"
            })
        }).then((e) => e.json()).then((e) => setList(e.data))
    }, []);

    if(!list) return;

    const delItem = (id) => {
        fetch("http://127.0.0.1:8000/api/item", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                type: "del_item",
                id: id
            })
        }).then((e) => e.json()).then((e) => setList(e))
    };

    return (
        <>
            <div className="text-center fs-4 text-warning fw-bold mb-2">Sale Items</div>

            <a href="/add-new" className="btn-default">Add New</a>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>Note</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {list.map((e, i) => (
                        <tr key={i}>
                            <td>{i + 1}</td>
                            <td>{e.code}</td>
                            <td>{e.name}</td>
                            <td>{e.quantity}</td>
                            <td>{e.expried_date}</td>
                            <td>{e.note}</td>
                            <td>
                                <div className="d-flex gap-2">
                                    <a href={"/edit/" + e.id}><i className="ri-pencil-line"></i></a>
                                    <button onClick={() => delItem(e.id)} style={{ border: "none", background: "none", color: "#0d6efd" }}><i className="ri-delete-bin-7-line"></i></button>
                                </div>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
}