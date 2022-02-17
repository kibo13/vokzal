const area_index = document.getElementById("area-index");

// if active area-index
if (area_index) {
  $(document).on("click", ".is_active", function (e) {
    this.parentNode.submit();
  });
}
