<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Domain\PsnOffers\Get\GetPsnOffersHandler;

class GetPsnOffersController extends Controller
{
    /**
     * @var GetPsnOffersHandler
     */
    private GetPsnOffersHandler $handler;

    /**
     * @param GetPsnOffersHandler $handler
     */
    public function __construct(GetPsnOffersHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request): mixed
    {
        return $this->handler->handle();
    }
}
