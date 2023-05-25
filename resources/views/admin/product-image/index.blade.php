@extends('admin.layouts.admin')
@section('content')

    {{
    $routeName='admin.product-image'
    }}
    <a class="btn btn-primary my-3" href="{{route($routeName.'.create',$productId)}}">Add</a>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Image</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody id="sortable">
                @foreach($models  as $model)
                    <tr id="order-{{$model->id}}">
                        <td>{{$model->id}}</td>
                        <td> <img src="{{asset('storage/'.$model->image)}}" width="100px"></td>
                        <td>
                            <a href="{{route($routeName.'.edit',$model->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ route($routeName.'.destroy',$model->id) }}" method="POST">
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
            {{$models->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
        } );

        $( "#sortable" ).on('sortstop',function (event,ui){
            $.ajax({
                method: "POST",
                url : "{{ route("admin.product-image-sort") }}" ,
                data: {
                    sortList:$( "#sortable").sortable('serialize'),
                    _token: $('meta[name=csrf]').attr('content')
                }
            });
            // $( "#sortable" ).sortable('serialize')
        });
    </script>
@endsection
