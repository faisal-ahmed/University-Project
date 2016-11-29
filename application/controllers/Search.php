<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 11/21/16
 * Time: 7:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';
require_once BASEPATH . "../application/libraries/newsApiProcessor.php";

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

        $this->viewLoad("common/archived_content", $data);
    }

    public function RecentContent(){
        $data = array("menu" => $this->menu);
        $data["subMenu"] = "recent";
        $contentProviders = getNewsApiSources();
        if ($contentProviders['result'] == 'success') {
            $contentProviders = $contentProviders['data'];
        } else {
            $contentProviders = '';
        }
        $data['contentProvider'] = $contentProviders;

        $selectedContentProvider = $this->getPost('contentProvider') != false ? $this->getPost('contentProvider') : 'abc-news-au';
        $selectedContentFilter = $this->getPost('contentFilter') != false ? $this->getPost('contentFilter') : 'sortT';
        $content = getNewsApiArticle($selectedContentProvider, $selectedContentFilter);
        if (isset($content['result']) && $content['result'] == 'success') {
            if (isset($content['data']['status']) && $content['data']['status'] == 'error') {
                $content = $content['data']['message'];
                $data['status'] = 'error';
            } else {
                $content = $content['data'];
                $data['status'] = 'success';
            }
        } else {
            $content = '';
            $data['status'] = 'unknown';
        }
        $data['content'] = $content;
        $data['filter'] = $selectedContentFilter;


        $this->viewLoad("common/recent_content", $data);
    }
}