<?php

namespace App\Classes;

/**
 * DigitalWalletPayment - Another concrete implementation of Payment
 * Demonstrates inheritance with different implementation
 */
class DigitalWalletPayment extends Payment
{
    private string $walletId;
    private float $balance;
    private string $provider; // e.g., 'PayPal', 'Apple Pay', 'Google Pay'
    private array $transactions = [];

    public function __construct(string $walletId, string $provider, float $balance = 0)
    {
        parent::__construct();
        $this->walletId = $walletId;
        $this->provider = $provider;
        $this->balance = $balance;
    }

    /**
     * Validate payment details
     */
    public function validatePaymentDetails(): bool
    {
        return !empty($this->walletId) && 
               !empty($this->provider) && 
               $this->balance > 0;
    }

    /**
     * Process payment from wallet
     */
    public function pay(float $amount): bool
    {
        $this->amount = $amount;

        if (!$this->validatePaymentDetails()) {
            return false;
        }

        if ($this->balance < $amount) {
            return false; // Insufficient balance
        }

        // Deduct from balance and record transaction
        $this->balance -= $amount;

        $transaction = [
            'id' => $this->transactionId,
            'amount' => $amount,
            'currency' => $this->currency,
            'provider' => $this->provider,
            'wallet_id' => $this->walletId,
            'remaining_balance' => $this->balance,
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
        // Add back to balance
        $this->balance += $amount;

        $transaction = [
            'id' => uniqid('refund_', true),
            'amount' => $amount,
            'currency' => $this->currency,
            'type' => 'refund',
            'original_transaction' => $this->transactionId,
            'remaining_balance' => $this->balance,
            'status' => 'success',
            'timestamp' => now(),
        ];

        $this->transactions[] = $transaction;
        return true;
    }

    /**
     * Get current wallet balance
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * Add funds to wallet
     */
    public function addFunds(float $amount): self
    {
        $this->balance += $amount;
        return $this;
    }

    /**
     * Get all transactions
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * Get provider name
     */
    public function getProvider(): string
    {
        return $this->provider;
    }
}
