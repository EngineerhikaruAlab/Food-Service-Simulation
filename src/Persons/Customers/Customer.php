<?php
declare(strict_types=1);

namespace Persons\Customers;

use Restaurants\Restaurant;
use Invoices\Invoice;
use Persons\Person;
class Customer extends Person {

    public function __construct(string $name, int $age, string $address)
    {
        parent::__construct($name, $age, $address);
    }

    public function interestedCategories(Restaurant $restaurant): array {
        $menu = $restaurant->getMenu();
        $categories = [];
        foreach($menu as $item) {
            $cat = $item->getCategory();
            if (!in_array($cat, $categories)) {
                $categories[] = $cat;
            }
        }
        return $categories;
    }

    public function order(Restaurant $restaurant, array $categories): Invoice {
        return $restaurant->order($categories);
    }
}