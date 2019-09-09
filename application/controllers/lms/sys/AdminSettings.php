<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSettings extends \app\controllers\BaseController
{
    protected $models = array('sys/adminSettings');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 환경설정 등록 폼
     */
    public function create()
    {
        // 기 설정된 정보 조회
        $data = $this->adminSettingsModel->listSettings([
            'EQ' => ['wAdminIdx' => $this->session->userdata('admin_idx')],
            'NOT' => ['SettingType' => 'favorite'],
            'RAW' => ['SettingType not like' => ' "searchSetting_%"']
        ]);

        if (count($data) > 0) {
            $method = 'PUT';
            $data = array_pluck($data, 'SettingValue', 'SettingType');
        } else {
            $method = 'POST';
            $data = null;
        }

        $this->load->view('sys/admin_settings/create', [
            'method' => $method,
            'data' => $data,
        ]);
    }

    /**
     * 환경설정 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'sidebar_size', 'label' => 'LNB메뉴 설정', 'rules' => 'trim|required|in_list[md,sm]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
        ];

        if ($this->_reqP('_method') === 'PUT') {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminSettingsModel->{$method . 'Settings'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 즐겨찾기 추가/삭제
     */
    public function favorite()
    {
        $rules = [
            ['field' => 'menu_idx', 'label' => '메뉴식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminSettingsModel->replaceFavorite($this->_reqP('menu_idx', false));

        $this->json_result($result, '처리 되었습니다.', $result);
    }

    /**
     * 검색 값 기본 셋팅
     */
    public function searchSetting()
    {
        $rules = [
            ['field' => 'setting_bm_idx', 'label' => '셋팅식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminSettingsModel->storeSearchSetting($this->_reqP(null, false));

        $this->json_result($result, '처리 되었습니다.', $result);
    }
}