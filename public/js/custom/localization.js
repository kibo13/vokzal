$("#locale-toggler").on("click", (e) => {
  let list = $("#lang-list");

  if (list.hasClass("d-none")) {
    list.removeClass("d-none");
  } else {
    list.addClass("d-none");
  }
});

$(document).on("click", ".bk-lang", function (e) {
  let hostname = window.location.origin;
  let locale = this.dataset.locale;
  let pathname = window.location.pathname.substr(3);

  $.ajax({
    url: `/${locale}`,
    method: "GET",
    success: function (e) {
      window.location.href = `${hostname}/${locale}${pathname}`;
    },
  });
});
