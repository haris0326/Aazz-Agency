/**
 * admin-datatable.js
 * Path in project: public/admin_panel/js/admin-datatable.js
 * Load in admin_panel_layout.blade.php AFTER bootstrap.bundle.min.js:
 * <script src="{{ asset('admin_panel/js/admin-datatable.js') }}"></script>
 *
 * Reusable behaviours for every CRUD index page:
 *  - delete confirmation modal (works with <x-admin.confirm-delete-modal>)
 *  - bulk select-all + bulk action bar
 *  - debounced live search (optional, opt-in via data-debounce-search)
 *  - button loading state to prevent double submit
 */
(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    initDeleteConfirm();
    initBulkSelect();
    initDebouncedSearch();
    initSubmitLoadingState();
    autoShowToasts();
  });

  /* ---------------- Delete confirmation ---------------- */
  function initDeleteConfirm() {
    document.querySelectorAll("[data-confirm-delete]").forEach(function (form) {
      form.addEventListener("submit", function (e) {
        if (form.dataset.confirmed === "true") return; // already confirmed
        e.preventDefault();

        var modalEl = document.getElementById("apConfirmDeleteModal");
        if (!modalEl) { form.dataset.confirmed = "true"; form.submit(); return; }

        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        var msgEl = modalEl.querySelector("[data-confirm-message]");
        if (msgEl && form.dataset.confirmMessage) {
          msgEl.textContent = form.dataset.confirmMessage;
        }

        var confirmBtn = modalEl.querySelector("[data-confirm-action]");
        var handler = function () {
          form.dataset.confirmed = "true";
          confirmBtn.disabled = true;
          confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Deleting...';
          modal.hide();
          form.submit();
        };
        confirmBtn.onclick = handler;
        modal.show();
      });
    });
  }

  /* ---------------- Bulk select ---------------- */
  function initBulkSelect() {
    var selectAll = document.querySelector("[data-select-all]");
    if (!selectAll) return;

    var checkboxes = document.querySelectorAll("[data-row-checkbox]");
    var bulkBar = document.querySelector("[data-bulk-bar]");
    var bulkCount = document.querySelector("[data-bulk-count]");

    function refresh() {
      var checked = document.querySelectorAll("[data-row-checkbox]:checked");
      if (bulkBar) bulkBar.classList.toggle("d-none", checked.length === 0);
      if (bulkCount) bulkCount.textContent = checked.length;
      document.querySelectorAll("[data-bulk-action-btn]").forEach(function (btn) {
        btn.disabled = checked.length === 0;
      });
    }

    selectAll.addEventListener("change", function () {
      checkboxes.forEach(function (cb) { cb.checked = selectAll.checked; });
      refresh();
    });
    checkboxes.forEach(function (cb) { cb.addEventListener("change", refresh); });

    document.querySelectorAll("[data-bulk-form]").forEach(function (form) {
      form.addEventListener("submit", function () {
        var ids = Array.from(document.querySelectorAll("[data-row-checkbox]:checked")).map(function (cb) { return cb.value; });
        var input = form.querySelector("[data-bulk-ids-input]");
        if (input) input.value = ids.join(",");
      });
    });

    refresh();
  }

  /* ---------------- Debounced live search ---------------- */
  function initDebouncedSearch() {
    var input = document.querySelector("[data-debounce-search]");
    if (!input) return;
    var form = input.closest("form");
    var timer = null;
    input.addEventListener("input", function () {
      clearTimeout(timer);
      timer = setTimeout(function () { form.submit(); }, 450);
    });
  }

  /* ---------------- Prevent double submit ---------------- */
  function initSubmitLoadingState() {
    document.querySelectorAll("form:not([data-confirm-delete])").forEach(function (form) {
      form.addEventListener("submit", function () {
        var btn = form.querySelector("[type=submit]");
        if (btn && !btn.disabled) {
          btn.dataset.originalHtml = btn.innerHTML;
          btn.disabled = true;
          btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Please wait...';
        }
      });
    });
  }

  /* ---------------- Auto show session toasts ---------------- */
  function autoShowToasts() {
    document.querySelectorAll(".ap-toast-container .toast").forEach(function (el) {
      var toast = bootstrap.Toast.getOrCreateInstance(el, { delay: 4000 });
      toast.show();
    });
  }
})();