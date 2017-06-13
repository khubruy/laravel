@extends('layouts.admin')


@section('content')
    <h1>Specific Comments for Posts</h1>



    @if($comments)
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Post Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
                    <td>
                        @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id],'files'=>'true']) !!}

                            <input type="hidden" value="0" name="is_active">
                            <div class="form-group">
                                {!! Form::submit('UnApprove', ['class'=>'btn btn-primary'] ) !!}
                            </div>
                            {!! Form::close() !!}
                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@destroy', $comment->id ]]) !!}
                            <input type="hidden" value="1" name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-primary'] ) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id ]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Comment', ['class'=>'btn btn-danger'] ) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection