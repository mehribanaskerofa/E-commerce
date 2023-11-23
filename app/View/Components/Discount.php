<?php

namespace App\View\Components;

use App\Services\RepositoryService\BannerService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Discount extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected BannerService $bannerService)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $discount=$this->bannerService->CachedBanners()->first();
        return view('components.discount',compact('discount'));
    }
}
