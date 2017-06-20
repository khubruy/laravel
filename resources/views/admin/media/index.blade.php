@extends('layouts.admin')



@section('content')

        <h1>Media</h1>

        @if($photos)

            {!! Form::open(['method'=>'post','action'=>'AdminPhotosController@deleteMedia','files'=>'true']) !!}


            {!! Form::select('checkBoxArray', ['delete' => 'Delete']) !!}

            <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger'] ) !!}
            </div>







        <table class="table">
            <thead>
                <tr>
                    <th>{!! Form::checkbox('', '',false,['id' => 'options']) !!}</th>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Created at</td>
                </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{!! Form::checkbox('checkBoxArray[]', $photo->id,false,['class' => 'checkboxes']) !!}</td>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'No date' }}</td>
                    <td>
                        {!! Form::hidden('single_delete_id', $photo->id) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete Post',['class'=>'btn btn-danger', 'name'=>'single_delete'] ) !!}
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


            {!! Form::close() !!}
    @endif


    @endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){
                $('#options').click(function(){
                        if(this.checked){
                            $('.checkboxes').each(function(){
                                    this.checked=true;
                            });
                        }else{
                            $('.checkboxes').each(function(){
                                this.checked=false;
                            });
                        }
                });
        });
    </script>

    @endsection
