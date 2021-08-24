const dish_form = document.getElementById("dish-form");

// if active dish-form
if (dish_form) {
  // getting a category by continent_id
  $("#continent_id").on("change", (e) => {
    let continent_id = $(e.target).val();
    let lang = $("#lang").val();

    // clear select - assortment_id
    $("#assortment_id").empty();

    $.ajax({
      url: "/data/assortments",
      method: "GET",
    }).done(function (response) {
      for (let el of response) {
        if (el.continent_id == continent_id) {
          // for RU
          if (lang == "ru") {
            $("#assortment_id").append(
              `<option value="${el.assortment_id}">${el.name_ru}</option>`
            );
          }
          // for EN
          else if (lang == "en") {
            $("#assortment_id").append(
              `<option value="${el.assortment_id}">${el.name_en}</option>`
            );
          }
          // for KK
          else {
            $("#assortment_id").append(
              `<option value="${el.assortment_id}">${el.name_kk}</option>`
            );
          }
        }
      }
    });
  });
}
