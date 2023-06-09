<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassRoom extends \app\controllers\BaseController
{
    protected $models = array('live/classRoom', 'sys/site', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 강의실관리 인덱스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $list = $this->classRoomModel->listClassRoom([], null, null, ['CIdx' => 'asc']);

        $this->load->view("live/class_room/index", [
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'data' => $list
        ]);
    }

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
            $data = $this->classRoomModel->findClassRoomForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('live/class_room/create', [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    public function store()
    {
        $method = 'add';

        $rules = [
            ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required|integer'],
            ['field' => 'class_room_name', 'label' => '강의실명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';

            $rules = array_merge($rules, [
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->classRoomModel->{$method . 'ClassRoom'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}