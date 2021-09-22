const test_token = "https://testoauth.homebank.kz/epay2/oauth2/token";
const prod_token = "https://epay-oauth.homebank.kz/oauth2/token";

$(document).on("change", ".payment-toggle", function (e) {
  $("#pay-output").val(this.value);
});

$(".payment-item").on("click", function (e) {
  $(".form__payment--item").removeClass("active-pay");
  $(this.parentNode).addClass("active-pay");
});

$(document).on("click", "#confirm-order", function (e) {
  let data = {
    id: this.dataset.id,
    invoiceId: "1238677934", // configration
    pay: $("#pay-output").val(),
    status: 1,
    check: 0,
    amount: $("#total").val(),
    currency: "KZT",
  };

  // payment method is not selected selected
  if (data.pay == "" || data.pay == null) {
    alert("Необходимо выбрать способ оплаты");
    return;
  }

  // payment is card
  if (data.pay == 1) {
    getToken();
  }
  // payment is cash
  else {
    createOrder(data);
  }
});

// receiving a payment token
function getToken() {
  const body = {
    grant_type: "client_credentials",
    scope: "payment",
    client_id: "test",
    client_secret: "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
    invoiceID: "724278234",
    amount: 100,
    currency: "KZT",
    terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
    postLink: "",
    failurePostLink: "",
  };

  $.ajax({
    type: "POST",
    url: test_token,
    data: body,
    // it's work
    success: (auth) =>
      halyk.pay(createPaymentObject(auth, body.invoiceID, body.amount)),
  });
}

// creating an object for payment
var createPaymentObject = function (auth, invoiceId, amount) {
  var paymentObject = {
    invoiceId: invoiceId,
    backLink: "https://www.cf64514.tmweb.ru/ru/payment",
    failureBackLink: "",
    postLink: "https://www.cf64514.tmweb.ru/ru/payment",
    failurePostLink: "",
    language: "RU",
    description: "Оплата в интернет магазине",
    accountId: "test",
    terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
    amount: amount,
    currency: "KZT",
    phone: "77777777777",
    email: "example@example.com",
    cardSave: true,
  };
  paymentObject.auth = auth;
  return paymentObject;
};

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
