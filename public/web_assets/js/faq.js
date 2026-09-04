const toggles = document.querySelectorAll('.faq-toggle');

  toggles.forEach((btn) => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('i');

      if (content.classList.contains('max-h-0')) {
        content.classList.remove('max-h-0');
        content.classList.add('max-h-[500px]', 'pb-4');
        icon.classList.add('rotate-180');
      } else {
        content.classList.remove('max-h-[500px]', 'pb-4');
        content.classList.add('max-h-0');
        icon.classList.remove('rotate-180');
      }
    });
  });
