<?php

namespace Src\Application\Repositories;

use Src\Domain\Products\Product;

interface ProductsRepository
{
    public function save(Product $product): void;

    public function findByName(string $name);
}
