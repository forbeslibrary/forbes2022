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
  var mainMenus = document.getElementsByClassName('menu');
  var subMenus = document.getElementsByClassName('sub-menu');

  var combinedMenus = [].concat(Array.prototype.slice.call(mainMenus), Array.prototype.slice.call(subMenus));
  var cMenusLen = combinedMenus.length;

  for (var m = 0; m < cMenusLen; m++) {
    var allMenuLis = combinedMenus[m].children;
    var lisLen = allMenuLis.length;

    for (var l = 0; l < lisLen; l++) {
      allMenuLis.item(l).firstElementChild.addEventListener('keydown', function (e) {
        var key = e.which || e.keyCode;
        var parentMenu = this.closest('.menu>.menu-item');

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
          if (this.nextElementSibling) {
            this.nextElementSibling.firstElementChild.firstElementChild.focus();
          } else if (this.parentElement.nextElementSibling) {
            this.parentElement.nextElementSibling.firstElementChild.focus();
          }
        } else if (key === 38) { // up key
          e.preventDefault();
          if (this.parentElement.previousElementSibling) {
            this.parentElement.previousElementSibling.firstElementChild.focus();
          } else if (this.parentElement.parentElement.previousElementSibling) {
            this.parentElement.parentElement.previousElementSibling.focus();
          }
        }
      }); // end add event listener
    }
  }
})();
