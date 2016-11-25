<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class Search extends Base
{
    private $menu = 'search';
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }

    public function ArchivedContent(){
        $data = array("menu" => $this->menu);

    }

    public function RecentContent(){
        $data = array("menu" => $this->menu);

    }
}