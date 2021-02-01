<?php

/*
 * Posts controller
 * Basic CRUD functionality
 *
 */

class Posts extends Controller
{
    private $postModel;

    public function __construct()
    {
        //restrict access of this controller only logged in users //apribojam priejima
        if (!isLoggedIn()) redirect('/users/login');

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        //get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        //addt posts
        $data = [
            'title' => '',
            'body' => '',
            'titleErr' => '',
            'bodyErr' => ''
        ];
        $this->view('posts/add', $data);
    }
}
