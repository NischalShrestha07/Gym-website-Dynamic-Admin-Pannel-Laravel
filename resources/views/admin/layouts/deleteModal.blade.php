<!-- Bootstrap Modal (Should be included only once, ideally in layout) -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background: #c82333" class="modal-header">
                <h5 class="modal-title" style="color: white" id="deleteModalLabel">Confirm Delete
                </h5>


                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                    style="display: flex; align-items: center; font-size: 20px; border: none; border-radius: 5px; padding: 5px 10px;">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                Are you sure you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
                                                                // Check if elements exist to avoid errors
                                                                const deleteButtons = document.querySelectorAll('.delete-btn');
                                                                const modalElement = document.getElementById('deleteModal');
                                                                const confirmDeleteBtn = document.getElementById('confirmDelete');

                                                                if (!modalElement || !confirmDeleteBtn || deleteButtons.length === 0) {
                                                                    console.error('Modal or buttons not found in the DOM');
                                                                    return;
                                                                }

                                                                const modal = new bootstrap.Modal(modalElement, {
                                                                    backdrop: 'static', // Optional: Prevents closing by clicking outside (remove if not needed)
                                                                    keyboard: true // Ensures ESC key can close the modal
                                                                });
                                                                let formToSubmit = null;

                                                                // Attach event to each delete button
                                                                deleteButtons.forEach(button => {
                                                                    button.addEventListener('click', function () {
                                                                        const id = this.getAttribute('data-id');
                                                                        formToSubmit = document.querySelector(`.delete-form[data-id="${id}"]`);
                                                                        if (formToSubmit) {
                                                                            modal.show(); // Show the modal
                                                                        } else {
                                                                            console.error(`Form with data-id="${id}" not found`);
                                                                        }
                                                                    });
                                                                });

                                                                // Confirm delete action
                                                                confirmDeleteBtn.addEventListener('click', function () {
                                                                    if (formToSubmit) {
                                                                        formToSubmit.submit(); // Submit the form
                                                                        modal.hide(); // Hide the modal
                                                                        formToSubmit = null; // Reset
                                                                    } else {
                                                                        console.error('No form to submit');
                                                                    }
                                                                });

                                                                // Ensure Bootstrap's default close behavior works (not needed unless overridden)
                                                                modalElement.addEventListener('hidden.bs.modal', function () {
                                                                    formToSubmit = null; // Reset form when modal is closed
                                                                });
                                                            });
</script>