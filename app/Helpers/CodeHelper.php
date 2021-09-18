<?php

function getInvoiceId($id)
{
  // max length
  $default = 10;

  // order number template
  $template = '0000000000' . $id;

  // max length should be 10 characters
  $length = strlen($template);

  // number of characters between lines
  $diff = $length - $default;

  return substr($template, $diff);
}
