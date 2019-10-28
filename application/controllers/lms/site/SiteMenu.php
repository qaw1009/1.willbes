<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/site/menu/BaseSiteMenu.php';

class SiteMenu extends BaseSiteMenu
{
    public function __construct()
    {
        parent::__construct('site', '사이트');
    }
}