const links = document.querySelectorAll(".page-link");
let currentPath = window.location.pathname;

// Treat "/index.html" and "/" as the same (home page)
if (currentPath === "/index.html" || currentPath === "/") {
  currentPath = "/";
}

links.forEach(link => {
  const linkPath = new URL(link.href).pathname;

  // Also normalize linkPath for consistency
  const normalizedLinkPath = linkPath === "/index.html" ? "/" : linkPath;

  if (normalizedLinkPath === currentPath) {
    link.classList.add("active");
  }
});


    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.querySelector('.close-btn');

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('showSidebar');
    });

    closeBtn.addEventListener('click', function () {
        sidebar.classList.remove('showSidebar');
    });