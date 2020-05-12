<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Range extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'predict/predict2');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $def_site_code = '2001';
        $arr_base['cateD1'] = $this->_getCategoryArray();
        $arr_base['cateD2'] = $this->_getTakeMockPart(false);
        $arr_base['subject'] = $this->_getSubjectArray();

        $data = $this->predict2Model->areaRangeList();
        $moData = $this->_moDataListAll();

        $this->load->view('predict2/base/range/index', [
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'data' => $data,
            'moData' => $moData
        ]);
    }

    /**
     * 문제영역 등록폼
     * @param array $params
     */
    public function create($params = [])
    {
        $data = $chData = null;
        $moCate_name = $moCate_isUse = [];
        $def_site_code = '';

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            $data = $this->predict2Model->getMockArea($params[0]);
            $chData = $this->predict2Model->getMockAreaList($params[0]);
            list($moCate_name, $moCate_isUse) = $this->predict2Model->getMockAreaListForCate($params[0]);

            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
            $def_site_code = $data['SiteCode'];
        }

        $this->load->view('predict2/base/range/create', [
            'def_site_code' => $def_site_code,
            'method' => $method,
            'data' => $data,
            'chData' => $chData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'isCopy' => ( isset($params[1]) && $params[1] == 'copy' ) ? true : false
        ]);
    }

    /**
     * 문제영역 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'questionArea', 'label' => '문제영역명', 'rules' => 'trim|required|max_length[20]'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'moLink[]', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero']
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            if($this->input->post('isCopy')) {
                $rules = array_merge($rules, [
                    ['field' => 'moLink[]', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
                    ['field' => 'moLink_be[]', 'label' => '이전 카테고리', 'rules' => 'trim|required|is_natural_no_zero']
                ]);
            }
        } else {
            $rules = array_merge($rules, [
                ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero']
            ]);
        }
        if ($this->validate($rules) === false) return;

        $result = $this->predict2Model->{$method . 'MockArea'}($this->_reqP(null));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 문제영역 출제챕터 등록,수정
     */
    public function storeChapter()
    {
        $rules = [
            ['field' => 'areaName[]', 'label' => '영역명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'orderNum[]', 'label' => '정렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse[]', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'chapterTotal[]', 'label' => '챕터 tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => '챕터 eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => '챕터 dIDX', 'rules' => 'trim|is_natural_no_zero']
        ];
        if ($this->validate($rules) === false) return;

        if( count($this->_reqP('orderNum')) != count(array_unique($this->_reqP('orderNum'))) ) {
            $this->json_error('정렬번호가 중복되어 있습니다.');
            return;
        }

        $result = $this->predict2Model->storeChapter($this->_reqP(null));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /**
     * 문제영역조회 팝업
     * @return CI_Output
     */
    public function searchArea()
    {
        if (empty($this->_reqG('siteCode')) === true) {
            return $this->json_error('잘못된 접근입니다.');
        }
        $site_code = $this->_reqG('siteCode');

        $arr_condition = [
            'EQ' => [
                'MB.SiteCode' => $site_code,
                'MB.IsUse' => 'Y'
            ]
        ];
        $data = $this->predict2Model->areaRangeList($arr_condition);
        $moData = $this->_moDataListAll();

        $this->load->view('predict2/search_mockArea', [
            'siteCode' => $site_code,
            'data' => $data,
            'moData' => $moData
        ]);
    }

    /**
     * 카테고리 조회
     * @return array
     */
    private function _moDataListAll()
    {
        $column = "
            MB.PcIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
            CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
            IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
        ";
        $moCate = $this->predict2Model->moCateListAll($column);
        $moList = [];
        foreach ($moCate as $it) {
            $moList[$it['PrsIdx']] = [
                'cate1'   => $it['CateCode1'],
                'cate2'   => $it['CateCode2'],
                'subject' => $it['SubjectIdx'],
                'name'    => $it['CateRouteName'],
                'bIsUse'   => $it['BaseIsUse'],
            ];
        }
        return $moList;
    }

    /**
     * 카테고리 조회
     * @param string $site_code
     * @return array
     */
    private function _getCategoryArray($site_code = '')
    {
        return $this->categoryModel->getCategoryArray($site_code, '', '', 1);
    }

    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    private function _getTakeMockPart($isUseChk = true)
    {
        return $this->predict2Model->getTakeMockPart($isUseChk);
    }

    /**
     * 직렬(운영코드) 전체 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    private function _getTakeMockPartAll($isUseChk = true)
    {
        return $this->predict2Model->getTakeMockPartAll($isUseChk);
    }

    /**
     * 과목 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    private function _getSubjectArray($site_code = '')
    {
        return $this->subjectModel->getSubjectArray($site_code);
    }
}