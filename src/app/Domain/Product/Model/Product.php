<?php

namespace App\Domain\Product\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use stdClass;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'category',
    ];

    public static function getDiscount($id)
    {
        $product = Self::find($id);
        $result = 0;

        if($product->category =='insurance'){
            $result = self::getThirtyPercent($product->price);
        }
        if($product->sku == '000003'){
            $result = self::getFifteenPercent($product->price);
        }

        return $result;
    }

    public static function getPercentage($id): string
    {
        $product = Self::find($id);
        $percentage = '';

        if($product->category =='insurance'){
            $percentage = '30%';
        }
        if($product->sku == '000003'){
            $percentage = '15%';
        }

        return $percentage;
    }

    public static function getThirtyPercent($price): float|int
    {
        return  (30 / 100) * $price;
    }

    public static function getFifteenPercent($price): float|int
    {
        return (15 / 100) * $price;
    }
}
