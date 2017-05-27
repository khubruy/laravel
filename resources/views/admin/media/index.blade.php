@extends('layouts.admin')



@section('content')

        <h1>Media</h1>

        @if($photos)
        <table class="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Created at</td>
                </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'No date' }}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminPhotosController@destroy', $photo->id ]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger'] ) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @endif

    @endsection