<?php

declare(strict_types=1);

namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person
{
    /**
     * @var array 興味のある料理と優先度のマップ
     */
    private array $interestedTastesMap;

    /**
     * コンストラクタ
     * main.php の引数構成（名前, 年齢, 住所, 興味マップ）に合わせています。
     */
    public function __construct(
        string $name,
        int $age,
        string $address,
        array $interestedTastesMap
    ) {
        // 親クラス（Person）のコンストラクタを呼び出して基本情報を設定
        parent::__construct($name, $age, $address);
        
        // Customer 独自のプロパティを保存
        $this->interestedTastesMap = $interestedTastesMap;
    }

    /**
     * レストランのメニューと自分の興味を照らし合わせ、一致するカテゴリを返します。
     * * @param Restaurant $restaurant
     * @return string[]
     */
    public function interestedCategories(Restaurant $restaurant): array
    {
        $menu = $restaurant->getMenu();
        $matchingCategories = [];

        foreach ($menu as $item) {
            $category = $item::getCategory();
            
            // 自分の興味マップにそのカテゴリが存在するかチェック
            if (array_key_exists($category, $this->interestedTastesMap)) {
                if (!in_array($category, $matchingCategories)) {
                    $matchingCategories[] = $category;
                }
            }
        }

        return $matchingCategories;
    }

    /**
     * main.php での呼び出し ($Tom->order($saizeriya)) に合わせたメソッド
     * * @param Restaurant $restaurant
     * @return Invoice
     */
    public function order(Restaurant $restaurant): Invoice
    {
        // 1. 自身が保持している興味マップの「キー（カテゴリ名）」を配列として抽出
        // array_keys(["Spaghetti" => 1]) -> ["Spaghetti"] となります
        $categories = array_keys($this->interestedTastesMap);

        // 2. 抽出したカテゴリをレストランの order メソッドに渡す
        // ここで Restaurant -> Cashier -> Chef というバケツリレーが始まります
        return $restaurant->order($categories);
    }
}