<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'file'

    ];

    public $public_path = 'C:/xampp/htdocs';
    protected $uploads = '/hacking/laravel/public/images/';


    public function getFileAttribute($photo){
        return $this->uploads.$photo;
    }
}
