<?php

namespace App\Domain\Products\Create;

use App\Domain\Products\Product;
use App\Application\Repositories\ProductsRepository;

class CreateProduct
{
    /**
     * @var ProductsRepository
     */
    private ProductsRepository $repository;
    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Product $product): void
    {
        $this->repository->save($product);
    }
}
