<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminPhotosController extends Controller
{
    public function index(){

        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));

    }

    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request){
        $file = $request->file('file');

        $name = time(). $file->getClientOriginalName();

        $file->move('images',$name);

        Photo::create(['file'=>$name]);
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

        unlink($photo->public_path . $photo->file);

        $photo->delete();

        return redirect()->route('media.index');

    }

    public function deleteMedia(Request $request){


        if(isset($request->single_delete)){
           return $this->destroy($request->single_delete_id);
        }




        $photos = Photo::findOrFail($request->checkBoxArray);
        foreach ($photos as $photo){
            $photo->delete();
        }
        return redirect()->route('media.index');
    }
}
