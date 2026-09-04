// case-studies.js

document.addEventListener("DOMContentLoaded", function () {
  const caseHeading = document.getElementById("case-heading");
  const caseCards = document.querySelectorAll(".case-card");

  // Intersection Observer for Heading
  const headingObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          caseHeading.classList.remove("opacity-0", "translate-y-8");
          caseHeading.classList.add(
            "opacity-100",
            "translate-y-0",
            "transition-all",
            "duration-1000"
          );
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 }
  );

  if (caseHeading) headingObserver.observe(caseHeading);

  // Intersection Observer for Cards
  const cardObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.remove("opacity-0", "translate-y-8");
            entry.target.classList.add(
              "opacity-100",
              "translate-y-0",
              "transition-all",
              "duration-1000"
            );
          }, index * 200); // Stagger effect
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );

  caseCards.forEach((card) => cardObserver.observe(card));
});
