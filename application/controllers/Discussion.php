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

class Discussion extends Base
{
    private $menu = "discussion";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array("menu" => $this->menu);

        if ($this->postGet('url')) $data['success'] = $this->UserModel->create_discussion($this->getUserId());
        if ($this->postGet('content')) $data['success'] = $this->UserModel->remove_discussion($this->getUserId());

        $data['discussion_list'] = $this->UserModel->list_discussion($this->getUserId());
        $data['status'] = count($data['discussion_list']) ? "success" : "empty";

        $this->viewLoad("common/discussion", $data);
    }

    public function view(){
        $data = array("menu" => $this->menu);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->UserModel->addComment($this->getUserId())) {
            } else {
                $data['error'] = 'Comment cannot be added now. Please try again later.';
            }
        }

        $data['discussion'] = $this->UserModel->load_discussion($this->getUserId(), $this->postGet("id"));

        $this->viewLoad("common/view_discussion", $data);
    }
}