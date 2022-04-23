<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'birthdate', 'sex', 'avatar'];

    public static function validate(array $data) {
        $errors = [];

        if (! $data['email']) {
            $errors['email'] = 'Vui lòng điền Email.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email đã được sử dụng.';
        }    

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Mật khẩu phải lơn hơn hoặc bằng 6 ký tự.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Mật khẩu không khớp.';
        }

        if($data['sex'] == ''){
            $errors['sex'] = 'Vui lòng chọn giới tính';
        }

        return $errors;
    }   

    public static function getUser($id_user){
        return User::find($id_user);
    }

    public static function getUsername($id_user){
        $user = User::find($id_user);
        return $user['name'];
    }

    public static function getAvatar($id_user){
        $user = User::find($id_user);
        return $user['avatar'];
    }

    public static function updateUser($id, $data){
        User::find($id)->update($data);
    }

    public static function getPassword($id){
        return User::find($id)->password;
    }

    public static function updatePassword($id, $password){
        User::find($id)->update(['password' => $password]);
    }

    public static function updateAvatar($id, $avatar){
        User::find($id)->update(['avatar' => $avatar]);
    }

}
