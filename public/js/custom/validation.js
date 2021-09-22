var is_contact = document.getElementById("form-contact");

// validation for fields in cart
if (is_contact) {
  // field for last_name
  $("#last_name").on("input", function (e) {
    this.value = this.value.replace(/[^a-zа-яё\s]/gi, "");
  });
  // field for first_name
  $("#first_name").on("input", function (e) {
    this.value = this.value.replace(/[^a-zа-яё\s]/gi, "");
  });
  // field for phone
  let phone = document.getElementById("phone");
  var maskOptions = {
    mask: "+{7} 000 000 00 00",
  };
  var mask = IMask(phone, maskOptions);
}
