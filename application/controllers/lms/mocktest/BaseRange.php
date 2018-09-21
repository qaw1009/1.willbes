<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 과목별문제영역
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRange extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     * @param array $params
     */
    public function index()
    {
        $list = '';//$this->BaseRangeModel->list();


        $this->load->view('mocktest/base/range/index',[
            'data' => $list,
            'site_code_def' => '2001'
        ]);
    }


    /**
     * 목록조회
     * @param array $params
     */
    public function list($params = [])
    {

    }


    /**
     * 등록 폼
     * @param array $params
     */
    public function create()
    {
        $this->load->view('mocktest/base/range/create', [
            'data' => array(),
        ]);
    }


    /**
     * 등록
     * @param array $params
     */
    public function store()
    {

    }


    /**
     * 수정 폼
     * @param array $params
     */
    public function edit()
    {

    }


    /**
     * 수정
     * @param array $params
     */
    public function update()
    {

    }

}
