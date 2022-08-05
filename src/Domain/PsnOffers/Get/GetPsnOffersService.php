<?php

namespace Src\Domain\PsnOffers\Get;

use Src\Application\Repositories\PsnRepository;

class GetPsnOffersService
{
    /**
     * @var PsnRepository
     */
    private PsnRepository $repository;

    /**
     * @param PsnRepository $repository
     */
    public function __construct(PsnRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $response = $this->repository->getOffers();
        return $response['data']['categoryGridRetrieve']['products'];
    }
}
