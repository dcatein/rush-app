<?php

namespace App\Application\Repositories;

use App\Domain\Products\Product;

interface ProductsRepository
{
    public function save(Product $product): void;

    public function findByName(string $name);
}
