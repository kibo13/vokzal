$(document).on("click", ".kitchen-button", function (e) {
  let id = this.dataset.id;
  let age = $(this).data("age");

  if (age == 0) {
    $(".overlay").toggleClass("hide");
    $(".gallery__popup").toggleClass("visibilited");
    $(".gallery__popup").fadeToggle();
  } else {
    $.ajax({
      url: `/carts/create/${id}`,
      method: "get",
      success: function (response) {
        window.location.reload();
      },
    });
  }
});

$(document).on("click", ".age-accept", function (e) {
  $.ajax({
    url: `/carts/age`,
    method: "get",
    success: function (response) {
      window.location.reload();
    },
  });
});

$(document).on("click", ".age-decline", function (e) {
  $(".overlay").toggleClass("hide");
  $("#age-modal").toggleClass("visibilited");
  $("#age-modal").fadeToggle();
});
