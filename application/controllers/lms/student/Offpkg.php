<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Offpkg extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('offpkg');
    }


    /**
     * 수강생보기 레이어 팝업
     */
    public function viewLayer()
    {
        $ProdCode = $this->_req("ProdCode");

        return $this->load->view('/student/layer/layer_offpkg', [
            'ProdCode' => $ProdCode
        ]);
    }

}