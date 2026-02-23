<?php

namespace App\Classes;

/**
 * Payment - Base abstract class
 * Demonstrates abstract class and inheritance
 */
abstract class Payment implements PaymentInterface
{
    protected string $transactionId;
    protected float $amount;
    protected string $currency = 'USD';

    public function __construct(string $transactionId = '')
    {
        $this->transactionId = $transactionId ?: uniqid('txn_', true);
    }

    /**
     * Get the transaction ID
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * Set the currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Get the currency
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Get the amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Abstract method for child classes to implement
     */
    abstract public function validatePaymentDetails(): bool;
}
