function lockBodyScroll() {
    const scrollY = window.scrollY || window.pageYOffset;
    document.body.dataset.scrollY = scrollY;
    document.documentElement.classList.add("scroll-locked");
    document.body.classList.add("scroll-locked");

    document.body.style.position = "fixed";
    document.body.style.top = `-${scrollY}px`;
    document.body.style.left = "0";
    document.body.style.right = "0";
    document.body.style.width = "100%";

    window.__kgmMenuOpen = true; // ✅ flag
}

function unlockBodyScroll() {
    const scrollY = parseInt(document.body.dataset.scrollY || "0", 10);
    document.body.style.position = "";
    document.body.style.top = "";
    document.body.style.left = "";
    document.body.style.right = "";
    document.body.style.width = "";
    delete document.body.dataset.scrollY;

    document.documentElement.classList.remove("scroll-locked");
    document.body.classList.remove("scroll-locked");

    window.__kgmMenuOpen = false; // ✅ clear flag
    // 🔕 disable smooth behavior just for this jump
    const prevBehavior = document.documentElement.style.scrollBehavior;
    document.documentElement.style.scrollBehavior = "auto";
    if (!Number.isNaN(scrollY)) window.scrollTo(0, scrollY);
    // restore next tick
    setTimeout(() => {
        document.documentElement.style.scrollBehavior = prevBehavior || "";
    }, 0);
}

function setupMobileMenu() {
    if (window.mobileMenuInitialized) return;
    window.mobileMenuInitialized = true;

    const mobileMenu = document.getElementById("mobile_menu");
    const toggleBtn = document.getElementById("menu-toggle");

    if (!mobileMenu || !toggleBtn) return;

    toggleBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const isOpen = mobileMenu.classList.toggle("open");
        toggleBtn.classList.toggle("open", isOpen);
        isOpen ? lockBodyScroll() : unlockBodyScroll();
    });

    document.addEventListener("click", (e) => {
        if (!mobileMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
            const wasOpen = mobileMenu.classList.contains("open");
            mobileMenu.classList.remove("open");
            toggleBtn.classList.remove("open");
            if (wasOpen) unlockBodyScroll(); // ✅ ensure scroll restored
        }
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" || e.key === "Esc") {
            mobileMenu.classList.remove("open");
            toggleBtn.classList.remove("open");
            unlockBodyScroll(); // ensure unlocked on ESC
        }
    });

    console.log("Mobile menu JS initialized");
}

