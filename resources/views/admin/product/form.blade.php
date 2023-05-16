@extends('admin.layouts.admin')


@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($product) ? route('product.update',$product) :  route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($product)
            @method('PUT')
            @endisset
            <div class="form-group">
                <label>Title</label>
                <input type="text" placeholder="Title" name="title" value="{{old('title',$product->title ?? '')}}" class="form-control">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" placeholder="description" name="text" value="{{old('text',$product->text ?? '')}}" class="form-control">
                @error('text')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" placeholder="price" name="price" value="{{old('price',$product->price ?? '')}}" class="form-control">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
{{--                        <option value="{{$category->id}}" @isset($product) @if($product->$category_id==$category->id){ selected="selected"} @endisset >{{$category->title}}</option>--}}
                        <option value="{{$category->id}}" @isset($product) @selected(old($category->id,$product->category_id)==$category->id) @endisset >{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            @isset($product->image)
            <div class="form-group">
                <img src="{{asset('storage/images/'.$product->image)}}" width="100px">
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



