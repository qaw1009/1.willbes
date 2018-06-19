<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends \app\controllers\BaseController
{
    protected $models = array('offline/consult', 'sys/site', 'sys/category');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상담일정관리
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("offline/consult/schedule/index", [
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 일정등록
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->consultModel->findConsultScheduleForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('offline/consult/schedule/create', [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'idx' => $idx,
            'data' => $data
        ]);
    }
}