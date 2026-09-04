/* ================================ */
/* DOMContentLoaded Init */
/* ================================ */
document.addEventListener("DOMContentLoaded", () => {
  const options = { root: null, threshold: 0.2 };

  // Generic function to add animations
  function createObserver(animations) {
    return new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animations(entry.target);
          obs.unobserve(entry.target); // run once
        }
      });
    }, options);
  }

  /* ================================ */
  /* CTA Section */
  /* ================================ */
  const ctaObserver = createObserver(target => {
    if (target.id === "cta-heading") target.classList.add("animate-fadeInUp");
    if (target.id === "cta-button") target.classList.add("animate-bounceIn");
  });

  const ctaHeading = document.getElementById("cta-heading");
  const ctaButton = document.getElementById("cta-button");
  if (ctaHeading) ctaObserver.observe(ctaHeading);
  if (ctaButton) ctaObserver.observe(ctaButton);

  /* ================================ */
  /* IT Services CTA (left + right + badges) */
  /* ================================ */
  const itCtaObserver = createObserver(target => {
    if (target.id === "it-cta-left") target.classList.add("animate-fadeInUp");
    if (target.id === "it-cta-right") target.classList.add("animate-slideInRight");
    if (target.classList.contains("review-badge")) target.classList.add("animate-zoomIn");
  });

  const ctaLeft = document.getElementById("it-cta-left");
  const ctaRight = document.getElementById("it-cta-right");
  const reviewBadges = document.querySelectorAll("#review-badges .review-badge");
  if (ctaLeft) itCtaObserver.observe(ctaLeft);
  if (ctaRight) itCtaObserver.observe(ctaRight);
  reviewBadges.forEach(badge => itCtaObserver.observe(badge));

  /* ================================ */
  /* Offer Section */
  /* ================================ */
  const offerObserver = createObserver(target => {
    if (target.classList.contains("offer-heading")) target.classList.add("animate-fadeInUp");
    if (target.classList.contains("offer-card")) target.classList.add("animate-zoomIn");
  });

  const offerHeading = document.querySelector(".offer-heading");
  const offerCards = document.querySelectorAll(".offer-card");
  if (offerHeading) offerObserver.observe(offerHeading);
  offerCards.forEach(card => offerObserver.observe(card));

  /* ================================ */
  /* Case Studies */
  /* ================================ */
  const caseObserver = createObserver(target => {
    target.classList.add("animate-fadeInUpCase");
  });

  const caseHeading = document.getElementById("case-heading");
  const caseCards = document.querySelectorAll("#case-cards .case-card");
  if (caseHeading) caseObserver.observe(caseHeading);
  caseCards.forEach(card => caseObserver.observe(card));

  /* ================================ */
  /* IT Services Tabs */
  /* ================================ */
  const tabsObserver = createObserver(target => {
    if (target.classList.contains("tab-btn")) target.classList.add("animate-fadeInLeftTab");
    if (target.classList.contains("tab-content")) target.classList.add("animate-fadeInRightTab");
  });

  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");
  tabButtons.forEach(btn => tabsObserver.observe(btn));
  tabContents.forEach(content => tabsObserver.observe(content));
  
  // ================================
  // Why Choose Us Section
  // ================================
  const whyChooseUsObserver = createObserver(target => {
    // Check if the target element has the data-aos attribute.
    // data-aos="fade-up"
    if (target.dataset.aos === 'fade-up') {
      target.style.opacity = '1';
      target.style.transform = 'translateY(0)';
      target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
      // Use data-aos-delay to set a delay for staggering
      if (target.dataset.aosDelay) {
        target.style.transitionDelay = `${target.dataset.aosDelay}ms`;
      }
    }
  });

  const whyChooseUsElements = document.querySelectorAll('[data-aos="fade-up"]');
  whyChooseUsElements.forEach(element => {
    // Hide the elements initially
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    whyChooseUsObserver.observe(element);
  });

  // ================================
  // Our Process Section
  // ================================
  const processObserver = createObserver(target => {
    // Animate the heading and paragraph
    if (target.classList.contains("process-heading") || target.classList.contains("process-description")) {
      target.classList.add("animate-fadeInUp");
    }
    // Animate the process cards with a staggered effect
    if (target.classList.contains("process-card")) {
      const index = Array.from(document.querySelectorAll(".process-card")).indexOf(target);
      target.style.animationDelay = `${index * 0.2}s`;
      target.classList.add("animate-zoomIn");
    }
  });

  const processHeading = document.querySelector("#our-process .text-center h2");
  const processDescription = document.querySelector("#our-process .text-center p");
  const processCards = document.querySelectorAll(".process-card");

  if (processHeading) processObserver.observe(processHeading);
  if (processDescription) processObserver.observe(processDescription);
  processCards.forEach(card => processObserver.observe(card));


    // ================================
    // About Aazz Scroll Section (AOS fallback)
    // ================================
    const aboutObserver = createObserver(target => {
      if (target.dataset.aos === 'fade-up') {
        target.style.opacity = '1';
        target.style.transform = 'translateY(0)';
        target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
      } else if (target.dataset.aos === 'fade-right') {
        target.style.opacity = '1';
        target.style.transform = 'translateX(0)';
        target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
      } else if (target.dataset.aos === 'fade-left') {
        target.style.opacity = '1';
        target.style.transform = 'translateX(0)';
        target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
      }
    });

    const aboutElements = document.querySelectorAll('[data-aos]');
    aboutElements.forEach(el => {
      el.style.opacity = '0';
      if (el.dataset.aos === 'fade-up') {
        el.style.transform = 'translateY(20px)';
      } else if (el.dataset.aos === 'fade-right') {
        el.style.transform = 'translateX(-20px)';
      } else if (el.dataset.aos === 'fade-left') {
        el.style.transform = 'translateX(20px)';
      }
      aboutObserver.observe(el);
    });

    // ================================
    // FAQ Section
    // ================================
    const faqObserver = createObserver(target => {
      if (target.classList.contains('faq-item')) {
        target.classList.add("animate-fade-in-left", "visible");
      }
    });

    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => faqObserver.observe(item));

    // ================================
    // FAQ Accordion Functionality
    // ================================
    const faqToggles = document.querySelectorAll('.faq-toggle');
    faqToggles.forEach(toggle => {
      toggle.addEventListener('click', () => {
        const parentItem = toggle.closest('.faq-item');
        const content = parentItem.querySelector('.faq-content');
        const icon = toggle.querySelector('i');

        if (content.style.maxHeight) {
          content.style.maxHeight = null;
          icon.classList.remove('rotate-180');
        } else {
          // Close other open FAQ items
          document.querySelectorAll('.faq-content').forEach(otherContent => {
            otherContent.style.maxHeight = null;
          });
          document.querySelectorAll('.faq-toggle i').forEach(otherIcon => {
            otherIcon.classList.remove('rotate-180');
          });

          // Open current FAQ item
          content.style.maxHeight = content.scrollHeight + 'px';
          icon.classList.add('rotate-180');
        }
      });
    });
    

  /* ================================ */
  /* Lazy Loading Images */
  /* ================================ */
  const imgObserver = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src || img.src;
        img.classList.add("animate-zoomIn");
        obs.unobserve(img);
      }
    });
  }, { rootMargin: "100px" });

  const lazyImages = document.querySelectorAll("img[loading='lazy']");
  lazyImages.forEach(img => imgObserver.observe(img));
});