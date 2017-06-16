@extends('layouts.admin')


@section('content')
    <h1>Specific Replies for Comments</h1>



    @if($replies)
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Reply Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->slug)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id],'files'=>'true']) !!}

                            <input type="hidden" value="0" name="is_active">
                            <div class="form-group">
                                {!! Form::submit('UnApprove', ['class'=>'btn btn-primary'] ) !!}
                            </div>
                            {!! Form::close() !!}
                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@destroy', $reply->id ]]) !!}
                            <input type="hidden" value="1" name="is_active">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-primary'] ) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy', $reply->id ]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Reply', ['class'=>'btn btn-danger'] ) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection