<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWBook extends \app\controllers\BaseController
{
    protected $models = array('common/searchWBook', 'sys/wCode');
    protected $helpers = array();
    private $_ccd = [
        'Sale' => '112'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재 검색
     */
    public function index()
    {
        $this->load->view('common/search_wbook', [
            'sale_ccd' => $this->wCodeModel->getCcd($this->_ccd['Sale'])
        ]);
    }

    /**
     * 교재 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'B.wSaleCcd' => $this->_reqP('search_sale_ccd')
            ],
            'ORG1' => [
                'LKB' => [
                    'B.wBookIdx' => $this->_reqP('search_value'),
                    'B.wBookName' => $this->_reqP('search_value'),
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'B.wPublName' => $this->_reqP('search_publ_author'),
                    'B.wAuthorNames' => $this->_reqP('search_publ_author'),
                ]
            ],
        ];

        $list = [];
        $count = $this->searchWBookModel->listSearchBook(true, $arr_condition);

        if ($count > 0) {
            $list = $this->searchWBookModel->listSearchBook(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['B.wBookIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
