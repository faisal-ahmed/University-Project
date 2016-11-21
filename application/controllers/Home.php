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

class Home extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $contentProviders = getNewsApiSources();
        if ($contentProviders['result'] == 'success') {
            $contentProviders = $contentProviders['data'];
        } else {
            $contentProviders = '';
        }
        $data['contentProvider'] = $contentProviders;

        $selectedContentProvider = $this->getPost('contentProvider') != false ? $this->getPost('contentProvider') : 'abc-news-au';
        $content = getNewsApiArticle($selectedContentProvider);
        if ($content['result'] == 'success') {
            $content = $content['data'];
        } else {
            $content = '';
        }
        $data['content'] = $content;

        $this->viewLoad("common/home", $data);
    }
}