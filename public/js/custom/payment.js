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
$(document).on("click", "#confirm-order", async function (e) {
  // TEST
  // const _INVOICE_ID = Math.floor(Math.random() * 100000000);

  // PROD
  const _INVOICE_ID = this.dataset.order;

  // общие настройки полей
  const _ID = this.dataset.id;
  const _AMOUNT = $("#total").val();
  const _METHOD_PAY = $("#pay-output").val();

  // валидация для способа оплаты
  if (_METHOD_PAY == null || _METHOD_PAY == "") {
    alert("Необходимо выбрать способ оплаты");
    return;
  }

  // создаем заказ в БД
  let response = (
    await axios.post(`/carts/step_3/${_ID}`, {
      code: _INVOICE_ID,
      pay: _METHOD_PAY,
      amount: _AMOUNT,
      status: 1,
      check: 0,
    })
  ).data;

  // если оплата онлайн картой
  if (response.method_pay == 1) {
    var auth = await axios.post("/token", {
      order: response.invoice_id,
      amount: response.amount,
    });

    halyk.pay(
      createPaymentObject(auth.data, response.invoice_id, response.amount)
    );
  }

  // если оплата наличкой
  if (response.method_pay == 2) {
    window.location.href = window.location.origin + "/deliveries";
  }
});

// параметры для метода halyk.pay()
var createPaymentObject = function (auth, invoiceId, amount) {
  var paymentObject = {
    invoiceId: invoiceId,
    backLink: window.location.origin,
    failureBackLink: window.location.origin,
    postLink: window.location.origin + "/success",
    failurePostLink: window.location.origin + "/failure",
    language: "RU",
    description: "Оплата в ресторане VOKZAL GASTROBAR",
    accountId: "VOKZALGASTROBAR.KZ",
    amount: amount,
    currency: "KZT",
    phone: $("#phone").val(),
    email: "example@example.com",
    cardSave: true,

    // TEST
    // terminal: "67e34d63-102f-4bd1-898e-370781d0074d",

    // PROD
    terminal: "746ce546-2838-44a5-8bea-3475dbb42702",
  };

  paymentObject.auth = auth;
  return paymentObject;
};
