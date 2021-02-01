<?php

/*
 * Posts controller
 * Basic CRUD functionality
 *
 */

class Posts extends Controller
{
    public function __construct()
    {
        //restrict access of this controller only logged in users
        if (!isLoggedIn()) redirect('/users/login');
    }

    public function index()
    {

        $data = [];
        $this->view('posts/index', $data);

    }
}
