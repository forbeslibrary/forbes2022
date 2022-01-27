/**
 * Load Libraryh3lp's chat code
 *
 * Loads a script from Libraryh3lp to show and hide the chat widget and popup
 * a proactive chat invitation that appears after users have spent a set ammount
 * of time on the page.
 */
(function () {
  var x = document.createElement('script'); x.type = 'text/javascript'; x.async = true;
  x.src = (document.location.protocol === 'https:' ? 'https://' : 'http://') + 'libraryh3lp.com/js/libraryh3lp.js?multi,poll';
  var y = document.getElementsByTagName('script')[0]; y.parentNode.insertBefore(x, y);
})();

/**
 * Run a custom Libraryh3lp presence check and add a class to the body element
 * based on the result.
 */
(function () {
  function checkPresence () {
    var user = 'forbes-library-queue';
    var domain = 'chat.libraryh3lp.com';
    var url = ['https://libraryh3lp.com/presence/jid', user, domain, 'text'].join('/');
    var body = document.getElementsByTagName('body')[0];
    fetch(url)
      .then(function (response) { return response.text(); })
      .then(function (s) {
        if (s === 'available' || s === 'chat') {
          body.classList.add('chat-available');
          body.classList.remove('chat-offline');
        } else {
          body.classList.add('chat-offline');
          body.classList.remove('chat-available');
        }
        setTimeout(checkPresence, 2000);
      });
  }
  checkPresence();
})();
