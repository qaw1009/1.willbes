<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportOffGallery.php';

class Gallery extends SupportOffGallery
{
    protected $_bm_idx = '90';       //bmidx : 학원갤러리게시판
    protected $_default_path = '/offinfo/gallery';

    public function __construct()
    {
        parent::__construct();
    }

}