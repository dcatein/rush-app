<?php

namespace App\Http\Controllers\Products;

use App\Domain\Products\Get\GetProductsByName;
use App\Domain\Products\Get\GetProductTransformer;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GetProductsController extends Controller
{
    /**
     * @var GetProductsByName
     */
    private GetProductsByName $getProducts;

    /**
     * @param GetProductsByName $getProducts
     */
    public function __construct(GetProductsByName $getProducts)
    {
        $this->getProducts = $getProducts;
    }

    /**
     * Handle the incoming request.
     *
     * @param GetProductRequest $request
     * @return JsonResponse
     */
    public function __invoke(GetProductRequest $request): JsonResponse
    {
        $response = ($this->getProducts)($request->get('name'));
        return GetProductTransformer::transform($response);
    }
}
