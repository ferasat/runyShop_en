<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = ['name','description','picture','icon','statusMaster','statusChild','Inherited','statusPublish','focusKeyword','titleSeo','url','metaDescription'];

}
