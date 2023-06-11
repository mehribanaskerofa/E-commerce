<?php

namespace App\View\Components;

use App\Services\RepositoryService\CategoryService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected CategoryService $categoryService,protected $category=[])
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories=$this->categoryService->CachedCategories();
        $category=$this->category;
        return view('components.front.category',compact('categories','category'));
    }
}
