/**
 * admin-app.js
 * Path: public/admin_panel/js/admin-app.js
 * Load AFTER bootstrap.bundle.min.js.
 *
 * Handles:
 *  - Sidebar toggle (mobile off-canvas + overlay)
 *  - Auto-expand + highlight active sidebar menu based on current URL
 *  - Delete confirmation modal (works with any form having data-confirm-delete)
 *  - Bulk select-all + bulk action bar
 *  - Debounced live search
 *  - Prevent double form submit (button loading state)
 *  - Auto-show session toasts
 */
(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    initSidebarToggle();
    initActiveMenu();
    initDeleteConfirm();
    initBulkSelect();
    initDebouncedSearch();
    initSubmitLoadingState();
    autoShowToasts();
  });

  /* ---------------- Sidebar toggle (mobile) ---------------- */
  function initSidebarToggle() {
    var sidebar = document.querySelector(".ap-sidebar");
    var overlay = document.querySelector(".ap-sidebar-overlay");
    var toggleBtns = document.querySelectorAll("[data-sidebar-toggle]");

    if (!sidebar) return;

    function open() {
      sidebar.classList.add("is-open");
      if (overlay) overlay.classList.add("is-open");
    }
    function close() {
      sidebar.classList.remove("is-open");
      if (overlay) overlay.classList.remove("is-open");
    }

    toggleBtns.forEach(function (btn) {
      btn.addEventListener("click", function () {
        sidebar.classList.contains("is-open") ? close() : open();
      });
    });
    if (overlay) overlay.addEventListener("click", close);

    // close sidebar on link click (mobile)
    sidebar.querySelectorAll(".ap-nav-link:not([data-bs-toggle])").forEach(function (link) {
      link.addEventListener("click", function () {
        if (window.innerWidth < 992) close();
      });
    });
  }

  /* ---------------- Active menu highlighting ---------------- */
  function initActiveMenu() {
    var current = window.location.pathname;
    document.querySelectorAll(".ap-nav-link[href]").forEach(function (link) {
      var href = link.getAttribute("href");
      if (!href || href === "#" || href === "javascript:void(0)") return;

      try {
        var linkPath = new URL(href, window.location.origin).pathname;
        if (linkPath === current || (linkPath !== "/" && current.startsWith(linkPath))) {
          link.classList.add("active");
          // expand parent submenu if nested
          var parentCollapse = link.closest(".collapse");
          if (parentCollapse) {
            parentCollapse.classList.add("show");
            var trigger = document.querySelector('[data-bs-target="#' + parentCollapse.id + '"]');
            if (trigger) trigger.setAttribute("aria-expanded", "true");
          }
        }
      } catch (e) { /* ignore malformed hrefs */ }
    });
  }

  /* ---------------- Delete confirmation ---------------- */
  function initDeleteConfirm() {
    document.querySelectorAll("[data-confirm-delete]").forEach(function (form) {
      form.addEventListener("submit", function (e) {
        if (form.dataset.confirmed === "true") return;
        e.preventDefault();

        var modalEl = document.getElementById("apConfirmDeleteModal");
        if (!modalEl) { form.dataset.confirmed = "true"; form.submit(); return; }

        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        var msgEl = modalEl.querySelector("[data-confirm-message]");
        if (msgEl && form.dataset.confirmMessage) {
          msgEl.textContent = form.dataset.confirmMessage;
        }

        var confirmBtn = modalEl.querySelector("[data-confirm-action]");
        confirmBtn.onclick = function () {
          form.dataset.confirmed = "true";
          confirmBtn.disabled = true;
          confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Deleting...';
          modal.hide();
          form.submit();
        };
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
          btn.disabled = true;
          btn.dataset.originalHtml = btn.innerHTML;
          btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Please wait...';
        }
      });
    });
  }

  /* ---------------- Auto show session toasts ---------------- */
  function autoShowToasts() {
    document.querySelectorAll(".ap-toast-container .toast").forEach(function (el) {
      bootstrap.Toast.getOrCreateInstance(el, { delay: 4000 }).show();
    });
  }
})();