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
            'ORG' => [
                'EQ' => [
                    'Mem.MemID' => $search_value,
                    'Mem.MemIdx' => $search_value,
                    'Mem.MemName' => $search_value,
                    'Mem.PhoneEnc' => $search_value_enc,
                    'Mem.Phone2Enc' => $search_value_enc,
                    'Mem.Phone3' => $search_value,
                    'Info.MailEnc' => $search_value_enc
                ]
            ],
            'EQ' => [
                'Mem.IsChange' => $this->_reqP('IsChange'),
                'Info.SmsRcvStatus' => $this->_reqP('SmsRcv'),
                'Info.MailRcvStatus' => $this->_reqP('MailRcv')
            ]
        ];

        // 최신 가입순으로
        $orderby = [
          'Mem.JoinDate' => 'DESC'
        ];

        $count = $this->memberModel->list(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'), $orderby);

        if($count == 0){
            $list = []; //$this->memberModel->list(false, $arr_condition,
                //$this->_reqP('length'), $this->_reqP('start'), $orderby);
        } else {
            $list = $this->memberModel->list(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), $orderby);
        }


        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function detail($param = [])
    {
        $memIdx = $param[1]; //회원번호
        $viewType = $param[0]; //기본 보기페이지

        $data = null;

        if (empty($params[0]) === false) {

        }

        $data = $this->memberModel->detail($memIdx);

        $this->load->view('member/manage/view', [
            'vtype' => $viewType,
            'data' => $data
        ]);
    }

    public function search()
    {
        $search_value = $this->_reqP('serach_value');
        $search_value_enc = $this->memberModel->getEncString($search_value);

        $arr_condition = [
            'ORG' => [
                'EQ' => [
                    'Mem.MemID' => $search_value,
                    'Mem.MemIdx' => $search_value,
                    'Mem.MemName' => $search_value,
                    'Mem.PhoneEnc' => $search_value_enc,
                    'Mem.Phone2Enc' => $search_value_enc,
                    'Mem.Phone3' => $search_value,
                    'Info.MailEnc' => $search_value_enc
                ]
            ]
        ];
    }
}