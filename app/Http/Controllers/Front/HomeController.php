<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Services\RepositoryService\AttributeService;
use App\Services\RepositoryService\CategoryService;
use App\Services\RepositoryService\ProductService;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home');
    }
    public function shop(ProductService $productService, AttributeService $attributeService)
    {
        $products=$productService->dataAllWithPaginate();
//        $attributes=$attributeService->dataAllWithoutPaginate();
//dd($attributes->toArray());
        return view('front.shop',compact('products'));
    }

    public function getByCategory($slug, CategoryService $categoryService,ProductService $productService)
    {
        $category=$categoryService->findCategory($slug);
        if(!$category){
            abort(404);
        }

        $categoryIds=[$category->id];
        if($category->parent_id==null){
            $childIds=$categoryService->findChildIds($category->id);
            $categoryIds=[...$childIds,...$categoryIds];
        }
        $products=$productService->getProductsByCategoryId($categoryIds);
        $categories=$categoryService->CachedCategories();
        return view('front.shop',compact('categories','category','products'));
    }
    public function productDetail()
    {
        return view('front.product-detail');
    }

    public function getByProduct($slug)
    {
        dd($product=Product::with(['translations',
            'category.translations',
            'images',
            'attributeValues.translations',
            'attributeValues.attribute.translations'])->get()->toArray());
        $product=Product::with(['translations',
            'category.translations',
            'images',
            'attributeValues.translations',
            'attributeValues.attribute.translations'])
            ->whereTranslation('slug',$slug,app()->getLocale())->get();
        $attributes=$product->attributeValues->group('attribute.title');
        return view('front.product-detail',compact('product','attributes'));
    }
    public function shopCart()
    {
        return view('front.shop-cart');
    }
    public function checkout()
    {
        return view('front.checkout');
    }
    public function contact()
    {
        return view('front.contact');
    }
}
