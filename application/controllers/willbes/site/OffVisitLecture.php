<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/site/OffLecture.php';

class OffVisitLecture extends OffLecture
{
    protected $auth_controller = true;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 장바구니 목록
     */
    public function cartList()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $result = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, null, null, 'N', 'Y', true);
        return $this->response([
            'data' => $result
        ]);
    }
}
