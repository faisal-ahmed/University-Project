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

class ContentProviders extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $contentProviders = getNewsApiSources();

        $this->debug($contentProviders);
    }
}