<?php

//Base controller
//loads models and views

class Controller
{
    //load model
    public function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            //require model file
            require_once '../app/models/' . $model . '.php';

            //make object of that class
            //new Posts
            return new $model();
        } else {
            die('model does not exist');
        }
    }

    //load view
    public function view($view, $data = [])
    {
        //check if view exists
        if (file_exists("../app/views/$view.php")) {
            //if view exist we requirw it
            //we load this view
            require_once "../app/views/$view.php";
        } else {
            die('View does not exist');
        }
    }
}