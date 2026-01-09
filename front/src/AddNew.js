export default function AddNew() {
    return (
        <form manhdev-api="true" className="p-2" action="/api/item" method="POST" swal_success="none" time_load="0" type="add-new">

            <div className="mb-3">
                <input type="text" className="form-control" name="item_code" placeholder="Item Code" />
            </div>

            <div className="mb-3">
                <input type="text" className="form-control" name="item_name" placeholder="Item Name" />
            </div>

            <div className="mb-3">
                <input type="number" className="form-control" name="quantity" placeholder="Quantity" />
            </div>

            <div className="mb-3">
                <input type="date" className="form-control" name="expried_date" placeholder="Expried date" />
            </div>

            <div className="mb-3">
                <input type="text" className="form-control" name="note" placeholder="Note" />
            </div>

            <center><button type="submit" className="btn-default">Add Now</button></center>
        </form>
    );
}
