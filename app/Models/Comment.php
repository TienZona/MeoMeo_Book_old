<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['id_post', 'id_user', 'content', 'image'];

    public static function getCommentOfPost($id_post){
        return Comment::where('id_post', $id_post)->orderBy('created_at', 'desc')->get();
    }

    public static function deleteComment($id_post){
        Comment::find('id_post', $id_post)->delete();
    }
}
