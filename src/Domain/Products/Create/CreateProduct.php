<?php

namespace Src\Domain\Products\Create;

use Src\Domain\Products\Product;
use Src\Application\Repositories\ProductsRepository;

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
