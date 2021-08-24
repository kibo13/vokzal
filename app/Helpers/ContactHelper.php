<?php

use App\Models\Contact;

function getContact()
{
  return Contact::first();
}