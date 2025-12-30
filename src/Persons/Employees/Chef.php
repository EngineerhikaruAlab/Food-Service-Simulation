<?php
declare(strict_types=1);

namespace Persons\Employees;

use FoodOrders\FoodOrder;

class Chef extends Employee {
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
    {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    /**
     * 注文票(FoodOrder)を受け取り、料理を準備します。
     * シミュレーションとして、各料理を調理している様子を文字列で返します。
     */
    public function prepareFood(FoodOrder $foodOrder): string {
        $log = "";
        
        // 注文票に含まれる料理を一つずつループで処理
        foreach ($foodOrder->getItems() as $item) {
            // 要件の例: "the chef William cooked a Pizza" に合わせる
            $log .= "The chef {$this->name} cooked a {$item->getName()}.\n";
        }

        $log .= "Chef {$this->name} has finished preparing the order at " . $foodOrder->getOrderTime() . ".";
        
        return $log;
    }
}