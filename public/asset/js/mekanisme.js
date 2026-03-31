document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
    const subnav = document.querySelector("#mekanisme-subnav");
    const subnavInner = document.querySelector(".mekanisme-subnav__inner");
    const subnavLinks = document.querySelectorAll(".mekanisme-subnav__link");
    const animatedItems = document.querySelectorAll(".fade-up");
    const faqItems = document.querySelectorAll(".faq-item");
    const timeline = document.querySelector("#flow-timeline");
    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const getAnchorOffset = () => {
        const headerHeight = header ? header.offsetHeight : 0;
        const subnavHeight = subnav ? subnav.offsetHeight : 0;
        const gap = window.innerWidth <= 767 ? 14 : 18;

        return headerHeight + subnavHeight + gap;
    };

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
        const fadeObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        fadeObserver.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: window.innerWidth <= 767 ? 0.1 : 0.18,
                rootMargin: window.innerWidth <= 767 ? "0px 0px -20px 0px" : "0px 0px -40px 0px"
            }
        );

        animatedItems.forEach((item) => fadeObserver.observe(item));
    }

    if (timeline) {
        if (prefersReducedMotion) {
            timeline.querySelectorAll(".flow-step").forEach((step) => {
                step.classList.add("is-visible");
            });
        } else {
            const timelineObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        const steps = entry.target.querySelectorAll(".flow-step");
                        const isMobile = window.innerWidth <= 767;
                        const stepDelay = isMobile ? 120 : 180;

                        steps.forEach((step, index) => {
                            setTimeout(() => {
                                step.classList.add("is-visible");
                            }, index * stepDelay);
                        });

                        timelineObserver.unobserve(entry.target);
                    });
                },
                {
                    threshold: window.innerWidth <= 767 ? 0.14 : 0.28
                }
            );

            timelineObserver.observe(timeline);
        }
    }

    const sectionIds = ["model-bisnis", "alur-kemitraan", "syarat-ketentuan", "faq-kemitraan"];
    const sections = sectionIds
        .map((id) => document.getElementById(id))
        .filter((section) => section !== null);

    const syncActiveSubnav = () => {
        let current = sectionIds[0];

        sections.forEach((section) => {
            if (window.scrollY >= section.offsetTop - getAnchorOffset()) {
                current = section.id;
            }
        });

        subnavLinks.forEach((link) => {
            const target = (link.getAttribute("href") || "").replace("#", "");
            const isActive = target === current;
            link.classList.toggle("is-active", isActive);

            if (isActive && subnavInner && window.innerWidth <= 767) {
                link.scrollIntoView({
                    behavior: "smooth",
                    inline: "center",
                    block: "nearest"
                });
            }
        });

        if (subnav) {
            subnav.classList.toggle("is-scrolled", window.scrollY > 120);
        }
    };

    subnavLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const targetId = (link.getAttribute("href") || "").replace("#", "");
            const targetEl = document.getElementById(targetId);

            if (!targetEl) {
                return;
            }

            const headerOffset = getAnchorOffset();
            const targetPos = targetEl.getBoundingClientRect().top + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: targetPos,
                behavior: "smooth"
            });
        });
    });

    faqItems.forEach((item) => {
        const button = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");

        if (!button || !answer) {
            return;
        }

        button.addEventListener("click", () => {
            const isOpen = item.classList.contains("is-open");

            faqItems.forEach((faqItem) => {
                const faqAnswer = faqItem.querySelector(".faq-answer");
                const faqButton = faqItem.querySelector(".faq-question");

                faqItem.classList.remove("is-open");
                if (faqAnswer) {
                    faqAnswer.style.maxHeight = "0px";
                }
                if (faqButton) {
                    faqButton.setAttribute("aria-expanded", "false");
                }
            });

            if (!isOpen) {
                item.classList.add("is-open");
                answer.style.maxHeight = (answer.scrollHeight + 8) + "px";
                button.setAttribute("aria-expanded", "true");
            }
        });
    });

    updateHeaderState();
    syncActiveSubnav();

    window.addEventListener("scroll", () => {
        updateHeaderState();
        syncActiveSubnav();
    }, { passive: true });
});
