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
    invoiceId: "000000001",
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
  // payment method selected
  else {
    // payment is card
    if (data.pay == 1) {
      $.ajax({
        type: "POST",
        url: "https://testoauth.homebank.kz/epay2/oauth2/token",
        data: {
          grant_type: "client_credentials",
          scope: "payment",
          client_id: "test",
          client_secret: "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
          invoiceID: "000000001",
          amount: 100,
          currency: "KZT",
          terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
          postLink: "",
          failurePostLink: "",
        },
        success: function (auth) {
          halyk.pay(createPaymentObject(auth, data));
        },
      });
    }
    // payment is cash
    else {
      createOrder(data);
    }
  }
});

// creating an object for payment
var createPaymentObject = function (auth, data) {
  var paymentObject = {
    invoiceId: data.invoiceId,
    backLink: "",
    failureBackLink: "",
    postLink: "",
    failurePostLink: "",
    language: "RU",
    description: "Оплата в интернет магазине",
    accountId: "testuser1",
    terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
    amount: 100,
    currency: data.currency,
    phone: "77777777777",
    email: "epay@halykbank.kz",
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
