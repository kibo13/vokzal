// validation-form
const validation_form = document.querySelector(".valid-form");

// if active validation-form
if (validation_form != null) {
  // validation for numeric fields
  $(".bk-number").on("input", function (e) {
    this.value = this.value.replace(/^0|[^\d]/g, "");
  });
}
