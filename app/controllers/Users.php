<?php

/*
 * Users class
 * Register user
 * Login user
 * Control Uses behavior and access
 */


class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // ================================REGISTER=====================================================
    public function register()
    {
        //echo 'Register in progress';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // form process in progress

            //sanitize Post Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //create data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => '',
            ];

            // Validate name
            if (empty($data['name'])) {
                // empty field
                $data['nameErr'] = 'Please enter your Name';
            }
            // Validate email
            if (empty($data['email'])) {
                // empty field
                $data['emailErr'] = 'Please enter your Email';
            } else {
                if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
                    $data['emailErr'] = 'Please check Your Email';
                } else {
                    // check if email already exists
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailErr'] = 'Email already taken';
                    }
                }
            }
            // Validate password
            if (empty($data['password'])) {
                // empty field
                $data['passwordErr'] = 'Please enter your Password';
            } elseif (strlen($data['password']) < 4) {
                $data['passwordErr'] = 'Password must be 4 or more characters';
            }
            // Validate confirmPassword
            if (empty($data['confirmPassword'])) {
                // empty field
                $data['confirmPasswordErr'] = 'Please repeat Password';
            } else {
                if ($data['confirmPassword'] !== $data['password']) {
                    $data['confirmPasswordErr'] = 'Password must match';
                }
            }

            //if there is no errors
            if (empty($data['nameErr']) && empty($data['emailErr']) && empty($data['passwordErr']) && empty($data['confirmPasswordErr'])) {
                //there ar no errors
                //pridejimas i duomenu baze
                die('SUCCESS');

                //validation ok


                //create user

                //hash password

//                $this->userModel->register($data);

            } else {
                //load view with errors
                $this->view('users/register', $data);
            }
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