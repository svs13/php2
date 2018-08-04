<?php

namespace App\Models;


trait HasPriceTrait
{
    public $price;

    public function getPrice()
    {
        return $this->price;
    }

}