<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/12/16
 * Time: 9:33 PM
 */

define('ADMIN_ROLE_TITLE', 'admin');
define('USER_ROLE_TITLE', 'user');

define('FAROO_API_KEY', '');
define('NEWSAPI_API_KEY', '72e6bb9d34c44aaab1527936e3185f4b');

global $endpoints;

$endpoints = array(
    "newsapi" => array(
        "sources" => array(
            "endpoint" => "https://newsapi.org/v1/sources?language=en",
        ),
        "articles" => array(
            "endpoint" => "https://newsapi.org/v1/articles",
        ),
    ),
    "faroo" => array(),
);
