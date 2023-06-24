@extends('admin.layouts.admin')
@section('content')

    {{
    $routeName='admin.contact'
    }}
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Sended at</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models  as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->fullname}}</td>
                        <td>{{$model->email}}</td>
                        <td>{{$model->subject}}</td>
                        <td>{{$model->message}}</td>
                        <td>{{$model->created_at->diffForHumans()}}</td>
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
