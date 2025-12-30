<?php
declare(strict_types=1);

namespace FoodItems;
class Spaghetti extends FoodItem {
    public const CATEGORY = 'Pasta';

    public function __construct() {
        parent::__construct(
            'Spaghetti',
            'This is delicious',
            7.5
        );
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}