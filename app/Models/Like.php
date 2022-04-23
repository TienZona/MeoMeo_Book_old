<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['id_post', 'id_user'];
    public $timestamps = false;

    public static function check($id_post, $id_user){
        $data = Like::where('id_post',$id_post)->where('id_user',$id_user)->get();
        if(isset($data[0]['like'])) 
            return true;
        else 
            return false;
    }

    public static function unlike($id_post, $id_user){
        Like::where('id_post',$id_post)->where('id_user',$id_user)->delete();
    }

    public static function deleteLike($id_post){
        Like::find('id_post', $id_post)->delete();
    }

    public static function numberLike($id_post){
        return Like::where('id_post', $id_post)->count();
    }

    public static function getLikeOfUser($id_user){
        return Like::where('id_user', $id_user)->get();
    }
}
