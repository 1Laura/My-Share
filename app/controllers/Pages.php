<?php
//Pages class responsible for controller Pages


class Pages extends Controller
{

    public function __construct()
    {
        // echo 'hello from pages controller';
    }

    public function index()
    {
        //create some data to load into view
        $data = [
            'title' => 'Welcome to ' . SITENAME,
        ];
        //load the view
        $this->view('pages/index', $data);
    }

    //padarom nauja puslapi
    public function about()
    {
        //create some data to load into view
        $data = [
            'title' => 'Welcome to About page- ' . SITENAME,
        ];
        //load the view
        $this->view('pages/about', $data);
    }
}


