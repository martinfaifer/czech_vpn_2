<?php

namespace App\Actions\Payment;

use Defr\QRPlatba\QRPlatba;

class GenerateQrAction
{
    public function execute($product, $user): string
    {
        $qrPayment = new QRPlatba();

        $qrPayment->setAccount(config('app.payment_bank_number')) // nastavení č. účtu -> zmena do env
            ->setIBAN(config('app.payment_bank_iban')) // nastavení č. účtu => zmena do env
            ->setVariableSymbol($user->variable_symbol)
            ->setMessage("CzechVPN platba za službu {$product->product_name}")
            ->setConstantSymbol('0308')
            ->setSpecificSymbol('1234')
            ->setAmount($product->product_cost)
            ->setCurrency(config('app.payment_currency')) // změna do env
            ->setDueDate(new \DateTime());

        return $qrPayment->getQRCodeImage();
    }
}
