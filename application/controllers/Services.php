<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class Services extends Base
{
    private $menu = 'services';
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array("menu" => $this->menu);
        $this->viewLoad("common/services", $data);
    }
}