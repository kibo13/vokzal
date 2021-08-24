import IMask from "imask";
const contact_form = document.getElementById("contact-form");

// deals.form is active
if (contact_form) {
  var m_phone = IMask(document.getElementById("phone"), {
    mask: "+{7} 000 000 00 00",
  });

  var a_phone = IMask(document.getElementById("adm_phone"), {
    mask: "+{7} 000 000 00 00",
  });

  var d_phone = IMask(document.getElementById("ds_phone"), {
    mask: "+{7} 000 000 00 00",
  });
}
