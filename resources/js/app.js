import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.querySelector('.navbar');

    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow');
            } else {
                navbar.classList.remove('shadow');
            }
        });
    }

    // Applications is a split link/caret dropdown in the source design; its main
    // label never navigates, it only toggles the submenu (see html-design source).
    var applicationsLink = document.querySelector('.js-applications-toggle');

    if (applicationsLink) {
        applicationsLink.addEventListener('click', function (e) {
            e.preventDefault();

            var dropdown = this.closest('.dropdown');
            var menu = dropdown.querySelector('.dropdown-menu');

            dropdown.classList.toggle('show');
            menu.classList.toggle('show');
        });
    }

    // Car Clubs page: clicking a tile closes any other open panel before
    // toggling its own (single-open-accordion behavior, from carclubs.html).
    var clubTiles = document.querySelectorAll('.js-club-tile');
    var clubPanels = document.querySelectorAll('.js-club-panel');

    clubTiles.forEach(function (tile) {
        tile.addEventListener('click', function () {
            var targetId = tile.getAttribute('data-bs-target');
            var target = document.querySelector(targetId);

            clubPanels.forEach(function (panel) {
                if (panel !== target) {
                    bootstrap.Collapse.getOrCreateInstance(panel, { toggle: false }).hide();
                }
            });

            bootstrap.Collapse.getOrCreateInstance(target, { toggle: false }).toggle();
        });
    });
});
