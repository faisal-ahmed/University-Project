<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/libraries/utilities.php";

class Base extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index()
    {
    }

    protected function isLoggedIn(){
        return $this->getSessionAttr('login');
    }

    protected function getSessionAttr($attr) {
        if ($this->session->userdata("$attr") ) {
            return $this->session->userdata("$attr");
        }
        return false;
    }

    protected function setSessionAttr($attr, $value) {
        return $this->session->set_userdata("$attr", $value);
    }

    protected function unsetSessionAttr($attr) {
        return $this->session->unset_userdata("$attr");
    }

    protected function getUserRole(){
        return $this->getSessionAttr('role');
    }

    protected function getUserId(){
        return $this->getSessionAttr('user_id');
    }

    protected function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    protected function viewLoad($view = null, $data = null){
        if (!isset($data['hide_menu'])){
            $data['hide_menu'] = '';
        }
        $data['user_role'] = $this->getUserRole();
        $data['username'] = $this->getSessionAttr('username');
        $this->load->view('common/header');

        if ($this->isLoggedIn()){
            $this->load->view("landing/landingHeader", $data);
            $this->load->view("landing/landingLeftMenu", $data);
        } else {
            $this->load->view("common/menu", $data);
        }

        if (isset($view)) {
            $this->load->view("$view", $data);
        }

        if ($this->isLoggedIn()){
            $this->load->view("landing/landingFooter", $data);
        }

        $this->load->view('common/footer');
    }

    protected function redirectToHome(){
        redirect('Home', 'refresh');
    }
}
