<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayLog extends \app\controllers\BaseController
{
    protected $models = array('bms/npay');
    protected $helpers = array();
    private $_codes = [
        'ApiType' => ['OR' => '주문등록'],
        'ApiPattern' => ['ORP' => '상품상세', 'ORC' => '회원장바구니', 'ORG' => '비회원장바구니'],
        'AppDevice' => ['P' => 'PC', 'M' => '모바일', 'A' => 'APP']
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 네이버페이 연동로그 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('bms/npay_log/index', [
            'codes' => $this->_codes
        ]);
    }

    /**
     * 네이버페이 연동로그 목록 조회
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $arr_condition = [
            'BDT' => ['RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]],
            'EQ' => [
                'ApiType' => $this->_reqP('search_api_type'),
                'ApiPattern' => $this->_reqP('search_api_pattern'),
                'AppDevice' => $this->_reqP('search_app_device'),
                'ResultCode' => $this->_reqP('search_result_code'),
            ]
        ];

        if ($this->_reqP('search_is_member') == 'Y') {
            $arr_condition['RAW']['MemIdx is'] = ' not null';
        } elseif ($this->_reqP('search_is_member') == 'N') {
            $arr_condition['RAW']['MemIdx is'] = ' null';
        }

        $list = [];
        $count = $this->npayModel->listNpayLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->npayModel->listNpayLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['ApiLogIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'codes' => $this->_codes
        ]);
    }
}
