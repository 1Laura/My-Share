<?php

/*
 * Users class
 * Register user
 * Login user
 * Control Uses behavior and access
 */


class Users extends Controller
{
    public function __construct()
    {
    }

    // ================================REGISTER=====================================================
    public function register()
    {
        //echo 'Register in progress';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // form process in progress
        } else {
            //load form
//            echo 'load form';

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => '',
            ];

            //load view paduodam
            $this->view('users/register', $data);
        }
    }

    // ================================LOGIN========================================================
    public function login()
    {
        //echo 'Register in progress';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // form process in progress
        } else {
            //load form
//            echo 'load form';

            $data = [
                'email' => '',
                'password' => '',
                'emailErr' => '',
                'passwordErr' => '',
            ];

            //load view paduodam
            $this->view('users/login', $data);
        }

    }
}