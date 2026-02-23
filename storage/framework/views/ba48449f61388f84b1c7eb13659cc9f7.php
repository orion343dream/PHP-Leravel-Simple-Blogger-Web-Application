

<?php $__env->startSection('title', 'Payment Processing Demo'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Payment Processing System Demo</h1>

        <!-- Overview -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">OOP Demonstration</h2>
            <p class="text-gray-700 mb-4">
                This demo showcases PHP Object-Oriented Programming concepts including interfaces, abstract classes, and inheritance.
                The payment system includes multiple payment methods implemented using proper design patterns.
            </p>
        </div>

        <!-- Classes Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Interface -->
            <div class="bg-blue-50 rounded-lg p-6 border-2 border-blue-200">
                <h3 class="text-xl font-bold text-blue-900 mb-3">PaymentInterface</h3>
                <p class="text-blue-800 mb-3 text-sm">
                    Contract defining the requirements for all payment processors
                </p>
                <div class="bg-white rounded p-3 text-xs font-mono border border-blue-200">
                    <p class="text-blue-900">+ pay(amount): bool</p>
                    <p class="text-blue-900">+ refund(amount): bool</p>
                    <p class="text-blue-900">+ getTransactionId(): string</p>
                </div>
            </div>

            <!-- Abstract Class -->
            <div class="bg-purple-50 rounded-lg p-6 border-2 border-purple-200">
                <h3 class="text-xl font-bold text-purple-900 mb-3">Payment (Abstract)</h3>
                <p class="text-purple-800 mb-3 text-sm">
                    Base class implementing the interface with common functionality
                </p>
                <div class="bg-white rounded p-3 text-xs font-mono border border-purple-200">
                    <p class="text-purple-900"># transactionId: string</p>
                    <p class="text-purple-900"># amount: float</p>
                    <p class="text-purple-900"># currency: string</p>
                    <p class="text-purple-900">+ validatePaymentDetails()</p>
                </div>
            </div>

            <!-- Credit Card Payment -->
            <div class="bg-green-50 rounded-lg p-6 border-2 border-green-200">
                <h3 class="text-xl font-bold text-green-900 mb-3">CreditCardPayment</h3>
                <p class="text-green-800 mb-3 text-sm">
                    Concrete implementation for credit/debit card payments
                </p>
                <div class="bg-white rounded p-3 text-xs font-mono border border-green-200">
                    <p class="text-green-900">- cardNumber: string</p>
                    <p class="text-green-900">- cardHolder: string</p>
                    <p class="text-green-900">- expiryDate: string</p>
                    <p class="text-green-900">- transactions: array</p>
                </div>
            </div>

            <!-- Digital Wallet Payment -->
            <div class="bg-orange-50 rounded-lg p-6 border-2 border-orange-200">
                <h3 class="text-xl font-bold text-orange-900 mb-3">DigitalWalletPayment</h3>
                <p class="text-orange-800 mb-3 text-sm">
                    Concrete implementation for digital wallet payments
                </p>
                <div class="bg-white rounded p-3 text-xs font-mono border border-orange-200">
                    <p class="text-orange-900">- walletId: string</p>
                    <p class="text-orange-900">- provider: string</p>
                    <p class="text-orange-900">- balance: float</p>
                    <p class="text-orange-900">- transactions: array</p>
                </div>
            </div>
        </div>

        <!-- Key OOP Concepts -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Key OOP Concepts Demonstrated</h2>
            
            <div class="space-y-6">
                <div class="border-l-4 border-blue-600 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">1. Interfaces</h3>
                    <p class="text-gray-700 mb-2">
                        <code class="bg-gray-100 px-2 py-1 rounded">PaymentInterface</code> defines a contract that all payment classes must follow.
                    </p>
                    <div class="bg-gray-50 p-3 rounded text-sm border border-gray-200">
                        <code class="text-gray-900">interface PaymentInterface {<br/>
&nbsp;&nbsp;public function pay(float $amount): bool;<br/>
&nbsp;&nbsp;public function refund(float $amount): bool;<br/>
}</code>
                    </div>
                </div>

                <div class="border-l-4 border-green-600 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">2. Abstract Classes</h3>
                    <p class="text-gray-700 mb-2">
                        <code class="bg-gray-100 px-2 py-1 rounded">Payment</code> is an abstract class that cannot be instantiated directly but provides common functionality.
                    </p>
                    <div class="bg-gray-50 p-3 rounded text-sm border border-gray-200">
                        <code class="text-gray-900">abstract class Payment implements PaymentInterface {<br/>
&nbsp;&nbsp;protected string $transactionId;<br/>
&nbsp;&nbsp;abstract public function validatePaymentDetails(): bool;<br/>
}</code>
                    </div>
                </div>

                <div class="border-l-4 border-purple-600 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">3. Inheritance</h3>
                    <p class="text-gray-700 mb-2">
                        <code class="bg-gray-100 px-2 py-1 rounded">CreditCardPayment</code> and <code class="bg-gray-100 px-2 py-1 rounded">DigitalWalletPayment</code> 
                        extend the abstract <code class="bg-gray-100 px-2 py-1 rounded">Payment</code> class.
                    </p>
                    <div class="bg-gray-50 p-3 rounded text-sm border border-gray-200">
                        <code class="text-gray-900">class CreditCardPayment extends Payment {<br/>
&nbsp;&nbsp;public function validatePaymentDetails(): bool { ... }<br/>
&nbsp;&nbsp;public function pay(float $amount): bool { ... }<br/>
}</code>
                    </div>
                </div>

                <div class="border-l-4 border-orange-600 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">4. Polymorphism</h3>
                    <p class="text-gray-700 mb-2">
                        Different payment classes implement the same interface with different behavior.
                        The same method call works differently based on the object type.
                    </p>
                    <div class="bg-gray-50 p-3 rounded text-sm border border-gray-200">
                        <code class="text-gray-900">$payment = new CreditCardPayment(...);<br/>
$payment->pay(100); // Processes credit card<br/>
<br/>
$wallet = new DigitalWalletPayment(...);<br/>
$wallet->pay(100); // Processes wallet</code>
                    </div>
                </div>

                <div class="border-l-4 border-red-600 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">5. Encapsulation</h3>
                    <p class="text-gray-700 mb-2">
                        Private and protected properties protect internal state. Methods control access to data.
                    </p>
                    <div class="bg-gray-50 p-3 rounded text-sm border border-gray-200">
                        <code class="text-gray-900">private function maskCardNumber(string $cardNumber)<br/>
private function isExpiryDateValid(): bool<br/>
public function getCardHolder(): string</code>
                    </div>
                </div>
            </div>
        </div>

        <!-- How to Use -->
        <div class="bg-green-50 rounded-lg p-8 border-l-4 border-green-600">
            <h2 class="text-2xl font-semibold text-green-900 mb-4">How to Use These Classes</h2>
            <div class="bg-white rounded p-4 font-mono text-sm overflow-x-auto">
                <pre><code class="text-gray-900">// Using Credit Card Payment
$creditCard = new CreditCardPayment(
    '1234-5678-9012-3456',
    'John Doe',
    '12/25',
    '123'
);

if ($creditCard->pay(150.00)) {
    echo "Payment successful!";
    echo "Transaction ID: " . $creditCard->getTransactionId();
}

// Using Digital Wallet Payment
$wallet = new DigitalWalletPayment('user_12345', 'PayPal', 500.00);
$wallet->pay(75.00);
echo "Remaining balance: " . $wallet->getBalance();

// Process refund
$creditCard->refund(50.00);</code></pre>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sadar\OneDrive\Desktop\Redcode\laravel-11-internship\resources\views/payment-demo.blade.php ENDPATH**/ ?>