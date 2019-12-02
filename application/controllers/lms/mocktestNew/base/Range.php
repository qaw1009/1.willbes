<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Range extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/baseRange');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);

        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['subject'] = $this->getSubjectArray();

        $data = $this->baseRangeModel->list();
        $moData = $this->_moDataListAll();

        $this->load->view('mocktestNew/base/range/index', [
            'arr_site_code' => $arr_site_code,
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
        $arr_site_code = $this->getSiteCode();
        $def_site_code = '';

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            $data = $this->baseRangeModel->getMockArea($params[0]);
            $chData = $this->baseRangeModel->getMockAreaList($params[0]);
            list($moCate_name, $moCate_isUse) = $this->baseRangeModel->getMockAreaListForCate($params[0]);

            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
            $def_site_code = $data['SiteCode'];
        }

        $this->load->view('mocktestNew/base/range/create', [
            'arr_site_code' => $arr_site_code,
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

        $result = $this->baseRangeModel->{$method . 'MockArea'}($this->_reqP(null));
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

        $result = $this->baseRangeModel->storeChapter($this->_reqP(null));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /**
     * 카테고리 조회
     * @return array
     */
    private function _moDataListAll()
    {
        $column = "
            MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
            CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
            IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS BaseIsUse
        ";
        $moCate = $this->mockCommonModel->moCateListAll($column);
        $moList = [];
        foreach ($moCate as $it) {
            $moList[$it['MrsIdx']] = [
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
     * 데이터 복사
     */
    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'idx', 'label' => '기본정보식별자', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseRangeModel->copyData($this->_reqP('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }

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
        $data = $this->baseRangeModel->list($arr_condition);
        $moData = $this->_moDataListAll();

        $this->load->view('mocktestNew/search_mockArea', [
            'siteCode' => $site_code,
            'data' => $data,
            'moData' => $moData
        ]);
    }
}