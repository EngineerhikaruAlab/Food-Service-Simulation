<?php

declare(strict_types=1);

spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/src/';
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$cheeseBurger = new \FoodItems\CheeseBurger();
$fettuccine = new \FoodItems\Fettuccine();
$hawaiianPizza = new \FoodItems\HawaiianPizza();
$spaghetti = new \FoodItems\Spaghetti();

// 3. スタッフ
$Inavah = new \Persons\Employees\Chef("Inayah Lozano", 40, "Osaka", 1, 30);
$Nadia = new \Persons\Employees\Cashier("Nadia Valentine", 21, "Tokyo", 1, 20);

// 4. レストラン
$saizeriya = new \Restaurants\Restaurant(
    [
        $cheeseBurger, // 15行目と名前を合わせました
        $fettuccine,
        $hawaiianPizza,
        $spaghetti
    ],
    [
        $Inavah,
        $Nadia
    ]
);

// 5. お客さん
$Tom = new \Persons\Customers\Customer("Tom", 20, "Saitama");

// 6. 注文
$categories = ["CheeseBurger", "Spaghetti"];
$invoice = $Tom->order($saizeriya, $categories);

// 7. 表示
$invoice->printInvoice();