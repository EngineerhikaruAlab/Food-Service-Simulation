<?php
declare(strict_types=1);

namespace FoodItems;

class HawaiianPizza extends FoodItem  {
    public const CATEGORY = 'Pizza';

    public function __construct() {
        parent::__construct(
            'HawaiianPizza',
            'This is spicy',
            12.5
        );
    }
    public static function getCategory(): string {
        return self::CATEGORY;
    }
}  