@extends('admin.layouts.admin')


@section('content')
    {{
    $routeName='admin.translation'
}}
<div class="card">
    <div class="card-body">
        <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($model)
            @method('PUT')
            @endisset



{{--            @foreach(config('app.languages') as $lang)--}}

{{--                <div class="form-group">--}}
{{--                    <label>Value {{$lang}}</label>--}}
{{--                    <input type="text" placeholder="Value" name="value[{{$lang}}]" value="{{old('value.'.$lang,isset($model) ? ($model->getTranslation('value',$lang) ?? '') : '')}}" class="form-control">--}}
{{--                    @error('value')--}}
{{--                    <span class="text-danger">{{$message}}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--            @endforeach--}}



                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title">Languages</h3></li>
                            @foreach(config('app.languages') as $langKey)
                            <li class="nav-item ">
{{--                                {{data_get($errors->all(),"value.$langKey") ? 'text-danger' : ''}}"--}}
                                <a class="nav-link {{$loop->first ? ' active ' : '' }}
                                          @error("value.$langKey") text-danger @enderror"
                                   id="custom-tabs-two-home-tab" data-toggle="pill" href="#key-{{$langKey}}"
                                   role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">
                                    {{\Illuminate\Support\Str::upper($langKey)}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                            <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="key-{{$lang}}"
                                 role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group">
                                    <label>Value {{$lang}}</label>
                                    <input type="text" placeholder="Value" name="value[{{$lang}}]" value="{{old('value.'.$lang,isset($model) ? ($model->getTranslation('value',$lang) ?? '') : '')}}" class="form-control">
                                    @error('value.'.$lang)
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            <div class="form-group">
                <label>Key</label>
                <input type="text" placeholder="Key" name="key" value="{{old('key',$model->key ?? '')}}" class="form-control">
                @error('key')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


{{--            <div class="form-group">--}}
{{--                <label>Category</label>--}}
{{--                <select name="category_id" class="form-control">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}" @isset($product) @if($product->$category_id==$category->id){ selected="selected"} @endisset >{{$category->title}}</option>--}}
{{--                        <option value="{{$category->id}}" @isset($product) @selected(old($category->id,$product->category_id)==$category->id) @endisset >{{$category->title}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('category_id')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            @isset($product->image)--}}
{{--            <div class="form-group">--}}
{{--                <img src="{{asset('storage/images/'.$product->image)}}" width="100px">--}}
{{--            </div>--}}
{{--            @endisset--}}
{{--            <div class="form-group">--}}
{{--                <label>Image</label>--}}
{{--                <input type="file"  name="image" class="form-control">--}}
{{--                @error('image')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}


            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection



