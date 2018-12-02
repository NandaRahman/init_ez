<?php

namespace App\Libs;


abstract class PaymentMethod
{
    abstract public function unique_code();
}