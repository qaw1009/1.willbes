<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfMaterial.php';

class Material extends SupportProfMaterial
{
    protected $_bm_idx = '69';       //bmidx : 학습자료실 게시판
    protected $_default_path = '/prof';

    public function __construct()
    {
        parent::__construct();
    }

}