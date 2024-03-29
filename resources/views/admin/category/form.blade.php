@extends('admin.layouts.admin')


@section('content')
    {{
    $routeName='admin.category'
}}
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title">Title</h3></li>
                            @foreach(config('app.languages') as $langKey)
                                <li class="nav-item ">
                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}
                                          @error("$langKey.title") text-danger @enderror"
                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#title-{{$langKey}}"
                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">
                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="form-group">
                                        <label>Title {{$lang}}</label>
                                        <input type="text" placeholder="title {{$lang}}" name="{{$lang}}[title]"
                                               value="{{old("$lang.title",isset($model) ? ($model->translateOrDefault($lang)->title ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slug {{$lang}}</label>
                                        <input type="text" placeholder="Slug {{$lang}}" name="{{$lang}}[slug]"
                                               value="{{old("$lang.slug",isset($model) ? ($model->translateOrDefault($lang)->slug ?? '') : '')}}"
                                               class="form-control">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

{{--                <div class="card card-primary card-tabs">--}}
{{--                    <div class="card-header p-0 pt-1">--}}
{{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
{{--                            <li class="pt-2 px-3"><h3 class="card-title">Slug</h3></li>--}}
{{--                            @foreach(config('app.languages') as $langKey)--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}--}}
{{--                                          @error("slug.$langKey") text-danger @enderror"--}}
{{--                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#slug-{{$langKey}}"--}}
{{--                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">--}}
{{--                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="tab-content" id="custom-tabs-one-tabContent">--}}
{{--                            @foreach(config('app.languages') as $lang)--}}
{{--                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}" id="slug-{{$lang}}"--}}
{{--                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Slug {{$lang}}</label>--}}
{{--                                        <input type="text" placeholder="Slug {{$lang}}" name="{{$lang}}[slug]"--}}
{{--                                               value="{{old("$lang.slug",isset($model) ? ($model->translateOrDefault($lang)->slug ?? '') : '')}}"--}}
{{--                                               class="form-control">--}}
{{--                                        @error("$lang.slug")--}}
{{--                                        <span class="text-danger">{{$message}}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group">
                    <label>Parent Category</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($categories->where('id','!=',isset($model) ? $model->id : null) as $category)
                            <option value="{{$category->id}}"
                            @selected(old('parent_id',(isset($model) ? $model->parent_id : null))==$category->id)
                            >{{$category->title}}</option>
                        @endforeach

                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Attributes</label>
                    <select id="select2" name="attributes[]" class="form-control">
                        @foreach($attributes as $attribute)
                            <option value="{{$attribute->id}}"
                             @isset($model)   @selected(in_array($attribute->id,(old('attributes[]',$model->attributes->pluck('id')->toArray())))) @endisset
                            >{{$attribute->title}}</option>
                        @endforeach

                    </select>
{{--                    @error('$attributes')--}}
{{--                    <span class="text-danger">{{$message}}</span>--}}
{{--                    @enderror--}}
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" name="active" value="1" @checked(old('active',$model->active ?? ''))>
                    @error('active')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                @isset($model->image)
                    <div class="form-group">
                        {{--                <img src="{{{url('/storage/images/'.$page->image)}}}" width="100px">--}}
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
@include('admin.includes.select2')


