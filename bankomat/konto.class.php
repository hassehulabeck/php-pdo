<?php

class Konto
{

    private $saldo;
    private static $exchangeRates = [
        "EUR" => 9.87,
        "USD" => 9.77,
        "GBP" => 11.42
    ];

    public function __construct($saldo)
    {
        $this->saldo = $saldo;
    }

    public function deposit(int $amount)
    {
        if ($amount > 0) {
            $this->saldo += $amount;
        }
    }

    public function withdraw(int $amount)
    {
        if ($amount <= $this->saldo) {
            if ($amount > 0) {
                $this->saldo -= $amount;
                return $amount;
            }
        }
    }
    public function getSaldo()
    {
        return $this->saldo;
    }

    public static function getExchangeRates()
    {
        return self::$exchangeRates;
    }
}
