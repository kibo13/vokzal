$(document).on("click", ".cart-plus", function (e) {
  let id = this.dataset.id;

  $.ajax({
    url: `/carts/add/${id}`,
    method: "get",
    success: function (response) {
      window.location.reload();
    },
  });
});

$(document).on("click", ".cart-minus", function (e) {
  let id = this.dataset.id;

  $.ajax({
    url: `/carts/del/${id}`,
    method: "get",
    success: function (response) {
      window.location.reload();
    },
  });
});

$(document).on("click", ".cart-destroy", function (e) {
  let id = this.dataset.id;

  $.ajax({
    url: `/carts/destroy/${id}`,
    method: "get",
    success: function (response) {
      window.location.reload();
    },
  });
});
