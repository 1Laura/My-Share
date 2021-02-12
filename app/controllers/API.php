<?php

//class for returning json formatted data

class API extends Controller
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = $this->model('Comment');
    }

    public function index()
    {
        echo 'index in api';
    }


    public function comments()
    {
        $data = [
            'id' => 'comments'
        ];
        echo json_encode($data);
    }



    // truksta add comment



    public function validate($inputField)
    {
        $vld = new Validation;
        
        
        print_r($_POST);
        echo $inputField . "<br>";
        $input = $_POST[$inputField];
        die('hello from validate');
    }
}
