document.addEventListener('DOMContentLoaded', function() {
  const containers = document.querySelectorAll('.about-carousel-container');

  containers.forEach(function(container) {
    container.addEventListener('click', function(e) {
      e.stopPropagation(); // prevent bubbling so outside click handler won't trigger immediately
      if (this.classList.contains('active')) {
        // Collapse if already active
        this.classList.remove('active');
      } else {
        // Deactivate all others immediately
        containers.forEach(c => c.classList.remove('active'));

        // Scroll into view first
        this.scrollIntoView({
          behavior: 'smooth',
          inline: 'center',
          block: 'nearest',
        });

        // Wait ~400ms before adding .active
        setTimeout(() => {
          this.classList.add('active');
        }, 400);
      }
    });
  });

  // Click outside to deactivate all
  document.addEventListener('click', function(e) {
    // If click is not inside any container
    if (![...containers].some(container => container.contains(e.target))) {
      containers.forEach(c => c.classList.remove('active'));
    }
  });
});
