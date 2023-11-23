<?php

namespace App\View\Components;

use App\Services\BasketService;
use App\Services\RepositoryService\BannerService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component
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
        $banners=$this->bannerService->CachedBanners()->skip(1)->take(3);
        return view('components.banner',compact('banners'));
    }
}
