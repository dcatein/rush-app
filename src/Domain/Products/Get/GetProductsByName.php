<?php

namespace Src\Domain\Products\Get;

use Src\Application\Repositories\ProductsRepository;

class GetProductsByName
{
    /**
     * @var ProductsRepository
     */
    private ProductsRepository $repository;
    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name)
    {
        //TODO: Refatorar para retornar Collection
        return $this->repository->findByName($name);
    }
}
