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
//                die('SUCCESS');

                //validation ok

                //hash password // save way to store password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //create user
                if ($this->userModel->register($data)) {
                    //success user added
                    //set flash message
                    flash('registerSuccess', 'You have registered successfully');
//                    header("Location: " . URLROOT . "/users/login");
                    redirect('/users/login');
                } else {
                    die('something went wrong in adding user to db');
                }
            } else {
                //set flash msg, register fail
                flash('registerFail', 'Please check the form', 'alert alert-danger');
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
            //sanitize Post Array
            //isvalo visa inputu masyva, masyvu tipas yra POST, isvalo nuo nereikalingu elementu, nuima tagus
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //create data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailErr' => '',
                'passwordErr' => '',
            ];

            //validate email
            if (empty($data['email'])) {
                $data['emailErr'] = 'Please enter Your email';
            }
            //validate password
            if (empty($data['password'])) {
                $data['passwordErr'] = 'Please enter Your password';
            }

            //check if we have errors
            if (empty($data['emailErr']) && empty($data['passwordErr'])) {
                //no errors
                die ('success');
            } else {
                //load view with errors
                $this->view('users/login', $data);
            }


        } else {
            //if we go to users/login by url or link or btn
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