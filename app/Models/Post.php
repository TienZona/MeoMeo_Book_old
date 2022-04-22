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

    public static function deletePost($id_post){
        Post::find($id_post)->delete();
    }


}
