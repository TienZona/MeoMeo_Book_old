<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
	public function __construct()
	{
		if (!Guard::isUserLoggedIn()) {
			redirect('/login');
		}

		parent::__construct();
	}

	public function index()
	{
        $id = $_SESSION['user_id'];
        $user = User::getUser($id);
		$this->sendPage('profile', [
            'user' => $user
        ]);  
	}

    public function update(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $name = $_POST['fullname'];
            $birthdate = $_POST['birthdate'];
            $sex = $_POST['gender'];
            $data =  [
                'name' => $name,
                'birthdate' => $birthdate,
                'sex' => $sex 
            ];
            User::updateUser($id, $data);
            $messages = ['success' => 'Cập nhật thành công!'];
			redirect('/profile', ['messages' => $messages]);
        }
    }

    public function newPass(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $password_old = $_POST['password_old'];
            if(password_verify($password_old, User::getPassword($id))){
                $password_new = password_hash($_POST['password_new'], PASSWORD_DEFAULT);
                User::updatePassword($id, $password_new);
                $messages = ['success' => 'Mật khẩu đã được cập nhật vui lòng đăng nhặp lại!'];
                redirect('/logout', ['messages' => $messages]);
            }else{
                $messages = ['success' => 'Mật khẩu cũ không đúng!'];
                redirect('/profile', ['messages' => $messages]);
            }
        }
    }

    public function updateAvatar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if(!empty($_FILES["file"]["tmp_name"])){
                $target_dir = "img/avatar/";
                include 'upload.php';
                $err = [];
                $avatar = basename($_FILES["file"]["name"]);
                if(!$uploadOk){
                    $err['avatar'] = 'Tải ảnh lên không thành công';
                }
                if(empty($err)){
                    User::updateAvatar($id, $avatar);
                    $_SESSION['user_avatar'] = $avatar;
                    $messages = ['success' => 'Cập nhật ảnh đại diện thành công!'];
                    redirect('/profile', ['messages' => $messages]);
                }else{
                    redirect('/profile', ['errors' => $err]);
                }
            }else{
                $err['avatar'] = 'Cập nhật ảnh đại diện thất bại!';
                redirect('/profile', ['errors' => $err]);
            }
        }
    }
}
