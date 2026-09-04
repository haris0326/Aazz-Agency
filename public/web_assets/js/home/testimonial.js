// ================================
// Section: Testimonial Slider
// ================================
document.addEventListener("DOMContentLoaded", () => {
  const track = document.querySelector(".testimonial-track");
  const items = document.querySelectorAll(".testimonial-item");
  const prev = document.getElementById("prevTestimonial");
  const next = document.getElementById("nextTestimonial");
  let index = 0;

  function showSlide(i) {
    track.style.transform = `translateX(-${i * 100}%)`;
  }

  next.addEventListener("click", () => {
    index = (index + 1) % items.length;
    showSlide(index);
  });

  prev.addEventListener("click", () => {
    index = (index - 1 + items.length) % items.length;
    showSlide(index);
  });

  // Auto slide
  setInterval(() => {
    index = (index + 1) % items.length;
    showSlide(index);
  }, 6000);

  // Scroll Animations
  const fadeElements = document.querySelectorAll(".fade-up");
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  }, { threshold: 0.3 });

  fadeElements.forEach(el => observer.observe(el));
});
