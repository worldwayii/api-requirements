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
}
