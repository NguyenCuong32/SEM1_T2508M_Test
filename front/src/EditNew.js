import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";

export default function EditNew() {
    const { id } = useParams();
    const [item, setItem] = useState();

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/item", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                type: "get_item",
                id: id
            })
        }).then((e) => e.json()).then((e) => setItem(e.data))
    }, [id]);

    if(!item) return;

    return (
        <form manhdev-api="true" className="p-2" action="/api/item" method="POST" swal_success="none" time_load="0" type="update-new">
            <input type="hidden" name="id" value={id} />
            <div className="mb-3">
                <input type="text" className="form-control" name="item_code" placeholder="Item Code" defaultValue={item.code}/>
            </div>

            <div className="mb-3">
                <input type="text" className="form-control" name="item_name" placeholder="Item Name" defaultValue={item.name} />
            </div>

            <div className="mb-3">
                <input type="number" className="form-control" name="quantity" placeholder="Quantity" defaultValue={item.quantity} />
            </div>

            <div className="mb-3">
                <input type="date" className="form-control" name="expried_date" placeholder="Expried date" defaultValue={item.expried_date} />
            </div>

            <div className="mb-3">
                <input type="text" className="form-control" name="note" placeholder="Note" defaultValue={item.note} />
            </div>

            <center><button type="submit" className="btn-default">Save</button></center>
        </form>
    );
}