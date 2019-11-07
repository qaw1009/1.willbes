<?php
/**
 * ======================================================================
 * 모의고사 기본정보관리 > 공통코드관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Code extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/baseCode');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_site_codes(true, false);
        $def_site_code = key($arr_site_code);

        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['subject'] = $this->getSubjectArray();

        $data = $this->baseCodeModel->list();
        $subject_data = $this->mockCommonModel->getSubjectGroupForMockBaseCode();

        $list = [];
        foreach ($data as $key => $val) {
            $list[$key] = $val;
            $list[$key]['SubjectIdxs_S'] = '';
            $list[$key]['SubjectIdxs_E'] = '';
            $list[$key]['SubjectNames_S'] = '';
            $list[$key]['SubjectNames_E'] = '';

            foreach ($subject_data as $subject_row) {
                if ($subject_row['SubjectType'] == 'S') {
                    if ($val['MmIdx'] == $subject_row['MmIdx']) {
                        $list[$key]['SubjectIdxs_S'] = $subject_row['SubjectIdxs'];
                        $list[$key]['SubjectNames_S'] = $subject_row['SubjectNames'];
                    }
                } else if ($subject_row['SubjectType'] == 'E') {
                    if ($val['MmIdx'] == $subject_row['MmIdx']) {
                        $list[$key]['SubjectIdxs_E'] = $subject_row['SubjectIdxs'];
                        $list[$key]['SubjectNames_E'] = $subject_row['SubjectNames'];
                    }
                }
            }
        }

        $this->load->view('mocktestNew/base/code/index', [
            'arr_site_code' => $arr_site_code,
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
        if ($this->_reqG('act') == 'edit') { // 수정
            $method = 'PUT';
            $arr_condition = [
                'EQ' => [
                    'MmIdx' => $this->_reqG('idx')
                ]
            ];
            $data = $this->baseCodeModel->findMockData($arr_condition);
            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
        } else { // 등록
            $method = 'POST';
            $data = array();
        }

        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->codeModel->getCcd($this->config->item('sysCode_kind', 'mock'));

        $this->load->view('mocktestNew/base/code/create_kind', [
            'arr_base' => $arr_base,
            'method' => $method,
            'data' => $data,
        ]);
    }

    /**
     * 직렬 등록
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

        $result = $this->baseCodeModel->storeKind($this->_reqP(null));
        $this->json_result($result, '등록되었습니다.', $result);
    }

    /**
     * 직렬 수정
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

        $result = $this->baseCodeModel->updateKind();
        if ($result)
            $this->json_result($result, '변경되었습니다.', $result);
        else
            $this->json_error('변경에 실패했습니다.');
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
            ['field' => 'sjType', 'label' => '과목타입', 'rules' => 'trim|required|in_list[E,S]'],
        ];
        $this->form_validation->set_data($get);
        if ($this->validate($rules) === false) return;

        $arr_condition = ['EQ' => ['MmIdx' => $this->_reqG('idx')]];
        $mock_data = $this->baseCodeModel->findMockData($arr_condition);
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
                'MS.MmIdx' => $this->_reqG('idx'),
                'MS.SubjectType' => $this->_reqG('sjType'),
                'MS.IsStatus' => 'Y'
            ]
        ];
        $subject_data = $this->mockCommonModel->getSubjectForMockBaseCode($arr_condition, $arr_condition_sub);
        if (empty($subject_data) === true) {
            $this->json_error('과목 데이터 조회에 실패했습니다.');
            return;
        }
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->codeModel->getCcd($this->config->item('sysCode_kind', 'mock'));

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

        $this->load->view('mocktestNew/base/code/create_subject', [
            'arr_base' => $arr_base,
            'method' => ($this->input->get('act') == 'edit') ? 'PUT' : 'POST',
            'mock_data' => $mock_data,
            'subject_data' => $subject_data,
            'arr_adminInfo' => $arr_adminInfo
        ]);
    }

    /**
     * 과목 등록,수정
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

        $result = $this->baseCodeModel->storeSubject($this->_reqP(null));
        $msg = ($this->input->post('_method') == 'POST') ? '등록되었습니다.' : '변경되었습니다.';
        $this->json_result($result, $msg, $result);
    }

    /**
     * 사용,미사용 전환
     */
    public function useToggle()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'isUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->baseCodeModel->useToggle($this->_reqP(null));
        $this->json_result($result, '변경되었습니다.', $result);
    }
}