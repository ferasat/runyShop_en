<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use QCod\ImageUp\HasImageUploads;

class Product extends Model
{
    public function comments()
    {
        return $this -> hasMany(CommentsProduct::class);
    }

    public function files()
    {
        return $this -> hasMany(FileManager::class);
    }

}
