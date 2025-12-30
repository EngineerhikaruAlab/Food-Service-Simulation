<?php
declare(strict_types=1);

namespace FoodOrders;

use FoodItems\FoodItem;

class FoodOrder {
    protected array $items;
    protected string $orderTime;
    public function __construct(array $items, string $orderTime) {
        $this->items = $items;
        $this->orderTime = $orderTime;
    }
    
    // カプセル化
    public function getItems(): array {
        return $this->items;
    }

    public function getOrderTime(): string {
        return $this->orderTime;
    }

}
