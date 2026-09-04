{{--
    Path: resources/views/components/admin/confirm-delete-modal.blade.php
    Include ONCE per layout (e.g. at the bottom of admin_panel_layout.blade.php),
    NOT once per row. All delete forms across the whole panel share this one modal.

    On any delete <form>, just add:
        data-confirm-delete
        data-confirm-message="Are you sure you want to delete 'Electronics'?"
    admin-datatable.js intercepts submit, shows this modal, and re-submits on confirm.
--}}
<div class="modal fade" id="apConfirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: var(--ap-radius);">
            <div class="modal-body text-center pt-4 pb-2">
                <i class="mdi mdi-alert-circle-outline text-danger" style="font-size: 48px;"></i>
                <h5 class="mt-3 mb-1">Delete this record?</h5>
                <p class="text-muted mb-0" data-confirm-message>This action cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-confirm-action>
                    <i class="mdi mdi-delete-outline"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>