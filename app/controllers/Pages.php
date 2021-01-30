<?php
//Pages class responsible for controller Pages


class Pages extends Controller
{

    public function __construct()
    {
        // echo 'hello from pages controller';
    }

    // ======================================INDEX===========================================
    public function index()
    {
        //create some data to load into view
        $data = [
            'title' => 'Welcome to ' . SITENAME,
            'description'=>'This is an app to share your Thoughts with the World'
        ];
        //load the view
        $this->view('pages/index', $data);
    }

    // ======================================ABOUT===========================================
    //padarom nauja puslapi
    public function about()
    {
        //create some data to load into view
        $data = [
            'title' => 'About - ' . SITENAME,
            'description'=>'App to share news with friends and World'
        ];
        //load the view
        $this->view('pages/about', $data);
    }
}


