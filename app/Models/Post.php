<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id', 'content', 'image', 'id_user'];

    public static function validate(array $data) {
        $errors = [];

        if ($data['content'] == '') {
            $errors['content'] = 'Nội dung không được rỗng!';
        }
        if ($data['id_user'] == '') {
            $errors['user'] = 'Bạn chưa đăng nhập!';
        }

        return $errors;
    }  

    public static function getPost($id_user){
        $comments = Post::where('id_user', $id_user)->first();
        return $comments;
    }

    public static function getAllPost(){
        return Post::where('deleted', 'not', 1)->orderBy('created_at', 'desc')->get();
    }

    public static function deletePost($id_post){
        Post::where('id',$id_post)->update(['deleted' => 1]);
    }


}
