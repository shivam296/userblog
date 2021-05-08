<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlogDetails extends Model
{
    protected $primaryKey =  'id';
    protected $fillable = ['image_name','title','description','tag','user_id']; 
}
