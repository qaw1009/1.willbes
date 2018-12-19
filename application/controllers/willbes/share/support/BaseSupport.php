<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSupport extends \app\controllers\FrontController
{
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        $board_idx = $this->_reqG('board_idx');

        $this->downloadFModel->saveLog($board_idx);
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }


}