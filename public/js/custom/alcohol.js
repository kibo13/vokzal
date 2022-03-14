$(document).on("click", ".kitchen-button", async function (e) {
  let id = this.dataset.id;
  let age = $(this).data("age");

  if (age == 0) {
    $(".overlay").toggleClass("hide");
    $(".gallery__popup").toggleClass("visibilited");
    $(".gallery__popup").fadeToggle();
    return
  }

  let {data} = await axios.get(`/carts/create/${id}`)
  if (data == "close") {
    $(".bk-modal").css("display", "flex")
  }
  if (data == "open") {
    window.location.reload();
  }
});

// stop delivery
const std_modal = document.getElementById("bk-modal")
window.onclick = function(event) {
  if (event.target == std_modal) {
    std_modal.style.display = "none";
  }
}

$(document).on("click", ".bk-modal-close", () => std_modal.style.display = "none")

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
