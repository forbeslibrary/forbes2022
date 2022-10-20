/**
 * Enchance the accessibility of our theme with Javascript
 */
(function () {
  // toggle menu with enter key
  var menuToggle = document.getElementById('top-menu-toggle');

  menuToggle.addEventListener('keydown', function (e) {
    var key = e.which || e.keyCode;

    if (key === 13) {
      menuToggle.checked = !menuToggle.checked;
    }
  });

  // menu navigation with arrow keys
  var menus = document.getElementsByClassName('menu');

  for (const menu of menus) {
    const menuItems = menu.querySelectorAll('.menu-item');

    for (let i = 0; i < menuItems.length; i++) {
      if (i > 0) {
        menuItems[i].setAttribute('data-prevMenu', menuItems[i - 1].id);
      }
      if (i < menuItems.length - 1) {
        menuItems[i].setAttribute('data-nextMenu', menuItems[i + 1].id);
      }
    }

    for (const menuItem of menuItems) {
      const link = menuItem.querySelector('a');
      link.addEventListener('keydown', function (e) {
        const key = e.which || e.keyCode;

        const parentMenu = this.closest('.menu>.menu-item');

        if (key === 27) { // Esc key
          e.preventDefault();
          this.blur();
        } else if (key === 37) { // left key
          e.preventDefault();
          if (parentMenu.previousElementSibling) {
            parentMenu.previousElementSibling.firstElementChild.focus();
          }
        } else if (key === 39) { // right key
          e.preventDefault();
          if (parentMenu.nextElementSibling) {
            parentMenu.nextElementSibling.firstElementChild.focus();
          }
        } else if (key === 40) { // down key
          e.preventDefault();
          if (menuItem.getAttribute('data-nextMenu')) {
            const nextMenu = document.getElementById(menuItem.getAttribute('data-nextMenu'));
            const nextLink = nextMenu.querySelector('a');
            nextLink.focus();
          }
        } else if (key === 38) { // up key
          e.preventDefault();
          if (menuItem.getAttribute('data-prevMenu')) {
            const prevMenu = document.getElementById(menuItem.getAttribute('data-prevMenu'));
            const prevLink = prevMenu.querySelector('a');
            prevLink.focus();
            if (!prevLink.matches(':focus')) {
              parentMenu.previousElementSibling.firstElementChild.focus();
            }
          }
        }
      });
    }
  };
})();
