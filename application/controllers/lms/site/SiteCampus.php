<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteCampus extends \app\controllers\BaseController
{
    protected $models = array('site/siteCampus', 'sys/site', 'sys/code');
    protected $helpers = array('file');
    private $_campus_group_ccd = '605';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사이트 캠퍼스 정보 인덱스
     */
    public function index()
    {
        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        
        // 캠퍼스 정보 조회
        $list = $this->siteCampusModel->listSiteCampusInfo([], null, null, ['SC.ScInfoIdx' => 'desc']);

        $this->load->view('site/site_campus/index', [
            'arr_site_code' => $arr_site_code,
            'data' => $list
        ]);
    }

    /**
     * 사이트 캠퍼스 정보 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = element('0', $params);
        $data = null;

        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);

        // 캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusAll();

        if (empty($idx) === false) {
            $method = 'PUT';
            $data = $this->siteCampusModel->findSiteCampusInfoForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('site/site_campus/create', [
            'method' => $method,
            'idx' => $idx,
            'arr_site_code' => $arr_site_code,
            'arr_campus' => $arr_campus,
            'data' => $data
        ]);
    }

    /**
     * 사이트 캠퍼스 정보 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required'],
            ['field' => 'tel', 'label' => '연락처', 'rules' => 'trim|required'],
            ['field' => 'addr1', 'label' => '주소1', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        } else {
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
                ['field' => 'map_img', 'label' => '맵이미지', 'rules' => 'callback_validateFileRequired[map_img]']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->siteCampusModel->{$method . 'SiteCampusInfo'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}