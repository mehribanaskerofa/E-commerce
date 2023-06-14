<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Services\RepositoryService\BannerService;


class BannerController extends Controller
{

    public function __construct(protected BannerService $bannerService)
    {

    }

    public function index()
    {
        $models=$this->bannerService->dataAll();
        return view('admin.banner.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.banner.form');
    }
    public function store(BannerRequest $request)
    {

        $this->bannerService->store($request);
        return redirect()->route('admin.banner.index');
    }
    public function edit(Banner $banner)
    {
        return view('admin.banner.form',['model'=>$banner]);
    }
    public function update(BannerRequest $bannerRequest,Banner $banner)
    {
        $this->bannerService->update($bannerRequest,$banner);
        return redirect()->back();
    }
    public function destroy(Banner $banner)
    {
        $this->bannerService->delete($banner);
        return redirect()->back();
    }
}
