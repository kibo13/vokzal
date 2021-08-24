$("#locale-toggler").on("click", (e) => {
  let list = $("#lang-list");

  if (list.hasClass("d-none")) {
    list.removeClass("d-none");
  } else {
    list.addClass("d-none");
  }
});
