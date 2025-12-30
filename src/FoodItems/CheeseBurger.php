<?php
declare(strict_types=1);

namespace FoodItems;

class CheeseBurger extends FoodItem {
    
    public const CATEGORY = 'Burger';

    public function __construct() {
        parent::__construct(
        'CheeseBurger', 
        "A delicious beef burger with melted cheddar cheese.",
        10.5
        );
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}