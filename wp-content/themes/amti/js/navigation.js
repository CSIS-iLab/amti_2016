/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 * Toggles search bar in header navigation. - Added by JS
 */
(function() {
  var container, button, menu, links, subMenus, i, len;

  container = document.getElementById("site-navigation");
  if (!container) {
    return;
  }

  button = container.getElementsByTagName("button")[0];
  if ("undefined" === typeof button) {
    return;
  }

  menu = container.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  menu.setAttribute("aria-expanded", "false");
  if (-1 === menu.className.indexOf("nav-menu")) {
    menu.className += " nav-menu";
  }

  button.onclick = function() {
    if (-1 !== container.className.indexOf("toggled")) {
      container.className = container.className.replace(" toggled", "");
      button.setAttribute("aria-expanded", "false");
      menu.setAttribute("aria-expanded", "false");
    } else {
      container.className += " toggled";
      button.setAttribute("aria-expanded", "true");
      menu.setAttribute("aria-expanded", "true");
    }
  };

  // Get all the link elements within the menu.
  links = menu.getElementsByTagName("a");
  subMenus = menu.getElementsByTagName("ul");

  // Set menu items with submenus to aria-haspopup="true".
  for (i = 0, len = subMenus.length; i < len; i++) {
    subMenus[i].parentNode.setAttribute("aria-haspopup", "true");
  }

  // Each time a menu link is focused or blurred, toggle focus.
  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener("focus", toggleFocus, true);
    links[i].addEventListener("blur", toggleFocus, true);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    var self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while (-1 === self.className.indexOf("nav-menu")) {
      // On li elements toggle the class .focus.
      if ("li" === self.tagName.toLowerCase()) {
        if (-1 !== self.className.indexOf("focus")) {
          self.className = self.className.replace(" focus", "");
        } else {
          self.className += " focus";
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  (function(container) {
    var touchStartFn,
      i,
      parentLink = container.querySelectorAll(
        ".menu-item-has-children > a, .page_item_has_children > a"
      );

    if ("ontouchstart" in window) {
      touchStartFn = function(e) {
        var menuItem = this.parentNode,
          i;

        if (!menuItem.classList.contains("focus")) {
          e.preventDefault();
          for (i = 0; i < menuItem.parentNode.children.length; ++i) {
            if (menuItem === menuItem.parentNode.children[i]) {
              continue;
            }
            menuItem.parentNode.children[i].classList.remove("focus");
          }
          menuItem.classList.add("focus");
        } else {
          menuItem.classList.remove("focus");
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener("touchstart", touchStartFn, false);
      }
    }
  })(container);

  if (!String.prototype.includes) {
    Object.defineProperty(String.prototype, "includes", {
      value: function(search, start) {
        if (typeof start !== "number") {
          start = 0;
        }

        if (start + search.length > this.length) {
          return false;
        } else {
          return this.indexOf(search, start) !== -1;
        }
      }
    });
  }

  if (!Array.prototype.includes) {
    Object.defineProperty(Array.prototype, "includes", {
      value: function(searchElement, fromIndex) {
        if (this == null) {
          throw new TypeError('"this" is null or not defined');
        }

        var o = Object(this);

        var len = o.length >>> 0;

        if (len === 0) {
          return false;
        }

        var n = fromIndex | 0;

        var k = Math.max(n >= 0 ? n : len - Math.abs(n), 0);

        function sameValueZero(x, y) {
          return (
            x === y ||
            (typeof x === "number" &&
              typeof y === "number" &&
              isNaN(x) &&
              isNaN(y))
          );
        }

        while (k < len) {
          if (sameValueZero(o[k], searchElement)) {
            return true;
          }
          k++;
        }

        return false;
      }
    });
  }
})();

jQuery(document).ready(function($) {
  /**
   * Toggles `active` class on search form.
   */
  $("#navSearchLabel").click(function() {
    $("#navSearchInput").toggle("slow");
  });

  if ($(" .anchor-links").length) {
    $(
      ".single-island-tracker .entry-content h2, .single-island-tracker .entry-content h3"
    ).each(function(i) {
      $headingId = ($(this).text() + "-heading").replace(/\s/g, "");

      $(this).attr("id", $headingId);

      $(".anchor-links").append(
        '<a href="#' +
          $headingId +
          '"><button>' +
          $(this).text() +
          "</button></a>"
      );
    });
  }
});

(function($) {
  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $("html, body").animate(
            {
              scrollTop: target.offset().top - 100
            },
            1000,
            function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) {
                // Checking if the target was focused
                return false;
              } else {
                $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              }
            }
          );
        }
      }
    });
})(jQuery);
