<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:32 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/libraries/utilities.php";

class BaseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    function getPost($attr, $filter = true) {
        $return = trim($this->input->get_post($attr, $filter));
        return $return;
    }

    function postGet($attr, $filter = true) {
        $return = trim($this->input->post_get($attr, $filter));
        return $return;
    }

    function randomPassword($digit = 6){
        return substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)) , 0, 5);
    }

    function sendEmail($to, $subject, $view, $data){
        $config = Array(
            'mailtype'  => 'html',
        );
        $message = $this->load->view("$view", $data, TRUE);
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");
        $this->email->from('no.reply@uiu.ac.bd', 'United International University');
        $this->email->to($to);

        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }
}