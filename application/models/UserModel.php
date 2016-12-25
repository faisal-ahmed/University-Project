<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:33 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        $email = $this->postGet('email');
        $password = $this->postGet('password');

        $this->db->select("*");
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            if ($user->verified == '0') {
                return "Your email has not been verified yet. Please verify your email first.";
            }
            $this->createUserSession($user->id, $user->first_name, $user->last_name);
            $this->db->where('id', $user->id);
            $usersInfoUpdate = $this->db->update('users', array('last_logged_in' => time()));
            return true;
        }
        return 'Invalid Email or Password.';
    }

    function createUserSession($id, $first_name, $last_name){
        $this->session->set_userdata('login', true);
        $this->session->set_userdata('username', $first_name . " " . $last_name);
        $this->session->set_userdata('first_name', $first_name);
        $this->session->set_userdata('last_name', $last_name);
        $this->session->set_userdata('user_id', $id);
    }

    function register(){
        $email = $this->postGet('email');
        $emailValid = true;

        $this->db->where('email', $email);
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            $emailValid = false;
            break;
        }

        if ($emailValid) {
            $usersData = array(
                'first_name' => $this->postGet('first_name'),
                'last_name' => $this->postGet('last_name'),
                'email' => $this->postGet('email'),
                'password' => md5($this->postGet('password')),
                'gender' => $this->postGet('gender'),
                'created_at' => time(),
            );

            $usersInfoCreate = $this->db->insert('users', $usersData);

            if (!$usersInfoCreate){
                return "An error found. Please try again later!";
            }

            $verifyData = array(
                "email" => $this->postGet("email"),
                "type" => ACCOUNT_VERIFY_TYPE,
                "code" => $this->randomPassword(8),
            );
            $usersInfoCreate = $this->db->insert('verification', $verifyData);

            $subject = "Verify your account";
            $body = "An account has been created on behalf of you. If it's you then please verify your email address by clcking the following link.\n\n";
            $body .= (base_url() . "index.php/Auth/verify?um=" . $verifyData["email"] . "&c=" . $verifyData["code"]);

            $this->sendEmail($verifyData['email'], $subject, $body);
        } else {
            return 'The email address is already in use! Please try with a different email address.';
        }

        return true;
    }

    function passwordCheck($userId, $password){
        $this->db->where('id', $userId);
        $this->db->where('password', md5($password));
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            return true;
            break;
        }

        return false;
    }

    function updateProfile($userId, $uploadedPictureUrl = null){
        $newPassword = $this->postGet('newPassword');
        $confirmPassword = $this->postGet('confirmPassword');
        $password = $this->postGet('currentPassword');
        $triggerEmailVerification = false;
        $passwordValid = $this->passwordCheck($userId, $password);

        if ($passwordValid && $newPassword == $confirmPassword) {
            $usersData = array("modified_at" => time());
            if ($this->postGet('first_name')) {
                $usersData['first_name'] = $this->postGet('first_name');
                $last_name = $this->session->userdata('last_name');
                $this->session->set_userdata('username', $usersData['first_name'] . " " . $last_name);
                $this->session->set_userdata('first_name', $usersData['first_name']);
            }

            if ($this->postGet('last_name')) {
                $usersData['last_name'] = $this->postGet('last_name');
                $first_name = $this->session->userdata('first_name');
                $this->session->set_userdata('username', $first_name . " " . $usersData['last_name']);
                $this->session->set_userdata('last_name', $usersData['last_name']);
            }

            if ($this->postGet('phone')) {
                $usersData['phone'] = $this->postGet('phone');
            }

            if ($this->postGet('email')) {
                $usersData['email'] = $this->postGet('email');
                $usersData['verified'] = 0;
                $triggerEmailVerification = true;
            }

            if ($this->postGet('date_of_birth')) {
                $usersData['date_of_birth'] = $this->postGet('date_of_birth');
            }

            if ($uploadedPictureUrl != null) {
                $usersData['profile_picture'] = $uploadedPictureUrl;
            }

            if ($newPassword != '') {
                $usersData['password'] = md5($newPassword);
            }

            $this->db->where('id', $userId);
            $usersInfoUpdate = $this->db->update('users', $usersData);

            if (!$usersInfoUpdate){
                return "An error found. Please try again later!";
            }

            if ($triggerEmailVerification) {
                $verifyData = array(
                    "email" => $this->postGet("email"),
                    "type" => ACCOUNT_VERIFY_TYPE,
                    "code" => $this->randomPassword(8),
                );
                $usersInfoCreate = $this->db->insert('verification', $verifyData);

                $subject = "Verify your account";
                $body = "An account has been created on behalf of you. If it's you then please verify your email address by clcking the following link.\n\n";
                $body .= (base_url() . "index.php/Auth/verify?um=" . $verifyData["email"] . "&c=" . $verifyData["code"]);

                $this->sendEmail($verifyData['email'], $subject, $body);
            }

        } else {
            return (!$passwordValid) ? 'Invalid Current Password' : "New Password doesn't match.";
        }

        return true;
    }

    function getProfileInfo($userId){
        $return = array();
        $this->db->where('id', $userId);
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            $return = array(
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'phone' => $user->phone,
                'email' => $user->email,
                'date_of_birth' => $user->date_of_birth,
                'profile_picture' => $user->profile_picture,
            );
            break;
        }
        
        return $return;
    }

    /* Bookmark Model */
    function create_bookmark($user_id){
        $id = false;
        $url = $this->postGet('url');
        $title = $this->postGet('title');
        $imageSource = $this->postGet('im');
        $source = $this->postGet('s');

        $this->db->where('source', $source);
        $this->db->where('title', $title);
        $this->db->where('url', $url);
        $this->db->where('url_to_image', $imageSource);
        $res = $this->db->get('content');

        foreach ($res->result() as $content) {
            $id = $content->id;
            break;
        }

        if ($id === false){
            $data = array(
                "source" => $source,
                "title" => $title,
                "url" => $url,
                "url_to_image" => $imageSource,
            );
            $this->db->insert("content", $data);

            $id = $this->db->insert_id();
        }

        $this->db->where('user_id', $user_id);
        $this->db->where('content_id', $id);
        $res = $this->db->get('bookmark');

        foreach ($res->result() as $room) {
            return "You have already bookmarked the content.";
        }

        $data = array("content_id" => $id, "user_id" => $user_id);
        $this->db->insert("bookmark", $data);

        return "A content has been bookmarked successfully";
    }

    function remove_bookmark($user_id){
        $this->db->where('content_id', $this->postGet("content"));
        $this->db->where('user_id', $user_id);
        $res = $this->db->delete('bookmark');

        return "The bookmark has been removed successfully.";
    }

    function list_bookmark($user_id){
        $return = array();
        $this->db->select("*");
        $this->db->where('user_id', $user_id);
        $this->db->join("content", "bookmark.content_id = content.id", "left");
        $res = $this->db->get('bookmark');

        foreach ($res->result() as $bookmarked_content) {
            $return[] = array(
                "id" => $bookmarked_content->id,
                "source" => $bookmarked_content->source,
                "title" => $bookmarked_content->title,
                "url" => $bookmarked_content->url,
                "url_to_image" => $bookmarked_content->url_to_image,
            );
        }

        return $return;
    }

    /* Discussion Model */
    function create_discussion($user_id){
        $id = false;
        $url = $this->postGet('url');
        $title = $this->postGet('title');
        $imageSource = $this->postGet('im');
        $source = $this->postGet('s');

        $this->db->where('source', $source);
        $this->db->where('title', $title);
        $this->db->where('url', $url);
        $this->db->where('url_to_image', $imageSource);
        $res = $this->db->get('content');

        foreach ($res->result() as $content) {
            $id = $content->id;
            break;
        }

        if ($id === false) {
            $data = array(
                "source" => $source,
                "title" => $title,
                "url" => $url,
                "url_to_image" => $imageSource,
            );
            $this->db->insert("content", $data);

            $id = $this->db->insert_id();
        }

        $this->db->where('user_id', $user_id);
        $this->db->where('content_id', $id);
        $res = $this->db->get('discussion_room');

        foreach ($res->result() as $room) {
            return "You have already joined in the discussion room.";
        }

        $data = array("content_id" => $id, "user_id" => $user_id);
        $this->db->insert("discussion_room", $data);

        return "You have been assigned in the room successfully.";
    }

    function remove_discussion($user_id){
        $this->db->where('content_id', $this->postGet("content"));
        $this->db->where('user_id', $user_id);
        $res = $this->db->delete('discussion_room');

        return "You have been removed from the room successfully.";
    }

    function list_discussion($user_id){
        $return = array();
        $this->db->select("*");
        $this->db->where('user_id', $user_id);
        $this->db->join("content", "discussion_room.content_id = content.id", "left");
        $res = $this->db->get('discussion_room');

        foreach ($res->result() as $discussion) {
            $return[] = array(
                "id" => $discussion->id,
                "source" => $discussion->source,
                "title" => $discussion->title,
                "url" => $discussion->url,
                "url_to_image" => $discussion->url_to_image,
            );
        }

        return $return;
    }

    function load_discussion($user_id, $content_id){
        $return = array();
        $this->db->select("*");
        $this->db->where('id', $content_id);
        $res = $this->db->get('content');

        foreach ($res->result() as $discussion) {
            $retArray = array(
                "id" => $discussion->id,
                "source" => $discussion->source,
                "title" => $discussion->title,
                "url" => $discussion->url,
                "url_to_image" => $discussion->url_to_image,
            );

            $this->db->select("*");
/*            $this->db->where('user_id', $user_id);*/
            $this->db->where('content_id', $content_id);
            $this->db->join("users", "users.id = comment.user_id", "left");
            $this->db->order_by('comment.id', 'desc');
            $res = $this->db->get('comment');

            foreach ($res->result() as $comment) {
                $retArray['comments'][] = array(
                    'fullname' => $comment->first_name . " " . $comment->last_name,
                    'profile_picture' => $comment->profile_picture,
                    'comment' => $comment->comment,
                    'at' => $comment->commented_at,
                );
            }

            $return = $retArray;
            break;
        }

        return $return;
    }

    function addComment($user_id){
        $content_id = $this->postGet("content_id");
        $comment = $this->postGet("comment");

        if ($comment == '') return false;

        $data = array(
            "content_id" => $content_id,
            "user_id" => $user_id,
            "comment" => $comment,
            "commented_at" => time(),
        );
        $this->db->insert("comment", $data);
        return true;
    }

    function Verify(){
        $email = $this->postGet("um");
        $code = $this->postGet("c");

        $this->db->select("*");
        $this->db->where('email', $email);
        $this->db->where('code', $code);
        $res = $this->db->get('verification');

        foreach ($res->result() as $verified) {
            $type = $verified->type;

            $this->db->where('email', $email);
            $this->db->where('code', $code);
            $res = $this->db->delete('verification');

            if ($type == ACCOUNT_RECOVERY_TYPE){
                $this->db->where('email', $email);
                $usersInfoUpdate = $this->db->update('users', array("password" => md5($code)));
                return $code;
            } else {
                $this->db->where('email', $email);
                $usersInfoUpdate = $this->db->update('users', array("verified" => '1'));
                return $type;
            }
        }
        return false;
    }

    function forgetPassword(){
        $verifyData = array(
            "email" => $this->postGet("email"),
            "type" => ACCOUNT_RECOVERY_TYPE,
            "code" => $this->randomPassword(8),
        );
        $usersInfoCreate = $this->db->insert('verification', $verifyData);

        $subject = "Verify your account";
        $body = "Someone requested to reset the password of your account. If it's you then please click on the following link to reset your password..\n\n";
        $body .= (base_url() . "index.php/Auth/verify?um=" . $verifyData["email"] . "&c=" . $verifyData["code"]);

        $this->sendEmail($verifyData['email'], $subject, $body);

        return true;
    }
}