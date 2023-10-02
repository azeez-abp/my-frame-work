<?php

interface PaymentStrategy {
    public function pay(float $amount): void;
}

class CreditCardPayment implements PaymentStrategy {
    private string $name;
    private string $cardNumber;
    private string $expiryDate;
    private string $cvv;

    public function __construct(string $name, string $cardNumber, string $expiryDate, string $cvv) {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    public function pay(float $amount): void {
        echo "Paying $amount with credit card.\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    private string $email;
    private string $password;

    public function __construct(string $email, string $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function pay(float $amount): void {
        echo "Paying $amount with PayPal.\n";
    }
}

class ShoppingCart {
    private array $items = [];

    public function addItem(string $item): void {
        $this->items[] = $item;
    }

    public function calculateTotal(): float {
        return count($this->items) * 10; // Assume each item costs 10
    }

    public function checkout(PaymentStrategy $paymentStrategy): void {
        $total = $this->calculateTotal();
        $paymentStrategy->pay($total);
    }
}

// Example usage:
$cart = new ShoppingCart();
$cart->addItem("Shirt");
$cart->addItem("Pants");
$cart->addItem("Shoes");

// Pay with credit card
$creditCardPayment = new CreditCardPayment("John Doe", "1234 5678 9012 3456", "12/22", "123");
$cart->checkout($creditCardPayment);

// Pay with PayPal
$payPalPayment = new PayPalPayment("john.doe@example.com", "mypassword");
$cart->checkout($payPalPayment);

/*In this implementation, we have the PaymentStrategy interface that defines the pay() method. We have two concrete classes, CreditCardPayment and PayPalPayment, that implement the PaymentStrategy interface.

We also have the ShoppingCart class that has a checkout() method that takes a PaymentStrategy object as a parameter. When the checkout() method is called, it calculates the total amount of the items in the shopping cart and calls the pay() method on the PaymentStrategy object that was passed in.

This implementation allows us to easily switch between different payment methods without having to change the code in the ShoppingCart class. We can simply create a new payment method by implementing the PaymentStrategy interface and pass that object into the checkout() method.*/