// способ оплаты
$(document).on("change", ".payment-toggle", function (e) {
  $("#pay-output").val(this.value);
});

// стилизация выбранного способа оплаты
$(".payment-item").on("click", function (e) {
  $(".form__payment--item").removeClass("active-pay");
  $(this.parentNode).addClass("active-pay");
});

// оформление заказа
$(document).on("click", "#confirm-order", function (e) {
  let data = {
    id: this.dataset.id,
    pay: $("#pay-output").val(),
    status: 1,
    check: 0,
    amount: $("#total").val(),
    invoiceId: "62783248",
  };

  // payment method is not selected selected
  if (data.pay == "" || data.pay == null) {
    alert("Необходимо выбрать способ оплаты");
    return;
  }

  // payment is card
  if (data.pay == 1) {
    $.ajax({
      url: getRouteName("payment/token"),
      method: "GET",
      data: {
        amount: data.amount,
        invoice_id: data.invoiceId,
      },
      success: (auth) => {
        halyk.pay(createPaymentObject(auth, data.invoiceId, data.amount));
      },
    });
  }
  // payment is cash
  else {
    createOrder(data);
  }
});

// creating an object for payment
var createPaymentObject = function (auth, invoiceId, amount) {
  var paymentObject = {
    csrf_token: $('meta[name="csrf-token"]').attr("content"),
    invoiceId: invoiceId,
    backLink: getRouteName("success"),
    failureBackLink: "",
    postLink: getRouteName("payment"),
    failurePostLink: "",
    language: "RU",
    description: "Оплата в интернет магазине",
    accountId: "test",
    terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
    amount: amount,
    currency: "KZT",
    phone: "77777777777",
    email: "kimboris1310@gmail.com",
    cardSave: true,
  };
  paymentObject.auth = auth;
  return paymentObject;
};

// getRouteName
function getRouteName(slug) {
  let hostname = window.location.origin;
  let locale = "/" + $(".active__lang").data("locale");
  let pathname = `/${slug}/`;

  let postLink = hostname + locale + pathname;

  return postLink;
}

// record information about the order in the database
function createOrder(data) {
  $.ajax({
    url: `/carts/step_3/${data.id}`,
    method: "GET",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: {
      status: data.status,
      pay: data.pay,
      amount: data.amount,
      check: data.check,
    },
    success: function (response) {
      window.location.href = window.location.origin + "/deliveries";
    },
  });
}
