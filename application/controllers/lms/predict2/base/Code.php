<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends \app\controllers\BaseController
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

        $data = $this->predict2Model->codeList();
        $subject_data = $this->predict2Model->getSubjectGroupForMockBaseCode();

        $list = [];
        foreach ($data as $key => $val) {
            $list[$key] = $val;
            $list[$key]['SubjectIdxs_S'] = '';
            $list[$key]['SubjectIdxs_E'] = '';
            $list[$key]['SubjectNames_S'] = '';
            $list[$key]['SubjectNames_E'] = '';

            foreach ($subject_data as $subject_row) {
                if ($subject_row['SubjectType'] == 'S') {
                    if ($val['PcIdx'] == $subject_row['PcIdx']) {
                        $list[$key]['SubjectIdxs_S'] = $subject_row['SubjectIdxs'];
                        $list[$key]['SubjectNames_S'] = $subject_row['SubjectNames'];
                    }
                } else if ($subject_row['SubjectType'] == 'E') {
                    if ($val['PcIdx'] == $subject_row['PcIdx']) {
                        $list[$key]['SubjectIdxs_E'] = $subject_row['SubjectIdxs'];
                        $list[$key]['SubjectNames_E'] = $subject_row['SubjectNames'];
                    }
                }
            }
        }

        $this->load->view('predict2/base/code/index', [
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'list' => $list
        ]);
    }

    /**
     * 직렬 등록,수정 폼
     */
    public function createKind()
    {
        $arr_base['cateD1'] = $this->_getCategoryArray();
        $arr_base['cateD2'] = $this->_getTakeMockPartAll(false);

        if ($this->_reqG('act') == 'edit') { // 수정
            $method = 'PUT';
            $arr_condition = [
                'EQ' => [
                    'PcIdx' => $this->_reqG('idx')
                ]
            ];
            $data = $this->predict2Model->findMockData($arr_condition);
            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
        } else { // 등록
            $method = 'POST';
            $data = array();
        }

        $this->load->view('predict2/base/code/create_kind', [
            'arr_base' => $arr_base,
            'method' => $method,
            'data' => $data,
        ]);
    }

    /**
     * 직렬등록
     */
    public function storeKind()
    {
        $rules = [
            ['field' => 'site', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD1', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'cateD2', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'orderNum', 'label' => '정렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predict2Model->storeKind($this->_reqP(null));
        $this->json_result($result, '등록되었습니다.', $result);
    }

    /**
     * 직렬수정
     */
    public function updateKind()
    {
        $rules = [
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'orderNum', 'label' => '정렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;
        $result = $this->predict2Model->updateKind($this->_reqP(null));
        $this->json_result($result, '변경되었습니다.', $result);
    }

    /**
     * 직렬 사용,미사용 전환
     */
    public function useToggle()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];
        if ($this->validate($rules) === false) return;
        $result = $this->predict2Model->useToggle($this->_reqP(null));
        $this->json_result($result, '변경되었습니다.', $result);
    }

    /**
     * 과목 등록,수정폼
     */
    public function createSubject()
    {
        $this->load->library('form_validation');
        $get = array(
            'act' => $this->_reqG('act'),
            'idx' => $this->_reqG('idx'),
            'sjType' => $this->_reqG('sjType')
        );
        $rules = [
            ['field' => 'act', 'label' => 'ACT', 'rules' => 'trim|required|in_list[create,edit]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sjType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]']
        ];
        $this->form_validation->set_data($get);
        if ($this->validate($rules) === false) return;

        $arr_condition = ['EQ' => ['PcIdx' => $this->_reqG('idx')]];
        $mock_data = $this->predict2Model->findMockData($arr_condition);
        if (empty($mock_data) === true) {
            $this->json_error('기본 데이터 조회에 실패했습니다.');
            return;
        }

        $arr_condition = [
            'EQ' => [
                'S.SiteCode' => $mock_data['SiteCode'],
                'S.IsStatus' => 'Y'
            ],
            'ORG' => [
                'EQ' => [
                    'S.IsUse' => 'Y',
                    'MS.IsUse' => 'Y'
                ]
            ]
        ];
        $arr_condition_sub = [
            'EQ' => [
                'MS.PcIdx' => $this->_reqG('idx'),
                'MS.SubjectType' => $this->_reqG('sjType'),
                'MS.IsStatus' => 'Y'
            ]
        ];
        $subject_data = $this->predict2Model->getSubjectForMockBaseCode($arr_condition, $arr_condition_sub);
        if (empty($subject_data) === true) {
            $this->json_error('과목 데이터 조회에 실패했습니다.');
            return;
        }
        $arr_base['cateD1'] = $this->_getCategoryArray();
        $arr_base['cateD2'] = $this->_getTakeMockPart(false);

        $arr_adminInfo = null;
        foreach ($subject_data as $row) {
            if (empty($row['RegAdminIdx']) === false) {
                $arr_adminInfo['RegDatm'] = $row['RegDatm'];
                $arr_adminInfo['RegAdminName'] = $row['RegAdminName'];
            }
            if (empty($row['UpdAdminIdx']) === false) {
                $arr_adminInfo['UpdDatm'] = $row['UpdDatm'];
                $arr_adminInfo['UpdAdminName'] = $row['UpdAdminName'];
            }
        }

        $this->load->view('predict2/base/code/create_subject', [
            'arr_base' => $arr_base,
            'method' => ($this->input->get('act') == 'edit') ? 'PUT' : 'POST',
            'mock_data' => $mock_data,
            'subject_data' => $subject_data,
            'arr_adminInfo' => $arr_adminInfo
        ]);
    }

    /**
     * 과목등록
     */
    public function storeSubject()
    {
        $rules = [
            ['field' => 'subjectIdx[]', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sjType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predict2Model->storeSubject($this->_reqP(null));
        $msg = ($this->_reqP('_method') == 'POST') ? '등록되었습니다.' : '변경되었습니다.';
        $this->json_result($result, $msg, $result);
    }

    /**
     * 모의고사카테고리 검색 팝업 메인
     *
     * Input  $_GET['siteCode'] OR null
     *        $_GET['single'] OR null : 다중검색(변수없거나 N), 단일검색(Y) 여부
     *        $_GET['reg'] : 1.모의고사 기본정보 > 문제영역관리 - null
     *                       2.모의고사 등록 > 과목별 문제등록 - Y
     * Output 부모창 <div id="selected_category"> 안에 생성
     *        1.모의고사 기본정보 > 문제영역관리 - $moLink[] AND "카테고리>직렬>과목" 문자열
     *                                           $moLink[] : lms_predict2_r_subject PrsIdx
     *        2.모의고사 등록 > 과목별문제등록 - $moLink AND "카테고리>직렬>과목 - 문제영역명" 문자열
     *                                           $moLink : lms_predict2_r_category PrcIdx
     * @return CI_Output
     */
    public function moCate()
    {
        if (empty($this->_reqG('siteCode')) === true) {
            return $this->json_error('잘못된 접근입니다.');
        }

        $this->load->view('predict2/search_mockCategory', [
            'siteCode' => $this->_reqG('siteCode'),
            'isSingle' => ($this->_reqG('single') == 'Y') ? true : false,
            'isReg' => ($this->_reqG('reg') == 'Y') ? true : false
        ]);
    }

    public function moCateList()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'isReg', 'label' => 'IsReg', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'MS.IsUse' => 'Y',
                'S.SiteCode' => $this->_reqP('siteCode')
            ],
            'ORG' => [
                'LKB' => [
                    'SJ.SubjectName' => $this->_reqP('sc_fi', true)
                ]
            ],
        ];

        $data = [];
        if (empty($this->_reqP('isReg')) === false) {
            $column = "
                MB.PcIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), '] - ', MA.QuestionArea) AS CateRouteName,
                IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N' OR MA.IsUse = 'N', 'N', 'Y') AS BaseIsUse,
                MC.PrcIdx
            ";
        } else {
            $column = "
                MB.PcIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']') AS CateRouteName,
                (SELECT COUNT(*) FROM lms_predict2_r_category AS MC WHERE MS.PrsIdx = MC.PrsIdx AND MC.IsStatus = 'Y') AS IsExist
            ";
        }
        $count = $this->predict2Model->moCateListAll('', true, $condition, true, $this->_reqP('isReg'));
        if ($count > 0) {
            $data = $this->predict2Model->moCateListAll($column, false, $condition, true, $this->_reqP('isReg'), $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
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