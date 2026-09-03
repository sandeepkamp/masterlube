document.addEventListener("DOMContentLoaded", function () {
  var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
  var navCollapse = document.getElementById("mainNav");

  navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      navLinks.forEach(function (l) { l.classList.remove("active"); });
      link.classList.add("active");

      if (navCollapse && navCollapse.classList.contains("show")) {
        bootstrap.Collapse.getOrCreateInstance(navCollapse).hide();
      }
    });
  });

  var showcaseItems = document.querySelectorAll(".showcase-item");

  showcaseItems.forEach(function (item) {
    item.addEventListener("click", function (event) {
      var href = item.getAttribute("href");
      if (!href || href === "#") {
        event.preventDefault();
      }
      showcaseItems.forEach(function (i) { i.classList.remove("active"); });
      item.classList.add("active");
    });
  });
});
