<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professors extends \app\controllers\RestController
{
    protected $models = array('_willbes/product/professorF');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수 조회
     * @example /product/professors/index/{prof_idx}/?site_code={value}&is_refer={Y/N}&is_count={Y/N}&limit={value}&offset={value}&order_by={value}&order_dir={asc/desc}
     * @param null|int $prof_idx
     */
    public function index_get($prof_idx = null)
    {
        // 조회조건
        $arr_condition = [
            'EQ' => [
                'PF.Profidx' => $prof_idx,
                'PF.SiteCode' => $this->_req('site_code'),
            ]
        ];

        // 조회 구분
        $column = false;
        if ($this->_req('is_count') == 'Y') {
            $column = true;
        }

        // 추가 조회 컬럼
        $arr_add_column = null;
        if ($this->_req('is_refer') == 'Y') {
            $arr_add_column = ['ProfReferData'];
        }

        // 정렬순서
        $arr_order_by = ['PF.Profidx' => 'desc'];
        $order_by = $this->_req('order_by');
        $order_dir = $this->_req('order_dir');

        if (empty($order_by) === false && empty($order_dir) === false) {
            $arr_order_by = [$order_by => $order_dir];
        }

        // 데이터 조회
        $data = $this->professorFModel->listProfessor($column, $arr_condition, $this->_req('limit'), $this->_req('offset'), $arr_order_by, $arr_add_column);

        if (empty($prof_idx) === false) {
            $data = element('0', $data, []);
        }

        return $this->api_success(null, $data);
    }
}
