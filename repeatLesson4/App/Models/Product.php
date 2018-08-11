<?php

namespace App\Models;

use App\Model;


class Product extends Model implements HasPrice, HasWeight
{
    protected static $table = 'products';

    public $name;
    public $weight;

    use HasPriceTrait;

    public function getModelName()
    {
        return 'Товар';
    }


    public function getWeight()
    {
        return $this->weight;
    }


}