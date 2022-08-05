<?php

namespace Src\Domain\PsnOffers\Get;

class GetPsnOffersHandler
{
    /**
     * @var GetPsnOffersService
     */
    private GetPsnOffersService $service;

    /**
     * @param GetPsnOffersService $service
     */
    public function __construct(GetPsnOffersService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function handle(): mixed
    {
        return ($this->service)();
    }
}
