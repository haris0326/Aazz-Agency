// ======= Desktop: Show/Hide Dropdowns and Mega Menu =======
  document.querySelectorAll('.group').forEach(group => {
    group.addEventListener('mouseenter', () => {
      const dropdown = group.querySelector('.dropdown-menu-custom, .mega-menu-custom');
      if (dropdown) dropdown.classList.add('show');
    });

    group.addEventListener('mouseleave', () => {
      const dropdown = group.querySelector('.dropdown-menu-custom, .mega-menu-custom');
      if (dropdown) dropdown.classList.remove('show');
    });
  });

  // ======= Mobile Menu: Open Sidebar =======
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const sidebarMenu = document.getElementById('sidebar-menu');
  const backdrop = document.getElementById('backdrop');
  const closeMenuBtn = document.getElementById('close-menu-btn');

  mobileMenuBtn.addEventListener('click', () => {
    sidebarMenu.classList.add('open');
    backdrop.classList.add('open');
  });

  closeMenuBtn.addEventListener('click', () => {
    sidebarMenu.classList.remove('open');
    backdrop.classList.remove('open');
  });

  backdrop.addEventListener('click', () => {
    sidebarMenu.classList.remove('open');
    backdrop.classList.remove('open');
  });

  // ======= Mobile Menu: Expand/Collapse Dropdowns =======
  const mobileServicesBtn = document.getElementById('mobile-services-btn');
  const mobileServicesDropdown = document.getElementById('mobile-services-dropdown');

  mobileServicesBtn.addEventListener('click', () => {
    mobileServicesDropdown.classList.toggle('max-h-0');
    mobileServicesDropdown.classList.toggle('max-h-96');
  });

  const mobileResourcesBtn = document.getElementById('mobile-resources-btn');
  const mobileResourcesMega = document.getElementById('mobile-resources-mega');

  mobileResourcesBtn.addEventListener('click', () => {
    mobileResourcesMega.classList.toggle('max-h-0');
    mobileResourcesMega.classList.toggle('max-h-[800px]');
  });
