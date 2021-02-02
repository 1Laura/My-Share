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
        //if form was submited

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //lets validate
            //issivalom posto masyva
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userId' => $_SESSION['userId'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleErr' => '',
                'bodyErr' => ''
            ];

            //validate title
            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter a title';
            }
            //validate body
            if (empty($data['body'])) {
                $data['bodyErr'] = 'Please enter a text';
            }

            //check if there are no errors
            if (empty($data['titleErr']) && empty($data['bodyErr'])) {
                // there ar no errors
                // die('no errors, can submit');
                if ($this->postModel->addPost($data)) {
                    //post added
                    flash('postMessage', 'You have added a new post');
                    redirect('/posts');
                } else {
                    die('something went wrong in adding post');
                }

            } else {
                //load view with errors
                $this->view('posts/add', $data);
            }
        } else {
            //else user entered into this page
            //add posts
            $data = [
                'title' => '',
                'body' => '',
                'titleErr' => '',
                'bodyErr' => ''
            ];
            $this->view('posts/add', $data);
        }

    }

    public function show($id = null)
    {
        if ($id === null) redirect('/posts');

        //get post row
        $post = $this->postModel->getPostById($id);
        //create data for the view and add post data
        $data = [
            'post' => $post
        ];
        //load view
        $this->view('posts/show', $data);


    }
}
