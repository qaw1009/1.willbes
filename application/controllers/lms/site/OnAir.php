<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAir extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {

    }

    /**
     * 약관동의 등록
     */
    public function create()
    {
        $method = 'POST';
        $data = null;
        $week_arr = null;
        $oa_idx = '';

        if($method == 'POST') {
            $week_arr = explode(",",",,,,,,");
        }
        elseif($method == 'PUT') {
            $week_arr = explode(",",$data['WeekArray']);
        }

        $this->load->view("site/onAir/create", [
            'method' => $method,
            'data' => $data,
            'oa_idx' => $oa_idx,
            'week_arr' => $week_arr
        ]);
    }
}