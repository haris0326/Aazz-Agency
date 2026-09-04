document.addEventListener("DOMContentLoaded", () => {
  /* ===============================
      ELEMENTS
  =============================== */
  const form = document.getElementById("proposalForm");
  const otherCheckbox = document.getElementById("otherServiceCheckbox");
  const otherInput = document.getElementById("otherServiceInput");
  const modal = document.getElementById("formModal");
  const closeModalBtn = document.getElementById("closeModal");
  const modalMessage = document.getElementById("modalMessage");
  const successIcon = document.getElementById("successIcon");
  const errorIcon = document.getElementById("errorIcon");

  /* ===============================
      UTILITY: Professional Visibility Check
      Checks if element is actually visible to the user
  =============================== */
  const isEffectivelyVisible = (el) => {
    return !!(el.offsetWidth || el.offsetHeight || el.getClientRects().length) && 
           window.getComputedStyle(el).visibility !== 'hidden' &&
           !el.disabled;
  };

  /* ===============================
      MODAL HANDLER
  =============================== */
  function showModal(isSuccess, message) {
    modalMessage.textContent = message;
    successIcon.classList.toggle("hidden", !isSuccess);
    errorIcon.classList.toggle("hidden", isSuccess);

    [successIcon, errorIcon].forEach(icon => {
      icon.classList.remove("animate-pop");
      void icon.offsetWidth; // Trigger reflow
      icon.classList.add("animate-pop");
    });
    modal.classList.remove("hidden");
  }

  closeModalBtn.addEventListener("click", () => modal.classList.add("hidden"));

  /* ===============================
      OTHER SERVICE TOGGLE
  =============================== */
  function toggleOtherService() {
    const isChecked = otherCheckbox.checked;
    
    // Smooth transition support
    if (isChecked) {
      otherInput.classList.remove("hidden");
      otherInput.disabled = false;
      otherInput.required = true;
      // Small timeout to ensure focus works after animation/display change
      setTimeout(() => otherInput.focus(), 50);
    } else {
      otherInput.classList.add("hidden");
      otherInput.disabled = true;
      otherInput.required = false;
      otherInput.value = "";
    }
  }

  otherCheckbox.addEventListener("change", toggleOtherService);
  toggleOtherService(); 

  /* ===============================
      VALIDATION LOGIC
  =============================== */

  function validateRequiredFields() {
    // Only validate fields that are currently visible and enabled
    const fields = form.querySelectorAll("input[required], select[required]");
    for (let field of fields) {
      if (isEffectivelyVisible(field)) {
        if (!field.value || !field.value.trim()) {
          showModal(false, `Please fill out the ${field.previousElementSibling?.textContent.replace('*','') || 'required'} field.`);
          field.focus();
          return false;
        }
      }
    }
    return true;
  }

  function validateServices() {
    const selectedServices = form.querySelectorAll("input[name='services']:checked");
    const isOtherActive = otherCheckbox.checked && isEffectivelyVisible(otherInput);

    // 1. Minimum Selection Check
    if (selectedServices.length === 0 && !isOtherActive) {
      showModal(false, "Please select at least one service.");
      return false;
    }

    // 2. Strict "Other" Validation
    // Logic: Only error if the checkbox IS checked AND the input IS visible AND it's empty
    if (isOtherActive && !otherInput.value.trim()) {
      showModal(false, 'Please specify your custom service in the "Other" field.');
      otherInput.focus();
      return false;
    }

    return true;
  }

  function validateAgreement() {
    const agreement = form.querySelector("input[name='agreement']");
    if (!agreement.checked) {
      showModal(false, "You must agree to the terms and conditions.");
      return false;
    }
    return true;
  }

  /* ===============================
      DATA COLLECTION & SUBMIT
  =============================== */
  function collectFormData() {
    const services = Array.from(form.querySelectorAll("input[name='services']:checked")).map(el => el.value);
    if (otherCheckbox.checked && otherInput.value.trim()) {
      services.push(otherInput.value.trim());
    }

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Add processed services array
    data.services = services;
    data.agreement = form.agreement.checked ? 1 : 0;
    return data;
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (!validateRequiredFields()) return;
    if (!validateServices()) return;
    if (!validateAgreement()) return;

    const payload = collectFormData();

    try {
      const response = await fetch("/proposals/store", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(payload)
      });

      const result = await response.json();

      if (result.status === "success") {
        showModal(true, result.message);
        form.reset(); 
        toggleOtherService(); // Re-sync the "Other" state
      } else {
        let msg = result.message || "Please fix the errors and try again.";
        if (result.errors) msg = Object.values(result.errors).flat().join("\n");
        showModal(false, msg);
      }
    } catch (err) {
      showModal(false, "Something went wrong. Please try again later.");
    }
  });
});