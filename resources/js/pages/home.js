function initializeScrollShrink() {
  const container = document.querySelector(".container-scroll-grow");

  if (!container) return;

  function updateWidth() {
    const startScroll = 100;
    const endScroll = 500;

    const scrollY = window.scrollY || window.pageYOffset;
    const scrollPercentage = Math.min(Math.max((scrollY - startScroll) / (endScroll - startScroll), 0), 1);

    const maxWidth = 100;
    const minWidth = 80;
    const newWidth = maxWidth - (maxWidth - minWidth) * scrollPercentage;

    container.style.width = newWidth + "vw";
  }

  window.addEventListener("scroll", updateWidth);
  window.addEventListener("resize", updateWidth);
  updateWidth();
}

document.addEventListener("DOMContentLoaded", initializeScrollShrink);