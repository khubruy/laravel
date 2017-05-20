@extends('layouts.admin')



@section('content')

    <h1>Edit Posts</h1>


        <img src="{{$post->photo->file}}" height="100">

    {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id],'files'=>'true']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id',  $categories ,null, ['class'=>'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id' ,null, ['class'=>'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>4] ) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary'] ) !!}
    </div>

    @include('includes.validation')
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id ]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger'] ) !!}
    </div>

    {!! Form::close() !!}



@endsection