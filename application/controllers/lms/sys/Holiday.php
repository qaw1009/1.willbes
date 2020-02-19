<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends \app\controllers\BaseController
{
    protected $models = array('sys/holiday');

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('sys/holiday/list',[
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-12-31')
        ]);
    }

    public function calendar()
    {

    }

    public function ajaxlist()
    {
        $arr_condition = [
            'LKB' => [
                'hDesc' => $this->_reqP('search_value')
            ],
            'GTE' =>[
                'hDate' => $this->_reqP('search_start_date')
            ],
            'LTE' =>[
                'hDate' => $this->_reqP('search_end_date')
            ]
        ];

        $list = [];
        $count = $this->holidayModel->getList($arr_condition, true);

        if ($count > 0) {
            $list = $this->holidayModel->getList($arr_condition,false, $this->_reqP('length'), $this->_reqP('start'), ['hDate' => 'asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function create($params = [])
    {
        if(empty($params[0]) === true){
            $mode = 'add';
        } else {
            $hIdx = $params[0];
            $mode = 'mod';
        }

        if($mode == 'mod'){
            $data = $this->holidayModel->getList(['EQ' => ['H.hIdx' => $hIdx]],false);
            if(empty($data) == true){
                $mode = 'add';
            } else {
                $data = $data[0];
            }
        } else {
            $data = [];
        }
        $this->load->view('sys/holiday/create_modal',[
            'mode' => $mode,
            'data' => $data
        ]);
    }

    public function store()
    {
        $mode = $this->_reqP('mode');
        $hIdx = $this->_reqP('idx');
        $hdate = $this->_reqP('date');
        $hdesc = $this->_reqP('desc');
        $isuse = $this->_reqP('isuse');

        if($mode == 'add'){
            $count = $this->holidayModel->getList(['EQ'=>['hDate' => $hdate]], true);
            if($count != 0){
                return $this->json_error('이미 등록된 날짜입니다.');
            }

            $data = [
                'hDate' => $hdate,
                'hDesc' => $hdesc
            ];

            if($this->holidayModel->store($data) == false){
                return $this->json_error('입력에 실패하였습니다.');
            }
        } else {
            $count = $this->holidayModel->getList([
                'EQ' => [
                    'hDate' => $hdate,
                ],
                'NOT' => [
                    'hIdx' => $hIdx
                ]
            ], true);
            if($count != 0){
                return $this->json_error('이미 등록된 날짜입니다.');
            }

            $data = [
                'hDate' => $hdate,
                'hDesc' => $hdesc,
                'IsUse' => $isuse
            ];

            if($this->holidayModel->set($data, $hIdx) == false){
                return $this->json_error('입력에 실패하였습니다.');
            }
        }

        return $this->json_result(true,'처리되었습니다.');
    }

}
