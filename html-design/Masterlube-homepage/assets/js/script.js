document.addEventListener('DOMContentLoaded', function () {
  var navbar = document.querySelector('.navbar');

  window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
      navbar.classList.add('shadow');
    } else {
      navbar.classList.remove('shadow');
    }
  });
});
















document.addEventListener("DOMContentLoaded", function () {

    const applicationsLink = document.querySelector(
        '.navbar .dropdown > a.nav-link[href="applications.html"]'
    );

    if (applicationsLink) {

        applicationsLink.addEventListener("click", function (e) {

            /* Applications main link কখনো page open করবে না */
            e.preventDefault();

            const dropdown = this.closest(".dropdown");
            const menu = dropdown.querySelector(".dropdown-menu");

            /* Dropdown open/close */
            dropdown.classList.toggle("show");
            menu.classList.toggle("show");

        });

    }

});

