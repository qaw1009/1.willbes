<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disp extends \app\controllers\BaseController
{
    protected $models = array('site/bannerDisp', 'sys/code', 'sys/category');
    protected $helpers = array();

    //배너 : 노출섹션, 배너위치 그룹공통코드
    private $_groupCcd = [
        'banner_disp' => '664',   //노출방식
        'banner_rolling_type' => '665',   //롤링방식
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 배너섹션관리 인덱스
     */
    public function index()
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

        //배너노출방식
        $disp_info = $this->codeModel->getCcd($this->_groupCcd['banner_disp']);

        $this->load->view('site/banner/disp_index',[
            'arr_cate_code' => $category_data,
            'arr_disp_info' => $disp_info
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->bannerDispModel->listAllBannerDisp(true, $arr_condition);
        if ($count > 0) {
            $list = $this->bannerDispModel->listAllBannerDisp(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['BdIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 배너섹션관리 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $bd_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $bd_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.BdIdx' => $bd_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->bannerDispModel->findBannerDispForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        //배너노출방식
        $ccd_codes = $this->codeModel->getCcdInArray(array_values($this->_groupCcd));

        $this->load->view("site/banner/disp_create", [
            'method' => $method,
            'disp_info' => $ccd_codes[$this->_groupCcd['banner_disp']],
            'disp_rolling_type' => $ccd_codes[$this->_groupCcd['banner_rolling_type']],
            'data' => $data,
            'bd_idx' => $bd_idx,
        ]);
    }

    /**
     * 배너섹션관리 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'disp_name', 'label' => '노출섹션명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'disp_type', 'label' => '노출방식', 'rules' => 'trim|required'],
            ['field' => 'disp_rolling_time', 'label' => '롤링타임', 'rules' => 'callback_validateRequiredIf[disp_type,664002]|in_list[1,2,3]'],
            ['field' => 'disp_rolling_type', 'label' => '롤링방식', 'rules' => 'callback_validateRequiredIf[disp_type,664002]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('bd_idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'bd_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->bannerDispModel->{$method . 'BannerDisp'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.DispTypeCcd' => $this->_reqP('search_banner_disp_type'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'LKR' => [
                'A.CateCode' => $this->_reqP('search_cate_code')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.DispName' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if (empty($this->_reqP('search_start_date')) === false && empty($this->_reqP('search_end_date')) === false) {
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}