import './bootstrap';
// Confirm before edit (demo)
document.addEventListener("DOMContentLoaded", function () {

    const editButtons = document.querySelectorAll(".btn-warning");

    editButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const confirmEdit = confirm("Do you want to edit this item?");
            if (!confirmEdit) {
                event.preventDefault();
            }
        });
    });

});
