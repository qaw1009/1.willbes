<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends \app\controllers\BaseController
{
    protected $models = array('site/banner', 'sys/code');
    protected $helpers = array();

    //배너 : 노출섹션, 배너위치 그룹공통코드
    private $_groupCcd = [
        'banner_disp' => '657',   //노출섹션
        'banner_location' => '658'   //배너위치
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 배너 관리 인덱스
     */
    public function index()
    {
        //배너노출섹션, 배너위치
        $banner_info = $this->codeModel->getCcdInArray([$this->_groupCcd['banner_disp'], $this->_groupCcd['banner_location']]);

        $this->load->view('site/banner/index',[
            'banner_disp' => $banner_info[$this->_groupCcd['banner_disp']],
            'banner_location' => $banner_info[$this->_groupCcd['banner_location']]
        ]);
    }

    public function listAjax()
    {
        $this->load->helper('file');
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->bannerModel->listAllBanner(true, $arr_condition);
        if ($count > 0) {
            $list = $this->bannerModel->listAllBanner(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['BIdx' => 'desc']);

            foreach ($list as $key => $val) {
                $img_real_path = public_to_upload_path($list[$key]['BannerFullPath'].$list[$key]['BannerImgName']);
                $list[$key]['BannerImgInfo'] = @getimagesize($img_real_path);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 배너 등록/수정
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $b_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $b_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.BIdx' => $b_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->bannerModel->findBannerForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->bannerModel->listBannerCategory($b_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        }

        //배너노출섹션, 배너위치
        $banner_info = $this->codeModel->getCcdInArray([$this->_groupCcd['banner_disp'], $this->_groupCcd['banner_location']]);

        $this->load->view("site/banner/create", [
            'method' => $method,
            'data' => $data,
            'b_idx' => $b_idx,
            'banner_disp' => $banner_info[$this->_groupCcd['banner_disp']],
            'banner_location' => $banner_info[$this->_groupCcd['banner_location']]
        ]);
    }

    /**
     * 배너 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'banner_disp', 'label' => '노출섹션', 'rules' => 'trim|required'],
            ['field' => 'banner_location', 'label' => '배너위치', 'rules' => 'trim|required'],
            ['field' => 'banner_name', 'label' => '배너명', 'rules' => 'trim|required'],
            ['field' => 'link_type', 'label' => '링크방식', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'link_url', 'label' => '링크주소', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('b_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'attach_img', 'label' => '배너이미지', 'rules' => 'callback_validateFileRequired[attach_img]']
            ]);

            //사이트코드 통합코드가 아닐경우 카테고리 체크
            if ($this->_reqP('site_code') != config_item('app_intg_site_code')) {
                $rules = array_merge($rules, [
                    ['field' => 'cate_code[]', 'label' => '카테고리', 'rules' => 'trim|required']
                ]);
            }
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'b_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->bannerModel->{$method . 'Banner'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 배너 삭제
     */
    public function delBanner()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $params = json_decode($this->_req('params'), true);
        $result = $this->bannerModel->delBanner($params);
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 정렬 변경 리스트페이지
     */
    public function listReOrderModal()
    {
        $this->load->helper('file');
        $arr_condition = [];

        //배너노출섹션, 배너위치
        $banner_info = $this->codeModel->getCcdInArray([$this->_groupCcd['banner_disp'], $this->_groupCcd['banner_location']]);

        $list = $this->bannerModel->listAllBanner(false, $arr_condition, null, null, ['SiteCode' => 'asc', 'OrderNum' => 'asc', 'BIdx' => 'desc']);

        foreach ($list as $key => $val) {
            $img_real_path = public_to_upload_path($list[$key]['BannerFullPath'].$list[$key]['BannerImgName']);
            $list[$key]['BannerImgInfo'] = @getimagesize($img_real_path);
        }

        $this->load->view("site/banner/list_reorder_modal", [
            'banner_disp' => $banner_info[$this->_groupCcd['banner_disp']],
            'banner_location' => $banner_info[$this->_groupCcd['banner_location']],
            'data' => $list
        ]);
    }

    /**
     * 정렬 변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->bannerModel->modifyBannerReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.DispCcd' => $this->_reqP('search_banner_disp'),
                'A.BannerLocationCcd' => $this->_reqP('search_banner_location'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.BannerName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 유효기간 검색
            $arr_condition['BET'] = [
                'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}