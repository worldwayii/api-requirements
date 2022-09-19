<?php

namespace App\Domain\Product\Controllers;

use App\Domain\Product\Model\Product;
use App\Domain\Product\Resource\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category = null)
    {

        if($category == 'insurance'){
            return $this->successResponse(
                ProductResource::collection(Product::where('category', $category)->get())
            );
        }

        return $this->successResponse(
            ProductResource::collection(Product::all())
        );
    }
    public function show(Product $product)
    {
        if($product->category == 'insurance' || $product->sku == "000003"){
            $result = Product::getDiscount($product);

            return $this->successResponse(
                new ProductResource($result->push($product))
            );
        }

        return $this->successResponse(
            new ProductResource($product)
        );
    }
}
