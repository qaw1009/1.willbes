<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CronLog extends \app\controllers\BaseController
{
    protected $models = array('sys/cron');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 스케줄러 실행로그 인덱스
     */
    public function index()
    {
        $this->load->view('sys/cron_log/index', [
            'arr_task_type' => $this->cronModel->_task_type
        ]);
    }

    /**
     * 스케줄러 실행로그 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CL.TaskType' => $this->_reqP('search_task_type'),
                'CL.ResultCode' => $this->_reqP('search_result_code')
            ],
            'BET' => [
                'CL.ExecDate' => [
                    str_replace('-', '', $this->_reqP('search_start_date')), str_replace('-', '', $this->_reqP('search_end_date'))
                ]
            ]
        ];

        $list = [];
        $count = $this->cronModel->listRunSchedulerLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->cronModel->listRunSchedulerLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CL.ExecDate' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}