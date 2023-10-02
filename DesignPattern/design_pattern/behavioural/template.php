<?php

abstract class Beverage {
    // This is the template method
    final public function prepareRecipe(): void {
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        if ($this->customerWantsCondiments()) {
            $this->addCondiments();
        }
    }

    public function boilWater(): void {
        echo "Boiling water...\n";
    }

    abstract public function brew(): void;

    public function pourInCup(): void {
        echo "Pouring into cup...\n";
    }

    // Hook method
    public function customerWantsCondiments(): bool {
        return true;
    }

    abstract public function addCondiments(): void;
}

class Coffee extends Beverage {
    public function brew(): void {
        echo "Brewing coffee...\n";
    }

    public function addCondiments(): void {
        echo "Adding milk and sugar...\n";
    }
}

class Tea extends Beverage {
    public function brew(): void {
        echo "Steeping tea...\n";
    }

    public function addCondiments(): void {
        echo "Adding lemon...\n";
    }
}

// Example usage:
$coffee = new Coffee();
$coffee->prepareRecipe();

echo "\n";

$tea = new Tea();
$tea->prepareRecipe();