document.addEventListener("DOMContentLoaded", () => {
    if (window.innerWidth < 1024) {
        setupMobileMenu();
    }

    window.addEventListener("resize", () => {
        if (window.innerWidth < 1024) {
            setupMobileMenu();
        } else {
            // ✅ moving to desktop: close & unlock
            const mobileMenu = document.getElementById("mobile_menu");
            const toggleBtn = document.getElementById("menu-toggle");
            if (
                mobileMenu &&
                toggleBtn &&
                mobileMenu.classList.contains("open")
            ) {
                mobileMenu.classList.remove("open");
                toggleBtn.classList.remove("open");
                unlockBodyScroll();
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    if (window.innerWidth >= 1024) return; // Mobile only

    const navMenu = document.getElementById("mobile_menu");
    const navList = navMenu?.querySelector(".nav_list");
    if (!navList) return;

    // Utility: Close all dropdowns
    function closeAllDropdowns() {
        navList
            .querySelectorAll(".menu_item.drop_down.open")
            .forEach((item) => {
                item.classList.remove("open");
                updateAria(item, false);
            });
    }

    // Utility: Close only a specific dropdown and its nested
    function closeDropdown(item) {
        item.classList.remove("open");
        updateAria(item, false);
        item.querySelectorAll(".menu_item.drop_down.open").forEach((child) => {
            child.classList.remove("open");
            updateAria(child, false);
        });
    }

    // Utility: Set aria-expanded
    function updateAria(item, isOpen) {
        item.querySelectorAll(".dropdown_toggle").forEach((toggle) => {
            toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
        });
    }

    // Handle click inside nav
    navList.addEventListener("click", (e) => {
        const menuItem = e.target.closest(".menu_item.drop_down");
        const toggleButton = e.target.closest(".dropdown_toggle");
        const menuLink = e.target.closest(".menu_item_link.dropdown");
        const menuTitle = e.target.closest(".menu_title.dropdown");

        if (!menuItem) return;

        // Special case: Toggle button
        if (toggleButton) {
            e.preventDefault();
            const isOpen = menuItem.classList.toggle("open");
            updateAria(menuItem, isOpen);
            if (!isOpen) {
                // Close all children
                menuItem
                    .querySelectorAll(".menu_item.drop_down.open")
                    .forEach((child) => {
                        child.classList.remove("open");
                        updateAria(child, false);
                    });
            }
            return;
        }

        // Special case: Link with dropdown
        if (menuLink) {
            if (!menuItem.classList.contains("open")) {
                // Closed → open instead of navigating
                e.preventDefault();
                menuItem.classList.add("open");
                updateAria(menuItem, true);
            } else {
                // Open → allow default link
            }
            return;
        }

        // Fallback: Clicked title area (not link or button)
        if (menuTitle) {
            e.preventDefault();
            const isOpen = menuItem.classList.toggle("open");
            updateAria(menuItem, isOpen);
            if (!isOpen) {
                // Close all children
                menuItem
                    .querySelectorAll(".menu_item.drop_down.open")
                    .forEach((child) => {
                        child.classList.remove("open");
                        updateAria(child, false);
                    });
            }
        }
    });

    // Handle click outside nav to close all
    document.addEventListener("click", (e) => {
        if (!navMenu.contains(e.target)) {
            closeAllDropdowns();
        }
    });

    // Escape key closes all
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" || e.key === "Esc") {
            closeAllDropdowns();
        }
    });
});

const languageSwitcher = document.querySelector(".language-switcher");
if (languageSwitcher) {
    const languageToggle = languageSwitcher.querySelector(".language-toggle");

    languageToggle?.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation(); // prevents this click from closing it immediately below
        const isOpen = languageSwitcher.classList.toggle("open");
        languageToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });

    document.addEventListener("click", (e) => {
        // Close if they clicked outside the switcher
        if (!languageSwitcher.contains(e.target)) {
            languageSwitcher.classList.remove("open");
            languageToggle?.setAttribute("aria-expanded", "false");
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("nav-menu");
    if (!nav || window.innerWidth < 1024) return;

    function updateHeaderOnScroll() {
        if (window.__kgmMenuOpen) {
            // Menu open → force visible and ignore scroll
            nav.classList.add("active");
            nav.classList.remove("hide");
            return;
        }
        if (window.scrollY > 0) nav.classList.add("active");
        else nav.classList.remove("active");
    }

    updateHeaderOnScroll();
    window.addEventListener("scroll", updateHeaderOnScroll, { passive: true });
});

document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("nav-menu");
    if (!nav || window.innerWidth >= 1024) return;

    let lastScrollY = window.scrollY;

    function handleMobileHeaderScroll() {
        if (window.__kgmMenuOpen) {
            // Menu open → keep header shown, no hide/show flips
            nav.classList.add("active");
            nav.classList.remove("hide");
            return;
        }

        const currentScrollY = window.scrollY;
        if (currentScrollY === 0) {
            nav.classList.add("active");
            nav.classList.remove("hide");
        } else if (currentScrollY < lastScrollY) {
            nav.classList.add("active");
            nav.classList.remove("hide");
        } else if (currentScrollY > lastScrollY) {
            nav.classList.remove("active");
            nav.classList.add("hide");
        }
        lastScrollY = currentScrollY;
    }

    window.addEventListener("scroll", handleMobileHeaderScroll, {
        passive: true,
    });
    handleMobileHeaderScroll();
});
