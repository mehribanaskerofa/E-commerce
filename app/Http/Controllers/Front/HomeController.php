<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Services\RepositoryService\AttributeService;
use App\Services\RepositoryService\CategoryService;
use App\Services\RepositoryService\ProductService;

class HomeController extends Controller
{
    public function home(ProductService $productService,CategoryService $categoryService)
    {

        $products=$productService->dataAllWithPaginate();
        $categories=$categoryService->dataAllWithPaginate()->skip(1)->take(4);
        return view('front.home',compact('products','categories'));
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
        $product=Product::with(['translations',
            'reviews',
            'category.translations',
            'images',
            'attributeValues.translations',
            'attributeValues.attribute.translations'])
            ->whereTranslation('slug',$slug,app()->getLocale())->first();//get
        $attributes=$product->attribute_Values?->group('attribute.title');
        $avg_rating=round($product->reviews->pluck('rating')->avg(),0);

        return view('front.product-detail',compact('product','attributes','avg_rating'));
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

    public function getProductsByCategory($slug)
    {
        if($slug!='All') {
            $products = Product::whereHas('category', function ($query) use ($slug) {
                $query->whereTranslation('slug', $slug, app()->getLocale());
            })->paginate(8);
        }
        else{
            $products=Product::paginate(8);
        }
//        dd($products);
        return view('components.products',compact('products'))->render();
    }
}
