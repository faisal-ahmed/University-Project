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
        $this->login();
    }

    public function login()
    {
        $this->redirectLoggedInUser();
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if (($status = $this->UserModel->login()) === true) {
                $this->redirectLoggedInUser();
            } else {
                $data['error'] = $status;
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
                $data['success'] = "Thank You! Your account has been created! An email has been sent to your registered email address to verify. Please verify and login to continue.";
            } else {
                $data['error'] = $status;
            }
        }

        $this->viewLoad("common/register", $data);
    }

    public function profile()
    {
        $this->redirectGeneralUser();
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->UserModel->passwordCheck($this->getUserId(), $this->postGet("currentPassword"))) {
                $config['upload_path']          = BASEPATH . "../static/uploads/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']             = 2500;
                $profile_picture = null;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('profile_picture')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $profile_picture = base_url() . "static/uploads/" . $upload_data['file_name'];
                }

                if (($status = $this->UserModel->updateProfile($this->getUserId(), $profile_picture)) === true) {
                    $data['success'] = "Your profile information have been updated.";
                } else {
                    $data['error'] = $status;
                }
            } else {
                $data['error'] = "Current password doesn't match.";
            }
        }

        $data['info'] = $this->UserModel->getProfileInfo($this->getUserId());
        $this->viewLoad("common/profile", $data);
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

    public function verify(){
        $this->redirectLoggedInUser();
        $data = array("menu" => $this->menu);

        if (($status = $this->UserModel->Verify()) === false) {
            $data['error'] = "Please stop! Invalid address.";
        } else {
            if ($status == ACCOUNT_VERIFY_TYPE) {
                $data['success'] = 'Your email has been verified successfully. Please click '. '<a href="' . base_url() . 'index.php/Auth/login">Enter</a> to login.';
                $redirect = true;
            } else {
                $data['password'] = $status;
            }
        }

        $this->viewLoad("common/email_verify", $data);
    }
}