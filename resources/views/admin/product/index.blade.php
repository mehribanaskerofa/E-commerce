@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('product.create')}}">Add</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Created date</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->text}}</td>
                        <td>{{$data->price}}</td>
{{--                        <td>{{$data->category_title}}</td>--}}
                        <td>{{$data->category->title}}</td>
                        <td>{{$data->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('product.edit',$data)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ route('product.destroy',$data) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            {{$products->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
