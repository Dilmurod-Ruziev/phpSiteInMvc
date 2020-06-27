<?php
class Users extends Controller
{

    public function __construct()
    {
        $this -> postModel = $this -> model('Post');
        $this -> userModel = $this -> model('User');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        #Pagination
        $number_of_results = $this ->postModel ->countUsers();
        $results_per_page = 6;
        $number_of_pages = ceil($number_of_results['0']/$results_per_page);
        // determine which page number visitor is currently on
        if (!isset($_GET['index'])) {
            $page = 1;
        } else {
            $page = $_GET['index'];
        }
        $this_page_first_result = ($page-1)*$results_per_page;
        $allusers = $this -> postModel -> pagination('users',$this_page_first_result, $results_per_page);

        $data = [
            'allusers' => $allusers,
            'page' => $page,
            'number_of_pages' => $number_of_pages
        ];

        $this -> view('users/index', $data);
    }
    public function show($id)
    {
        $post = $this -> postModel -> getUserPostsById($id);
        $user = $this -> userModel -> getUserById($id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this -> view('users/show', $data);
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'phone_number' => trim($_POST['phone_number']),
                'city' => trim($_POST['city']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'phone_number_err' => '',
                'city_err' => ''
            ];

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            } else if (!preg_match('/\w{1,}/', $data['name'])) {
                $data['name_err'] = 'Name must be at least 5 characters';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else if ($this -> userModel -> findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already registered';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (!preg_match('/\w{5,}/', $data['password'])) {
                $data['password_err'] = "Password must contain at least characters (alphanumeric, %,$, -, _, etc)";
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Validate Phone Number
            if (empty($data['phone_number'])) {
                $data['phone_number_err'] = 'Please enter phone number';
            } elseif (!preg_match('/998\d{9}/', $data['phone_number'])) {
                $data['phone_number_err'] = 'Wrong number!';
            }

            // Validate City
            if (empty($data['city'])) {
                $data['city_err'] = 'Please enter city';
            } elseif (!preg_match('/\w{1,}/', $data['city'])) {
                $data['city_err'] = 'City must be word';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['phone_number_err']) && empty($data['city_err']) ) {
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Register User
                $registeredUser = $this -> userModel -> register($data);
                if ($registeredUser) {
                    $this->createRegSession($registeredUser);
                    flash('register_success', 'You are registered and can log in');
                    $this->login($data['email'],$data['password']);
                    redirect('posts/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this -> view('users/register', $data);
            }

        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'phone_number' => '',
                'city' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'phone_number_err' => '',
                'city_err' => ''
            ];

            $this -> view('users/register', $data);
        }
    }

    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }


        } else {
            // Init data
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts/index');
    }

    public function createRegSession($user){
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

}