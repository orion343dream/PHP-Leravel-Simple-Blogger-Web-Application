<?php

namespace App\Classes;

/**
 * PaymentInterface - Contract for payment processing
 * Demonstrates interface design pattern
 */
interface PaymentInterface
{
    public function pay(float $amount): bool;
    public function refund(float $amount): bool;
    public function getTransactionId(): string;
}
