/**
 * Enhance the search form
 */
(function () {
  /**
   * Adds additional behaviors when folks use the radio buttons to switch
   * between searching the catalog or the WordPress site.
   *
   * - Changing the placeholder text is cosmetic and improves usability
   * - Changing the search box name and the form action allows the catalog
   *   search to be submitted directly to the catalog without being redirected
   *   through forbeslibrary.org
   * - Setting the cookie allows the site to default to the last choice made
   */

  var searchForms = document.getElementsByClassName('search-form');
  Array.from(searchForms).forEach(searchForm => {
    var searchBox = searchForm.querySelector('.search-box');
    var searchOptionCatalog = searchForm.querySelector('.search-catalog');
    var searchOptionWebsite = searchForm.querySelector('.search-website');
    var catalogScope = searchForm.querySelector('.catalog-scope');
    var searchWebsiteAction = searchForm.getAttribute('action');
    var searchCatalogAction = 'https://bark.cwmars.org/eg/opac/results';

    if (!(searchOptionCatalog && searchOptionWebsite)) {
      return; // if this form has no search options skip to the next form
    }

    // Remove name attributes from the search options—removing them will make for
    // cleaner urls and they are only needed when Javascript isn't available and
    // we have to redirect searches to the catalog
    searchOptionCatalog.removeAttribute('name');
    searchOptionWebsite.removeAttribute('name');

    // Set default placeholder text
    if (searchOptionCatalog.checked) {
      targetCatalog();
    }
    if (searchOptionWebsite.checked) {
      targetWebsite();
    }

    // Add event listeners
    searchOptionCatalog.addEventListener('click', function () {
      targetCatalog();
    });
    searchOptionWebsite.addEventListener('click', function () {
      targetWebsite();
    });

    function targetCatalog () {
      searchOptionWebsite.checked = false;
      catalogScope.disabled = false;
      searchBox.setAttribute('placeholder', 'search catalog (books, movies, music, and more...)');
      searchBox.setAttribute('name', 'query');
      searchForm.setAttribute('action', searchCatalogAction);
      document.cookie = 'forbes-search-preference=catalog; path=/; max-age=31536000';
    }

    function targetWebsite () {
      searchOptionCatalog.checked = false;
      catalogScope.disabled = true;
      searchBox.setAttribute('placeholder', 'search website');
      searchBox.setAttribute('name', 's');
      searchForm.setAttribute('action', searchWebsiteAction);
      document.cookie = 'forbes-search-preference=website; path=/; max-age=31536000';
    }
  });
})();
