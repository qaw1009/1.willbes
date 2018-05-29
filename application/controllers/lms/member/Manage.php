<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends \app\controllers\BaseController
{
    protected $models = array('member/member');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사용자 리스트
     * @return CI_Output
     */    
    public function index()
    {

        $this->load->view('member/manage/list', [
        ]);
    }
    
    /**
     * 사용자 리스트
     * @return CI_Output
     */
    public function ajaxList()
    {
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->memberModel->getEncString($search_value); // 검색어 암호화

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_reqP('search_site_code') // 사이트코드
            ],
            'ORG' => [
                'LKB' => [
                    'MemID' => $search_value // 아이디
                ],
                'EQ' => [
                    'MemName' => $search_value, // 이름
                    'PhoneEnc' => $search_value_enc, // 암호화 전화번호 전체
                    'Phone2Enc' => $search_value_enc, // 암호화 전화번호 2번째
                    'Phone3' => $search_value, // 전화번호 3번째
                ]
            ]
        ];

        // 최신 가입순으로
        $orderby = [
          //'JoinDate' => 'DESC'
        ];

        // 회원수
        $count = $this->memberModel->listMember(true, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $orderby);
        // 실제 데이타
        $list = $this->memberModel->listMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $orderby);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}