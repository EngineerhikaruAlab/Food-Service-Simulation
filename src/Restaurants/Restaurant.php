<?php

declare(strict_types=1); // 1. 厳格な型付けを有効化

namespace Restaurants;

use FoodItems\FoodItem;
use FoodOrders\FoodOrder;
use Persons\Employees\Employee;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;
use Invoices\Invoice;
use Exception;

class Restaurant {
    private array $menu;
    private array $employees;

    public function __construct(array $menu, array $employees) {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function getMenu(): array {
        return $this->menu;
    }

    public function order(array $categories): Invoice {
        $cashier = null;
        $chef = null;

        foreach ($this->employees as $emp) {
            if ($emp instanceof Cashier && $cashier === null) $cashier = $emp;
            if ($emp instanceof Chef && $chef === null) $chef = $emp;
        }

        if (!$cashier || !$chef) {
            throw new Exception("スタッフが不足しています。");
        }

        // Cashierに注文作成を依頼
        // (Cashier側で "the cashier Nadia created a food order" 等をechoする想定)
        $foodOrder = $cashier->generateOrder($categories, $this);

        // 2. Chefに調理を依頼し、その結果（文字列）を出力する
        // UML上、prepareFoodはStringを返すため、それをechoしてシミュレーションを見せる
        echo $chef->prepareFood($foodOrder) . "\n";

        // Cashierに請求書作成を依頼
        return $cashier->generateInvoice($foodOrder);
    }
}