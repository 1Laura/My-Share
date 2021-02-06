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
    private Validation $vld;

    public function __construct()
    {
        $this->userModel = $this->model('User');

        //init validation class
        $this->vld = new Validation();

    }

    public function index()
    {
        redirect('/posts');
    }

    // ================================REGISTER=====================================================
    public function register()
    {
        //echo 'Register in progress';
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($this->vld->ifRequestIsPostAndSanitize()) {
            // form process in progress
            //sanitize Post Array
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //create data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'errors' => [
                    'nameErr' => '',
                    'emailErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
            ];

            // Validate name
            // pasirasyti f-ja
//           $this->vld->ifEmptyUserFieldWithReference($data, 'name', 'Name'));
            $data['errors']['nameErr'] = $this->vld->validateName($data['name']);

            // Validate email
            $data['errors']['emailErr'] = $this->vld->validateEmail($data['email'], $this->userModel);

            // Validate password, nuo 4 iki 10 simboliu
            $data['errors']['passwordErr'] = $this->vld->validatePassword($data['password'], 4, 10);

            // Validate confirmPassword
            $data['errors']['confirmPasswordErr'] = $this->vld->validateConfirmPassword($data['confirmPassword']);

//            $data['errors']['confirmPasswordErr'] = $this->vld->ifEmptyUserField($data['confirmPassword'], 'confirmPassword', 'Please repeat Password');
//            if ($data['errors']['confirmPasswordErr'] === '') {
//                // empty field
//                if ($data['confirmPassword'] !== $data['password']) {
//                    $data['errors']['confirmPasswordErr'] = 'Password must match';
//                }
//            }


            //if there is no errors
            if ($this->vld->ifEmptyErrorsArray($data['errors'])) {
//            if (empty($data['errors']['nameErr']) && empty($data['errors']['emailErr']) && empty($data['errors']['passwordErr']) && empty($data['errors']['confirmPasswordErr'])) {
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
                $data['currentPage'] = 'register';

                //load view with errors
                $this->view('users/register', $data);
            }
        } else {
            //load form
//            echo 'load form';

            $data = ['name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'errors' => ['nameErr' => '',
                    'emailErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',],
                'currentPage' => 'register'];

            //load view paduodam
            $this->view('users/register', $data);
        }
    }


// ================================LOGIN========================================================
    public function login()
    {
        //echo 'Register in progress';
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($this->vld->ifRequestIsPostAndSanitize()) {
            // form process in progress
            //sanitize Post Array
            //isvalo visa inputu masyva, masyvu tipas yra POST, isvalo nuo nereikalingu elementu, nuima tagus
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //create data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ],
            ];

            //validate email

            $data['errors']['emailErr'] = $this->vld->validateLoginEmail($data['email'], $this->userModel);

            //validate password
            $data['errors']['passwordErr'] = $this->vld->validateEmpty($data['password'], 'Please enter your password');


//            if (empty($data['password'])) {
//                $data['passwordErr'] = 'Please enter Your password';
//            }

            if ($this->vld->ifEmptyErrorsArray($data['errors'])) {
                //check if we have errors
                //no errors
                //email was found and password was entered
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    //create session
                    //password match
                    $this->createUserSession($loggedInUser);
//                    die('email and pass match start session immediately');
                    //id, name ir email issisaugoti i sessija kai prisiloginam
                    //kai turim tuos duomeniss, galesim valdyti visa flowa
                } else {
                    $data['errors']['passwordErr'] = 'Wrong password or email';
                    //load view with errors
                    $this->view('users/login', $data);
                }
//                die ('success');
            } else {
                $data['currentPage'] = 'login';
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
                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ],
            ];
            $data['currentPage'] = 'login';
            //load view paduodam
            $this->view('users/login', $data);
        }

    }


// if we have user we save its data is session======================================================================
    public
    function createUserSession($userRow)
    {
        $_SESSION['userId'] = $userRow->id;
        $_SESSION['userName'] = $userRow->name;
        $_SESSION['userEmail'] = $userRow->email;

        redirect('/posts');
    }

//=====================LOGOUT=======================================================================================
    public
    function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);

        session_destroy();

        redirect('/users/login');
    }
}