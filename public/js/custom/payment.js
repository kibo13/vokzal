// кнопка для оформления заказа
const btnSubmit = document.getElementById("confirm-order");

// поля
const field_invoice = Math.floor(Math.random() * 100000000);
const field_amount = $("#total").val();

// способ оплаты
$(document).on("change", ".payment-toggle", function (e) {
  $("#pay-output").val(this.value);
});

// стилизация выбранного способа оплаты
$(".payment-item").on("click", function (e) {
  $(".form__payment--item").removeClass("active-pay");
  $(this.parentNode).addClass("active-pay");
});

$(document).on("click", "#confirm-order", async function (e) {
  var auth = await axios.post("/token", {
    order: field_invoice,
    amount: field_amount,
  });

  halyk.pay(createPaymentObject(auth.data, field_invoice, field_amount));
});

// параметры для метода halyk.pay()
var createPaymentObject = function (auth, invoiceId, amount) {
  var paymentObject = {
    invoiceId: invoiceId,
    backLink: getRouteName("test"),
    failureBackLink: getRouteName("test"),
    postLink: getRouteName("success"),
    failurePostLink: getRouteName("failure"),
    language: "RU",
    description: "Оплата в интернет магазине",
    accountId: "testuser1",
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

// получение полного пути
function getRouteName(path) {
  let hostname = window.location.origin;
  let locale = "/" + $(".active__lang").data("locale");
  let pathname = `/${path}/`;

  return hostname + locale + pathname;
}
