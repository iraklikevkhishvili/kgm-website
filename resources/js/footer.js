document.addEventListener("DOMContentLoaded", function () {
    const headings = document.querySelectorAll(".footer-heading");

    headings.forEach((heading) => {
        heading.addEventListener("click", () => {
            const section = heading.parentElement;
            const isOpen = section.classList.contains("open");

            // Close all sections and set aria
            document
                .querySelectorAll(".footer-column, .contact_info_container")
                .forEach((el) => {
                    el.classList.remove("open");
                    el.querySelector(".footer-heading").setAttribute(
                        "aria-expanded",
                        "false"
                    );
                });

            // Open the clicked section if it wasn't already open
            if (!isOpen) {
                section.classList.add("open");
                heading.setAttribute("aria-expanded", "true");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const f = document.getElementById("kgm-footer-newsletter-form");
    if (f) {
        f.addEventListener("submit", function (e) {
            const hp = f.querySelector("#website");
            if (hp && hp.value.trim() !== "") {
                e.preventDefault();
                console.log("[KGM][newsletter] blocked by honeypot");
                return;
            }
            const params = new URLSearchParams(new FormData(f)).toString();
            console.log(
                "[KGM][newsletter] redirect → " + f.action + "?" + params
            );
        });
    }

    // Only clean the URL on the newsletter page and only remove our own params
    if (window.location.pathname.endsWith("/newsletter/")) {
        const url = new URL(window.location.href);
        const before = url.search;
        ["email", "lang", "website"].forEach((k) => url.searchParams.delete(k));
        if (before !== url.search) {
            history.replaceState(
                {},
                "",
                url.pathname + (url.search || "") + url.hash
            );
            console.log("[KGM][newsletter] cleaned query params");
        }
    }
});
