@extends('layouts.blog-post')


@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
   <p>{{$post->body}}</p>

    <hr>
    @if(\Illuminate\Support\Facades\Session::has('comment_added'))

        <p>{{session('comment_added')}}</p>
    @endif
    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store','files'=>'true']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}" />

        <div class="form-group">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>4] ) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Comment', ['class'=>'btn btn-primary'] ) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif
    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)

    <div class="media">
        <a class="pull-left" href="#">
            <img height="50" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at}}</small>
            </h4>
            {{$comment->body}}


            @if(count($comment->replies) > 0)
                @foreach($comment->replies as $reply)
        <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at}}small>
                    </h4>
                    {{$reply->body}}
                </div>

                {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply','files'=>'true']) !!}

                <input type="hidden" name="comment_id" value="{{$comment->id}}" />

                <div class="form-group">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit reply', ['class'=>'btn btn-primary'] ) !!}
                </div>
                {!! Form::close() !!}

            </div>
                @endforeach
        @endif
            <!-- End Nested Comment -->
        </div>
    </div>
        @endforeach
    @endif
    @endsection