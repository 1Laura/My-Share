<?php

/*
 * Posts controller
 * Basic CRUD functionality
 *
 */

class Posts extends Controller
{

    public function index()
    {
        $data=[];
        $this->view('posts/index', $data);

    }
}
