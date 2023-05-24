@extends('admin.layouts.admin')


@section('content')
    {{ $routeName='admin.product-image'
}}
    <?php  $rName='admin.product' ?>
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

<input name="product_id" value="{{$productId}}" type="hidden">

                @isset($model->image)
                    <div class="form-group">
                        <img src="{{asset('storage/'.$model->image)}}" width="100px">
                    </div>
                @endisset
                <div class="form-group">
                    <label>Image</label>
                    <input type="file"  name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection

