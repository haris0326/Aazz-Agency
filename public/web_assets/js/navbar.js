// ============================================================
// Desktop: Show / Hide Dropdowns and Mega Menu
// ============================================================

document.querySelectorAll('.group').forEach(group => {

    group.addEventListener('mouseenter', () => {

        const dropdown = group.querySelector(
            '.dropdown-menu-custom, .mega-menu-custom'
        );

        if (dropdown) {
            dropdown.classList.add('show');
        }

    });


    group.addEventListener('mouseleave', () => {

        const dropdown = group.querySelector(
            '.dropdown-menu-custom, .mega-menu-custom'
        );

        if (dropdown) {
            dropdown.classList.remove('show');
        }

    });

});


// ============================================================
// Mobile Menu: Open / Close Sidebar
// ============================================================

const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const sidebarMenu = document.getElementById('sidebar-menu');
const backdrop = document.getElementById('backdrop');
const closeMenuBtn = document.getElementById('close-menu-btn');


if (
    mobileMenuBtn &&
    sidebarMenu &&
    backdrop &&
    closeMenuBtn
) {

    // Open Sidebar
    mobileMenuBtn.addEventListener('click', () => {

        sidebarMenu.classList.add('open');
        backdrop.classList.add('open');

    });


    // Close Sidebar
    closeMenuBtn.addEventListener('click', () => {

        sidebarMenu.classList.remove('open');
        backdrop.classList.remove('open');

    });


    // Close Sidebar by clicking backdrop
    backdrop.addEventListener('click', () => {

        sidebarMenu.classList.remove('open');
        backdrop.classList.remove('open');

    });

}


// ============================================================
// Mobile Services Dropdown + Arrow Rotation
// ============================================================

const mobileServicesBtn =
    document.getElementById('mobile-services-btn');

const mobileServicesDropdown =
    document.getElementById('mobile-services-dropdown');

const mobileServicesIcon =
    document.getElementById('mobile-services-icon');


if (
    mobileServicesBtn &&
    mobileServicesDropdown
) {

    mobileServicesBtn.addEventListener('click', () => {

        const isOpen =
            !mobileServicesDropdown.classList.contains('max-h-0');


        if (isOpen) {

            // Close Services
            mobileServicesDropdown.classList.remove('max-h-96');
            mobileServicesDropdown.classList.add('max-h-0');


            // Rotate arrow back
            if (mobileServicesIcon) {
                mobileServicesIcon.classList.remove('rotate-180');
            }

        } else {

            // Open Services
            mobileServicesDropdown.classList.remove('max-h-0');
            mobileServicesDropdown.classList.add('max-h-96');


            // Rotate arrow
            if (mobileServicesIcon) {
                mobileServicesIcon.classList.add('rotate-180');
            }

        }

    });

}


// ============================================================
// Mobile Blog Dropdown + Arrow Rotation
// ============================================================

const mobileBlogBtn =
    document.getElementById('mobile-blog-btn');

const mobileBlogDropdown =
    document.getElementById('mobile-blog-dropdown');

const mobileBlogIcon =
    document.getElementById('mobile-blog-icon');


if (
    mobileBlogBtn &&
    mobileBlogDropdown
) {

    mobileBlogBtn.addEventListener('click', () => {

        const isOpen =
            !mobileBlogDropdown.classList.contains('max-h-0');


        if (isOpen) {

            // Close Blog
            mobileBlogDropdown.classList.remove('max-h-96');
            mobileBlogDropdown.classList.add('max-h-0');


            // Rotate arrow back
            if (mobileBlogIcon) {
                mobileBlogIcon.classList.remove('rotate-180');
            }

        } else {

            // Open Blog
            mobileBlogDropdown.classList.remove('max-h-0');
            mobileBlogDropdown.classList.add('max-h-96');


            // Rotate arrow
            if (mobileBlogIcon) {
                mobileBlogIcon.classList.add('rotate-180');
            }

        }

    });

}


// ============================================================
// Mobile Resources Dropdown + Arrow Rotation
// ============================================================

const mobileResourcesBtn =
    document.getElementById('mobile-resources-btn');

const mobileResourcesMega =
    document.getElementById('mobile-resources-mega');

const mobileResourcesIcon =
    document.getElementById('mobile-resources-icon');


if (
    mobileResourcesBtn &&
    mobileResourcesMega
) {

    mobileResourcesBtn.addEventListener('click', () => {

        const isOpen =
            !mobileResourcesMega.classList.contains('max-h-0');


        if (isOpen) {

            // Close Resources
            mobileResourcesMega.classList.remove(
                'max-h-[800px]'
            );

            mobileResourcesMega.classList.add('max-h-0');


            // Rotate arrow back
            if (mobileResourcesIcon) {
                mobileResourcesIcon.classList.remove(
                    'rotate-180'
                );
            }

        } else {

            // Open Resources
            mobileResourcesMega.classList.remove('max-h-0');

            mobileResourcesMega.classList.add(
                'max-h-[800px]'
            );


            // Rotate arrow
            if (mobileResourcesIcon) {
                mobileResourcesIcon.classList.add(
                    'rotate-180'
                );
            }

        }

    });

}