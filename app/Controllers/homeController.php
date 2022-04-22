<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
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
		$posts = Post::getPost(16);
		$newPost = [];
		foreach($posts as $post){
			$id = $post['id_user'];
			$username = User::getUsername($id);
			$avatar = User::getAvatar($id);
			$post['username'] = $username;
			$post['avatar'] = $avatar;
 			array_push($newPost, $post);

		}

		$this->sendPage('home', [ 
			'posts' =>  $newPost
		]); 
	}
}
