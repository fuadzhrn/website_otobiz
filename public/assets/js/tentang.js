/**
 * TENTANG KAMI PAGE - JavaScript
 * Lightweight interactions and animations
 */

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector(".site-header");
    const animatedItems = document.querySelectorAll(".fade-up");
    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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

    if (prefersReducedMotion) {
        animatedItems.forEach((item) => item.classList.add("is-visible"));
    } else {
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
                threshold: window.innerWidth <= 767 ? 0.12 : 0.2,
                rootMargin: window.innerWidth <= 767 ? "0px 0px -24px 0px" : "0px 0px -40px 0px"
            }
        );

        animatedItems.forEach((item) => observer.observe(item));
    }

    updateHeaderState();

    window.addEventListener("scroll", updateHeaderState, { passive: true });
});
