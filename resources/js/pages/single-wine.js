/*============ 
HERO IMG
=============*/
document.addEventListener("DOMContentLoaded", function () {
  const images = document.querySelectorAll(".product-image");
  const nextBtn = document.getElementById("next");
  const prevBtn = document.getElementById("prev");
  const swipeArea = document.querySelector(".product-image-wrapper"); // area to swipe
  let current = 0; // index of active image

  function showImage(index) {
    images.forEach((img) => img.classList.remove("active"));
    images[index].classList.add("active");
  }

  function goNext() {
    current = (current + 1) % images.length;
    showImage(current);
  }

  function goPrev() {
    current = (current - 1 + images.length) % images.length;
    showImage(current);
  }

  // Buttons (desktop / also work on mobile)
  nextBtn && nextBtn.addEventListener("click", goNext);
  prevBtn && prevBtn.addEventListener("click", goPrev);

  // --- Swipe support (Pointer Events) ---
  let startX = 0;
  let startY = 0;
  let tracking = false;

  swipeArea.style.touchAction = "pan-y";
  swipeArea.style.userSelect = "none";

  // Start tracking
  swipeArea.addEventListener("pointerdown", (e) => {
    tracking = true;
    startX = e.clientX;
    startY = e.clientY;
  });

  // End & decide
  swipeArea.addEventListener("pointerup", (e) => {
    if (!tracking) return;
    const dx = e.clientX - startX;
    const dy = e.clientY - startY;
    tracking = false;

    // Only act on mostly-horizontal swipes over a small threshold
    const THRESHOLD = 20; // px
    if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > THRESHOLD) {
      if (dx < 0) {
        goNext(); // swipe left → next
      } else {
        goPrev(); // swipe right → previous
      }
    }
  });

  // Cancel if pointer leaves/gets canceled
  swipeArea.addEventListener("pointercancel", () => (tracking = false));
  swipeArea.addEventListener("pointerleave", () => (tracking = false));

  // Optional: prevent long-press selecting images while swiping
  swipeArea.style.userSelect = "none";
});

/*============ 
TECH INFO
=============*/
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".tech-info-inner");
  const track = document.querySelector(".tech-info-track");

  const swipeArea = container; 
  if (!container || !track) return; // guard

  // Real cards before cloning
  const realCards = Array.from(track.children);
  const realCount = realCards.length;

  // Clone ends
  const firstClone = realCards[0].cloneNode(true);
  const lastClone = realCards[realCount - 1].cloneNode(true);
  firstClone.dataset.clone = "true";
  lastClone.dataset.clone = "true";
  track.insertBefore(lastClone, realCards[0]); // prepend last
  track.appendChild(firstClone); // append first

  let allCards = Array.from(track.children);

  // Start on whatever was .active (fallback to first)
  let initialRealActive = realCards.findIndex((el) =>
    el.classList.contains("active")
  );
  if (initialRealActive < 0) initialRealActive = 0;
  let current = initialRealActive + 1; // +1 due to prepended clone
  let isAnimating = false;

  function setActive(index) {
    allCards.forEach((el) => el.classList.remove("active"));
    allCards[index]?.classList.add("active");
  }

  function centerOn(index) {
    const active = allCards[index];
    const cardCenter = active.offsetLeft + active.offsetWidth / 2;
    const containerCenter = container.clientWidth / 2;
    const delta = cardCenter - containerCenter;
    track.style.transform = `translateX(${-delta}px)`;
  }

  function teleport(toIndex) {
    container.classList.add("no-animate"); // kills card transitions
    track.style.transition = "none"; // kills track transition
    void track.offsetWidth; // flush

    current = toIndex;
    setActive(current);
    centerOn(current); // jump instantly

    // re-enable AFTER a paint so browser can't coalesce and animate it
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        track.style.transition = ""; // restore CSS transition
        container.classList.remove("no-animate");
      });
    });
  }

  // Initial position
  setActive(current);
  centerOn(current, false);

  // Controls
  const nextBtn = document.getElementById("card-next");
  const prevBtn = document.getElementById("card-prev");

  function goNext() {
    if (isAnimating) return;
    isAnimating = true;
    current += 1;
    setActive(current);
    centerOn(current, true);
  }

  function goPrev() {
    if (isAnimating) return;
    isAnimating = true;
    current -= 1;
    setActive(current);
    centerOn(current, true);
  }

   // ✅ guard in case buttons aren’t present
  nextBtn && nextBtn.addEventListener("click", goNext);
  prevBtn && prevBtn.addEventListener("click", goPrev);

  // --- Swipe support (Pointer Events) ---
  let startX = 0;
  let startY = 0;
  let tracking = false;

   swipeArea.style.touchAction = "pan-y";
  swipeArea.style.userSelect = "none";

  // Start tracking
  swipeArea.addEventListener("pointerdown", (e) => {
    tracking = true;
    startX = e.clientX;
    startY = e.clientY;
  });

  // End & decide
  swipeArea.addEventListener("pointerup", (e) => {
    if (!tracking) return;
    const dx = e.clientX - startX;
    const dy = e.clientY - startY;
    tracking = false;

    // Only act on mostly-horizontal swipes over a small threshold
    const THRESHOLD = 20; // px
    if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > THRESHOLD) {
      if (dx < 0) {
        goNext(); // swipe left → next
      } else {
        goPrev(); // swipe right → previous
      }
    }
  });

  // Cancel if pointer leaves/gets canceled
  swipeArea.addEventListener("pointercancel", () => (tracking = false));
  swipeArea.addEventListener("pointerleave", () => (tracking = false));

  // Optional: prevent long-press selecting images while swiping
  swipeArea.style.userSelect = "none";
  // Single transitionend handler → teleport when we hit a clone
  track.addEventListener("transitionend", (e) => {
    if (e.propertyName !== "transform") return;
    isAnimating = false;
    if (current === allCards.length - 1) teleport(1); // tail clone → first real
    if (current === 0) teleport(realCount); // head clone → last real
  });

  // Re-center on resize
  window.addEventListener("resize", () => centerOn(current, false));
});
/*============ 
TASTING NOTES
=============*/
document.addEventListener("DOMContentLoaded", function () {
  const imageEls = document.querySelectorAll(".tasting-notes-image-wrapper");
  const textEls = document.querySelectorAll(".tasting-notes-text-wrapper");

  imageEls.forEach((imgEl, index) => {
    imgEl.addEventListener("click", function () {
      // Remove active class from all
      textEls.forEach((el) => el.classList.remove("active"));

      // Add active to the one that matches index
      textEls[index].classList.add("active");
    });
  });
});

/*document.addEventListener('DOMContentLoaded', function () {
  const zoomContainers = document.querySelectorAll('.zoom-container');

  zoomContainers.forEach(container => {
    const img = container.querySelector('.zoom-container img');

    container.addEventListener('mousemove', function (e) {
      const bounds = container.getBoundingClientRect();
      const x = ((e.clientX - bounds.left) / bounds.width) * 100;
      const y = ((e.clientY - bounds.top) / bounds.height) * 100;

      img.style.transformOrigin = `${x}% ${y}%`;
      img.style.transform = 'scale(3)';
    });

    container.addEventListener('mouseleave', function () {
      img.style.transformOrigin = 'center center';
      img.style.transform = 'scale(1)';
    });
  });
});
*/