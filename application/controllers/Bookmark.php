<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/controllers/Base.php";
require_once BASEPATH . "../application/libraries/newsApiProcessor.php";

class Bookmark extends Base
{
    private $menu = "bookmark";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array("menu" => $this->menu);

        if ($this->postGet('url')) $data['success'] = $this->UserModel->create_bookmark($this->getUserId());
        if ($this->postGet('content')) $data['success'] = $this->UserModel->remove_bookmark($this->getUserId());

        $data['bookmark_list'] = $this->UserModel->list_bookmark($this->getUserId());
        $data['status'] = count($data['bookmark_list']) ? "success" : "empty";

        $this->viewLoad("common/bookmark", $data);
    }
}