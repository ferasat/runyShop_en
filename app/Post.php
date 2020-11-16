<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name','texts','picture','titleSeo','url','shortDescription','date_publish','statusPublish',];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }
}
