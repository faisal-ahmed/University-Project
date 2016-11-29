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
        $data = array("menu" => $this->menu);
    }

    public function login()
    {
        $data = array("menu" => $this->menu);

        $this->viewLoad("common/login", $data);
    }

    public function register()
    {
        $data = array("menu" => $this->menu);

        $this->viewLoad("common/register", $data);
    }

    public function forgetPassword()
    {
        $data = array("menu" => $this->menu);

        $this->viewLoad("common/forget_password", $data);
    }
}