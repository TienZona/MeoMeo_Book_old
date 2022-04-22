<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['id_post', 'id_user', 'content', 'image'];

    public static function getComment($id_post){
        return Comment::find('id_post', 74);
    }


}
