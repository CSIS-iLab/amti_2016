document.addEventListener("DOMContentLoaded", function(event) {
  var select = document.getElementById(
    "transparency_homepage_featured_satellites"
  );
  select.setAttribute(
    "data-originalValue",
    [...select.selectedOptions].map(function(option) {
      return option.value;
    })
  );
  select.onchange = function() {
    if (this.selectedOptions.length > 5) {
      alert("Choose 5 or Fewer Maps");
      let selectedIds = select.getAttribute("data-originalValue").split(",");
      [...select.options]
        .filter(function(option) {
          option.selected = false;
          return selectedIds.includes(option.value);
        })
        .forEach(function(option) {
          option.selected = true;
        });
    }
  };
});
