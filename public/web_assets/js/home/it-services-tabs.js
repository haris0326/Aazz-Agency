// it-services-tabs.js

document.addEventListener("DOMContentLoaded", function () {
  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const targetTab = button.getAttribute("data-tab");

      // Reset all buttons
      tabButtons.forEach((btn) =>
        btn.classList.remove("active", "bg-gray-100")
      );

      // Hide all tab contents
      tabContents.forEach((content) => content.classList.add("hidden"));

      // Show the selected tab content
      document.getElementById(targetTab).classList.remove("hidden");
      button.classList.add("active", "bg-gray-100");
    });
  });
});
