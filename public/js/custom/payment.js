const TEST_TOKEN = "https://testoauth.homebank.kz/epay2/oauth2/token";
const PROD_TOKEN = "https://epay-oauth.homebank.kz/oauth2/token";

function getPostLink(slug) {
  let hostname = window.location.origin;
  let locale = "/" + $(".active__lang").data("locale");
  let pathname = `/${slug}/`;

  let postLink = hostname + locale + pathname;

  return postLink;
}

$(document).on("change", ".payment-toggle", function (e) {
  $("#pay-output").val(this.value);
});

$(".payment-item").on("click", function (e) {
  $(".form__payment--item").removeClass("active-pay");
  $(this.parentNode).addClass("active-pay");
});

$(document).on("click", "#confirm-order", function (e) {
  let data = {
    // for order
    id: this.dataset.id,
    pay: $("#pay-output").val(),
    status: 1,
    check: 0,
    amount: $("#total").val(),

    // for token
    token_body: {
      csrf_token: $('meta[name="csrf-token"]').attr("content"),
      grant_type: "client_credentials",
      scope: "payment",
      client_id: "test",
      client_secret: "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
      invoiceID: "9585732", // must be changed at each request
      amount: $("#total").val(),
      currency: "KZT",
      terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
      postLink: "",
      failurePostLink: "",
    },
  };

  // payment method is not selected selected
  if (data.pay == "" || data.pay == null) {
    alert("Необходимо выбрать способ оплаты");
    return;
  }

  // payment is card
  if (data.pay == 1) {
    processPayment(data);
  }
  // payment is cash
  else {
    createOrder(data);
  }
});

// receiving a payment token
function processPayment(data) {
  $.ajax({
    type: "POST",
    url: TEST_TOKEN,
    data: data.token_body,

    // it's work
    success: (auth) =>
      halyk.pay(
        createPaymentObject(
          auth,
          data.token_body.invoiceID,
          data.token_body.amount
        )
      ),
  });
}

// creating an object for payment
var createPaymentObject = function (auth, invoiceId, amount) {
  var paymentObject = {
    csrf_token: $('meta[name="csrf-token"]').attr("content"),
    invoiceId: invoiceId,
    backLink: getPostLink("success"),
    failureBackLink: "",
    postLink: getPostLink("payment"),
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
