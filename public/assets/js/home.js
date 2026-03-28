document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
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

    animatedItems.forEach((item) => observer.observe(item));
    updateHeaderState();

    window.addEventListener("scroll", updateHeaderState, { passive: true });
});
