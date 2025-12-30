<?php
declare(strict_types=1);

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use Invoices\Invoice;
use Restaurants\Restaurant;
use FoodItems\FoodItem;

class Cashier extends Employee {
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
    {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    /**
     * カテゴリのリストから、一致するメニューアイテムを選んで注文票(FoodOrder)を作成します。
     * 戻り値を Invoice から FoodOrder に修正しました。
     */
    public function generateOrder(array $categories, Restaurant $restaurant): FoodOrder {
        $selectedItems = [];
        $menu = $restaurant->getMenu();

        // メニューの中から、客が指定したカテゴリに一致する料理を探す
        foreach ($menu as $item) {
            // $item::getCategory() は静的メソッドを呼び出しています
            if (in_array($item::getCategory(), $categories)) {
                $selectedItems[] = $item;
            }
        }

        // シミュレーション用の出力
        echo "The cashier {$this->name} created a food order.\n";

        // 新しい FoodOrder インスタンスを作成して返す
        return new FoodOrder($selectedItems, date("D M d, Y G:i"));
    }

    /**
     * 注文票(FoodOrder)から、最終的な請求書(Invoice)を作成します。
     */
    public function generateInvoice(FoodOrder $order): Invoice {
        $totalPrice = 0.0;

        // 注文された全アイテムの価格を合計する
        foreach ($order->getItems() as $item) {
            $totalPrice += $item->getPrice();
        }

        // 予想時間（例：1品につき5分と仮定）
        $estimatedTime = count($order->getItems()) * 5;

        // シミュレーション用の出力
        echo "The cashier {$this->name} generated an invoice.\n";

        // 新しい Invoice インスタンスを生成して返す
        return new Invoice($totalPrice, $order->getOrderTime(), $estimatedTime);
    }
}