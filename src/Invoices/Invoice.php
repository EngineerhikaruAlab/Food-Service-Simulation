<?php
declare(strict_types=1);

namespace Invoices;

#use FoodOrders\FoodOrder;

class Invoice {
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, string $orderTime, int $estimatedTimeInMinutes) {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    public function printInvoice(): void {
        echo "---------------------------------\n";
        echo "INVOICE\n";
        echo "Date: {$this->orderTime}\n";
        echo "Estimated Time: {$this->estimatedTimeInMinutes} min\n";
        echo "Total: $" . number_format($this->finalPrice, 2) . "\n";
        echo "---------------------------------\n";
    }
}