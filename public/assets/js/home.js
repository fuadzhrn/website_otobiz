document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
    const navToggle = document.querySelector(".nav-toggle");
    const mainNav = document.querySelector("#main-nav");
    const navLinks = document.querySelectorAll(".main-nav__link, .main-nav__cta");
    const animatedItems = document.querySelectorAll(".fade-up");

    const updateHeaderState = () => {
        if (!header) {
            return;
        }

        if (window.scrollY > 20) {
            header.classList.add("is-scrolled");
        } else {
            header.classList.remove("is-scrolled");
        }
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.2,
            rootMargin: "0px 0px -40px 0px"
        }
    );

    const closeMenu = () => {
        if (!header || !navToggle) {
            return;
        }

        header.classList.remove("is-menu-open");
        navToggle.setAttribute("aria-expanded", "false");
    };

    if (navToggle && header) {
        navToggle.addEventListener("click", (event) => {
            event.stopPropagation();
            const willOpen = !header.classList.contains("is-menu-open");
            header.classList.toggle("is-menu-open", willOpen);
            navToggle.setAttribute("aria-expanded", willOpen ? "true" : "false");
        });
    }

    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            closeMenu();
        });
    });

    document.addEventListener("click", (event) => {
        if (!header || !header.classList.contains("is-menu-open")) {
            return;
        }

        if (!mainNav || !navToggle) {
            return;
        }

        if (mainNav.contains(event.target) || navToggle.contains(event.target)) {
            return;
        }

        closeMenu();
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeMenu();
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth > 1024) {
            closeMenu();
        }
    });

    animatedItems.forEach((item) => observer.observe(item));
    updateHeaderState();

    window.addEventListener("scroll", updateHeaderState, { passive: true });
});
