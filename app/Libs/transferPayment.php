<?php

namespace App\Libs;


class TransferPayment extends PaymentMethod
{
    private $bca;
    private $mandiri;
    private $alfamart;
    private $indomaret;

    public function unique_code()
    {
        if ($this->bca || $this->mandiri) {
            $kode = 10;
        } elseif ($this->alfamart || $this->indomaret) {
            $kode = str_random();
        } else {
            $kode = 0;
        }
        return $kode;
    }

    public static function bankPayment()
    {
        return 10;
    }

    public static function non_bankPayment()
    {
        return str_random();
    }
}