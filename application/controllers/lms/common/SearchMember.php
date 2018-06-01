<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMember extends \app\controllers\BaseController
{
    protected $models = array('common/searchMember');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원 검색
     * @param array $params
     */
    public function index($params = [])
    {
        // 1번째 원소 리턴
        $view_postfix = array_shift($params);

        // 배열 원소를 2개씩 나누어 1번째는 키, 2번째는 값으로 구성된 파라미터 배열 생성
        $arr_param = array_pluck(array_chunk($params, 2), '1', '0');

        $this->load->view('common/search_member_' . $view_postfix, [
            'arr_param' => $arr_param
        ]);
    }

    /**
     * 회원 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $count = 0;
        $list = [];

        // 검색어가 있는 경우에만 조회
        if (empty($this->_reqP('search_value')) === false) {
            $arr_condition = [
                'ORG' => [
                    'LKB' => [
                        'M.MemName' => $this->_reqP('search_value'),
                        'M.MemId' => $this->_reqP('search_value')
                    ],
                    'EQ' => [
                        'Phone3' => $this->_reqP('search_value'),
                        'PhoneEnc' => $this->searchMemberModel->getEncString($this->_reqP('search_value'))
                    ]
                ]
            ];

            $count = $this->searchMemberModel->listSearchMember(true, $arr_condition);

            if ($count > 0) {
                $list = $this->searchMemberModel->listSearchMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['M.MemIdx' => 'desc']);
            }            
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
