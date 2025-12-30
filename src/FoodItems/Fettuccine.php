<?php
declare(strict_types=1);

namespace FoodItems;

class Fettuccine extends FoodItem {
    public const CATEGORY = 'Pasta';

    public function __construct() {
        parent::__construct(
            'Fettuccine',
            'This is pasta',
            9.5
        );
    }

    public static function getCategory(): string
    {
        return self::CATEGORY;
    }
}