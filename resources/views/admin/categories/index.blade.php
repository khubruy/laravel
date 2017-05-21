@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>'true']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary'] ) !!}
        </div>

        @include('includes.validation')
        {!! Form::close() !!}

    </div>



    <div class="col-sm-6">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('category.edit',$category->id)}}">{{$category->name}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection