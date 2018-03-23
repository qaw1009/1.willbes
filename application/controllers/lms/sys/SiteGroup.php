<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteGroup
{
    private $_CI;

    public function __construct()
    {
        $this->_CI =& get_instance();

        // load model
        $this->_CI->load->_loadModels(['sys/siteGroup']);
    }

    /**
     * 사이트 그룹관리 인덱스
     */
    public function index()
    {
        $list = $this->_CI->siteGroupModel->listSiteGroup([], null, null, ['S.SiteGroupCode' => 'asc']);

        $this->_CI->load->view('sys/site_group/index', [
            'data' => $list
        ]);
    }

    /**
     * 사이트 그룹 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[1]) === false) {
            $method = 'PUT';
            $idx = $params[1];
            $data = $this->_CI->siteGroupModel->findSiteGroupForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->_CI->load->view('sys/site_group/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    /**
     * 사이트 그룹 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'site_group_name', 'label' => '사이트 그룹명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_CI->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->siteGroupModel->{$method . 'SiteGroup'}($this->_CI->_reqP(null, false));

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }
}