<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 과목별문제영역
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseRangeModel extends WB_Model
{
    private $_table = [

    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 목록조회
     * @param array $arr
     */
    public function list($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

    }


    /**
     * 등록
     * @param array $params
     */
    public function store()
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
