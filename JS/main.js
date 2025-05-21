const links = document.querySelectorAll(".page-link");
let currentPath = window.location.pathname;

// Treat "/index.html" and "/" as the same (home page)
if (currentPath === "/index.html" || currentPath === "/") {
  currentPath = "/";
}

links.forEach((link) => {
  const linkPath = new URL(link.href).pathname;

  // Also normalize linkPath for consistency
  const normalizedLinkPath = linkPath === "/index.html" ? "/" : linkPath;

  if (normalizedLinkPath === currentPath) {
    link.classList.add("active");
  }
});

const sidebar = document.querySelector(".sidebar");
const toggleBtn = document.getElementById("sidebarToggle");
const closeBtn = document.querySelector(".close-btn");

toggleBtn.addEventListener("click", function () {
  sidebar.classList.toggle("showSidebar");
});

closeBtn.addEventListener("click", function () {
  sidebar.classList.remove("showSidebar");
});

/* drop down button for header navbar show profile account else login */
document
  .querySelector(".dropdown-toggle")
  .addEventListener("click", function () {
    const menu = this.nextElementSibling;
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  });

// Close when clicking outside
window.addEventListener("click", function (e) {
  if (!e.target.matches(".dropdown-toggle")) {
    const menus = document.querySelectorAll(".dropdown-menu");
    menus.forEach((menu) => {
      menu.style.display = "none";
    });
  }
});
