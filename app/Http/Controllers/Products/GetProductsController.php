<?php

namespace App\Http\Controllers\Products;

use Src\Domain\Products\Get\GetProductsByName;
use Src\Domain\Products\Get\GetProductTransformer;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductRequest;
use Illuminate\Http\JsonResponse;

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
