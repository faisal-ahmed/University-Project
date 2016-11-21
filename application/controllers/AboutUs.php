<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class AboutUs extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->viewLoad("common/home");
    }
}