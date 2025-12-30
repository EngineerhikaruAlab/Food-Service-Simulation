<?php
declare(strict_types=1);

namespace Persons\Customers;

use Restaurants\Restaurant;
use Invoices\Invoice;
use Persons\Person;
class Customer extends Person {
    private array $interestedTastesMap;

    public function __construct(string $name, int $age, string $address, array $interestedTastesMap)
    {
        parent::__construct($name, $age, $address);
        $this->interestedTastesMap = $interestedTastesMap;
    }

    public function interestedCategories(Restaurant $restaurant): array {
        return array_keys($this->interestedTastesMap);
    }

    public function order(Restaurant $restaurant, array $categories): Invoice {
        return $restaurant->order($categories);
    }
}