<?php
declare(strict_types=1);

spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    // 名前空間のバックスラッシュ（\）をディレクトリ区切り（/）に変換します
    $base_dir = __DIR__ . '/src/';
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$cheesBurger = new \FoodItems\CheeseBurger();
$fettuccine = new \FoodItems\Fettuccine();
$hawaiianPizza = new \FoodItems\HawaiianPizza();
$spaghetti = new \FoodItems\Spaghetti();

$Inavah = new \Persons\Employees\Chef("Inayah Lozano", 40, "Osaka", 1, 30);
$Nadia = new \Persons\Employees\Cashier("Nadia Valentine", 21, "Tokyo", 1, 20);

$saizeriya = new \Restaurants\Restaurant(
    [
        $cheeseBurger,
        $fettuccine,
        $hawaiianPizza,
        $spaghetti
    ],
    [
        $Inavah,
        $Nadia
    ]
);

$Tom = new \Persons\Customers\Customer("Tom", 20, "Saitama");

$categories = ["CheeseBurger", "Spaghetti"];
$invoice = $Tom->order($saizeriya, $categories);

$invoice->printInvoice();