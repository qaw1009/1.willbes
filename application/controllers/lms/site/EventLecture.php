<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLecture extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 이벤트/설명회/특강관리 인텍스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("site/event_lecture/index", [
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
     * 이벤트/설명회/특강관리 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $el_idx = null;

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $el_idx = $params[0];
        }

        $this->load->view("site/event_lecture/create", [
            'method' => $method,
            'data' => $data,
            'p_idx' => $el_idx,
            'arr_campus' => $arr_campus,
            'campus_all_ccd' => $this->codeModel->campusAllCcd,
            'offLineSite_list' => $offLineSite_list,
        ]);
    }
}