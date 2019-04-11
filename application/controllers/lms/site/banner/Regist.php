<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('site/bannerRegist', 'site/bannerDisp', 'sys/code', 'sys/category', 'sys/site');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 배너 관리 인덱스
     */
    public function index()
    {
        //카테고리 조회
        $category_data = $this->_getCategoryArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 노출섹션 데이터 조회
        $arr_disp_data = $this->bannerDispModel->getBannerDispList('BdIdx, SiteCode, CateCode, DispName, DispTypeCcd, DispRollingTime');

        $this->load->view('site/banner/index',[
            'arr_cate_code' => $category_data,
            'arr_disp_data' => $arr_disp_data,
            'arr_campus' => $arr_campus
        ]);
    }

    public function listAjax()
    {
        $this->load->helper('file');
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->bannerRegistModel->listAllBanner(true, $arr_condition);
        if ($count > 0) {
            $list = $this->bannerRegistModel->listAllBanner(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.BIdx' => 'desc']);

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

        //카테고리 조회
        $category_data = $this->_getCategoryArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        // 노출섹션 데이터 조회
        $arr_disp_data = $this->bannerDispModel->getBannerDispList('BdIdx, SiteCode, CateCode, DispName, DispTypeCcd, DispRollingTime');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $b_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.BIdx' => $b_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->bannerRegistModel->findBannerForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("site/banner/create", [
            'method' => $method,
            'data' => $data,
            'b_idx' => $b_idx,
            'arr_cate_code' => $category_data,
            'arr_disp_data' => $arr_disp_data,
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 배너 등록/수정
     */
    public function store()
    {
        // 캠퍼스 Y 값 조회 (사용안함)
        //$offLineSite_list = $this->siteModel->getOffLineSiteArray();

        $rules = [
            ['field' => 'banner_disp_idx', 'label' => '노출섹션', 'rules' => 'trim|required'],
            ['field' => 'banner_name', 'label' => '배너명', 'rules' => 'trim|required'],
            ['field' => 'link_type', 'label' => '링크방식', 'rules' => 'trim|required|in_list[self,blank,layer,popup]'],
            ['field' => 'link_url', 'label' => '링크주소', 'rules' => 'trim|required'],
            ['field' => 'pop_width', 'label' => '팝업width', 'rules' => 'callback_validateRequiredIf[link_type,popup]'],
            ['field' => 'pop_height', 'label' => '팝업height', 'rules' => 'callback_validateRequiredIf[link_type,popup]']
        ];

        if (empty($this->_reqP('b_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'cate_code', 'label' => '카테고리정보', 'rules' => 'trim|required'],
                ['field' => 'attach_img', 'label' => '배너이미지', 'rules' => 'callback_validateFileRequired[attach_img]'],
                /*['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|integer|callback_validateRequiredIf[site_code,' . implode(',', array_keys($offLineSite_list)) . ']'],*/
            ]);
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

        $result = $this->bannerRegistModel->{$method . 'Banner'}($this->_reqP(null, false));

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
        $result = $this->bannerRegistModel->delBanner($params);
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 정렬 변경 리스트페이지
     */
    public function listReOrderModal()
    {
        $this->load->helper('file');
        $arr_condition = [];

        //카테고리 조회
        $category_data = $this->_getCategoryArray();

        // 노출섹션 데이터 조회
        $arr_disp_data = $this->bannerDispModel->getBannerDispList('BdIdx, SiteCode, CateCode, DispName, DispTypeCcd, DispRollingTime');

        $list = $this->bannerRegistModel->listAllBanner(false, $arr_condition, null, null, ['A.SiteCode' => 'asc', 'A.BdIdx' => 'asc', 'A.OrderNum' => 'asc', 'A.BIdx' => 'desc']);

        foreach ($list as $key => $val) {
            $img_real_path = public_to_upload_path($list[$key]['BannerFullPath'].$list[$key]['BannerImgName']);
            $list[$key]['BannerImgInfo'] = @getimagesize($img_real_path);
        }

        $this->load->view("site/banner/list_reorder_modal", [
            'data' => $list,
            'arr_cate_code' => $category_data,
            'arr_disp_data' => $arr_disp_data
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

        $result = $this->bannerRegistModel->modifyBannerReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사용되지 않은 이벤트용 배너 검색 리스트
     * @param array $params
     */
    public function searchBannerForEventLectureModal($params = [])
    {
        $site_code = $params[0];
        $this->load->view('site/banner/search_banner_modal',[
            'site_code' => $site_code
        ]);
    }

    public function searchBannerForEventLectureAjax()
    {
        $site_code = $this->_reqP('site_code');
        $arr_condition = [
            'ORG2' => [
                'LKB' => [
                    'a.BannerName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->bannerRegistModel->listSearchBannerForEvent(true, $arr_condition, $site_code);

        if ($count > 0) {
            $list = $this->bannerRegistModel->listSearchBannerForEvent(false, $arr_condition, $site_code, $this->_reqP('length'), $this->_reqP('start'), ['C.RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 카테고리 조회 (전체카테고리 값 추가)
     * @return array
     */
    private function _getCategoryArray()
    {
        $total_category_data = [];
        foreach (get_auth_site_codes(false, true) as $site_code) {
            $total_category_data[] = [
                'SiteCode' => $site_code,
                'CateCode' => '0',
                'CateName' => '전체카테고리',
                'ParentCateCode' => '0',
                'GroupCateCode' => '0',
                'CateDepth' => '1'
            ];
        }
        // 카테고리 조회
        $category_data = $this->categoryModel->getCategoryArray('', '', '', 1);
        $category_data = array_merge($total_category_data, $category_data);

        return $category_data;
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
                'A.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'A.BdIdx' => $this->_reqP('search_banner_disp_idx'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.BannerName' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (empty($this->_reqP('search_cate_code')) === false) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'A.CateCode' => explode('_', $this->_reqP('search_cate_code'))[1]
            ]);
        }

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            if ($this->_reqP('search_date_type') == 'I') {
                // 유효기간 검색
                $arr_condition['ORG2']['BET'] = [
                    'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                    'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                ];
                $arr_condition['ORG2']['RAW'] = ['(A.DispStartDatm < "' => $this->_reqP('search_start_date') . '" AND A.DispEndDatm > "' . $this->_reqP('search_end_date') . '")'];
            } elseif ($this->_reqP('search_date_type') == 'R') {
                // 등록일 기간 검색
                $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
            }
        }

        return $arr_condition;
    }
}