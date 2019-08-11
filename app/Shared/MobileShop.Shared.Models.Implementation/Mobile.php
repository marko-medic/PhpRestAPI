<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 3:45 PM
 */

namespace MobileShop\Shared\Models\Implementation;


use MobileShop\Shared\Models\Interfaces\IMobile;

class Mobile implements IMobile
{
    public $name;
    public $price;
    public $id;
    public $created;

    public function __construct(string $name, float $price, $id = null, $created = null)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("Name cannot be empty");
        }
        if ($price <= 0) {
            throw new \InvalidArgumentException("Price cannot be less than 0");
        }
        $this->name = $name;
        $this->price = $price;
        $this->id = $id;
        $this->created = $created;
    }
}