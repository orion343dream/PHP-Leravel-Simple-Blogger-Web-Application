<?php

namespace App\Classes;

/**
 * CreditCardPayment - Concrete implementation of Payment
 * Demonstrates inheritance from abstract class
 */
class CreditCardPayment extends Payment
{
    private string $cardNumber;
    private string $cardHolder;
    private string $expiryDate;
    private string $cvv;
    private array $transactions = [];

    public function __construct(string $cardNumber, string $cardHolder, string $expiryDate, string $cvv)
    {
        parent::__construct();
        $this->cardNumber = $this->maskCardNumber($cardNumber);
        $this->cardHolder = $cardHolder;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    /**
     * Validate payment details before processing
     */
    public function validatePaymentDetails(): bool
    {
        return !empty($this->cardNumber) && 
               !empty($this->cardHolder) && 
               $this->isExpiryDateValid();
    }

    /**
     * Process payment
     */
    public function pay(float $amount): bool
    {
        $this->amount = $amount;

        if (!$this->validatePaymentDetails()) {
            return false;
        }

        // Simulate payment processing
        $transaction = [
            'id' => $this->transactionId,
            'amount' => $amount,
            'currency' => $this->currency,
            'card_holder' => $this->cardHolder,
            'status' => 'success',
            'timestamp' => now(),
        ];

        $this->transactions[] = $transaction;
        return true;
    }

    /**
     * Process refund
     */
    public function refund(float $amount): bool
    {
        $transaction = [
            'id' => uniqid('refund_', true),
            'amount' => $amount,
            'currency' => $this->currency,
            'type' => 'refund',
            'original_transaction' => $this->transactionId,
            'status' => 'success',
            'timestamp' => now(),
        ];

        $this->transactions[] = $transaction;
        return true;
    }

    /**
     * Get all transactions
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * Check if card expiry date is valid
     */
    private function isExpiryDateValid(): bool
    {
        // Simple validation - format should be MM/YY
        return preg_match('/^\d{2}\/\d{2}$/', $this->expiryDate);
    }

    /**
     * Mask card number for security
     */
    private function maskCardNumber(string $cardNumber): string
    {
        $cleaned = str_replace(' ', '', $cardNumber);
        return 'XXXX-XXXX-XXXX-' . substr($cleaned, -4);
    }

    /**
     * Get card holder name
     */
    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }
}
