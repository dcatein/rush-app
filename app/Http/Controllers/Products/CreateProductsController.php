<?php

namespace App\Http\Controllers\Products;

use Src\Domain\Products\Create\CreateProduct;
use Src\Domain\Products\Create\CreateProductTransformer;
use Src\Domain\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\JsonResponse;


class CreateProductsController extends Controller
{
    /**
     * @var CreateProduct
     */
    private CreateProduct $createProduct;

    /**
     * @param CreateProduct $createProduct
     */
    public function __construct(CreateProduct $createProduct)
    {
        $this->createProduct = $createProduct;
    }

    /**
     * Handle the incoming request.
     *
     * @param CreateProductRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateProductRequest $request): JsonResponse
    {
        $product = new Product($request->get('name'),
            $request->get('value')
        );
        $this->createProduct->handle($product);

        //TODO: Event Dispatcher
        return CreateProductTransformer::transform($product);
    }
}
