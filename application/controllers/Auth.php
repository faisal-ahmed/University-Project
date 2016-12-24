<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class Auth extends Base
{
    private $menu = "login";
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->redirectLoggedInUser();
    }

    public function login()
    {
        $this->redirectLoggedInUser();
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->UserModel->login()) {
                $this->redirectLoggedInUser();
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        } else {
            $data['notification'] = 'Please enter your email and password to login.';
        }

        $this->viewLoad("common/login", $data);
    }

    public function logout(){
        if ($this->isLoggedIn()){
            $this->session->sess_destroy();
        }
        redirect('Home', 'refresh');
    }

    public function register()
    {
        $this->redirectLoggedInUser();
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if (($status = $this->UserModel->register()) === true) {
                $this->redirectLoggedInUser();
            } else {
                $data['error'] = $status;
            }
        }

        $this->viewLoad("common/register", $data);
    }

    public function profile()
    {
        $data = array("menu" => $this->menu);

        $this->viewLoad("common/register", $data);
    }

    public function forgetPassword()
    {
        $this->redirectLoggedInUser();
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->UserModel->forgetPassword()){
                $data['success'] = 'An email has been sent to your email address. Please follow the instruction in your email to gain access to your account again.';
            } else {
                $data['error'] = 'There is no account matching with that email. Please enter correct email.';
            }
        }

        $this->viewLoad("common/forget_password", $data);
    }
}