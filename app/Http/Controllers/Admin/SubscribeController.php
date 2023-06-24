<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;

class SubscribeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $models=Subscribe::paginate(6);
        return view('admin.subscribe.index',['models'=>$models]);
    }

    public function destroy($id)
    {
        Subscribe::where('id',$id)->delete();
        return redirect()->back();
    }


}
