<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('_lms/product/base/subject','_lms/product/base/professor','correct/btobOffLecture','correct/btobCorrect');
    protected $helpers = array('download');
    private $_sess_btob_idx = null;
    private $_sess_btob_site_code = null;

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
        $this->_sess_btob_site_code = $this->session->userdata('btob.site_code'); // 제휴사메핑 사이트코드
    }

    public function index()
    {
        redirect(front_url('/correct/regist/product/'));
    }

    /**
     * 상품관련 첨삭게시판 인덱스
     */
    public function product()
    {
        $this->load->view('correct/regist/product_index',[
            'arr_subject' => $this->subjectModel->getSubjectArray($this->_sess_btob_site_code),
            'arr_professor' => $this->professorModel->getProfessorArray($this->_sess_btob_site_code,null,['wProfName_order_by' => 'asc', 'WP.wProfName' => 'asc']),
        ]);
    }

    public function productListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_sess_btob_site_code,
                'A.IsStatus' => 'Y',
                'A.ProdTypeCcd' => $this->btobOffLectureModel->_ccd['prod_type'],
                'B.LearnPatternCcd' => $this->btobOffLectureModel->_ccd['learn_pattern'],
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
            ],
            'LKB' => [
                'E.ProfIdx_String' => $this->_reqP('search_prof_idx'),
                'A.ProdCode' => $this->_reqP('search_value'),
                'A.ProdName' => $this->_reqP('search_value'),
            ],
        ];

        $list = [];
        $count = $this->btobOffLectureModel->listLecture(true, $arr_condition,null,null,[]);

        if ($count > 0) {
            $list = $this->btobOffLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 회차관리 인덱스
     * @param array $params
     */
    public function unit($params = [])
    {
        $arr_base['site_code'] = $this->_sess_btob_site_code;
        $arr_base['prod_code'] = $params[0];

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdCode' => $arr_base['prod_code'],
                'A.SiteCode' => $arr_base['site_code'],
                'A.IsStatus' => 'Y',
                'A.ProdTypeCcd' => $this->btobOffLectureModel->_ccd['prod_type'],
                'B.LearnPatternCcd' => $this->btobOffLectureModel->_ccd['learn_pattern'],
            ]
        ];
        $data = $this->btobOffLectureModel->listLecture(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc']);
        if (empty($data) === true) {
            show_error('조회된 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }
        $product_data = $data[0];

        $this->load->view('correct/regist/unit_index',[
            'arr_base' => $arr_base,
            'product_data' => $product_data
        ]);
    }

    public function unitListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CU.SiteCode' => $this->_reqP('site_code'),
                'CU.ProdCode' => $this->_reqP('prod_code'),
                'CU.IsUse' => $this->_reqP('search_is_use'),
                'CU.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'CU.Title' => $this->_reqP('search_value'),
                    'CU.Content' => $this->_reqP('search_value'),
                ]
            ],
        ];

        $list = [];
        $count = $this->btobCorrectModel->listCorrectUnit(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobCorrectModel->listCorrectUnit(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CU.CorrectIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 회차등록/수정
     * @param array $params
     */
    public function unitCreateModal($params = [])
    {
        $method = 'POST';
        $correct_idx = '';
        $data = null;

        $site_code = $this->_reqG('site_code');
        $prod_code = $this->_reqG('prod_code');
        if (empty($site_code) === true || empty($prod_code) === true) {
            show_error('잘못된 접근 입니다.');
        }

        // 수정
        if (empty($params[0]) === false) {
            $method = 'PUT';
            $correct_idx = $params[0];

            $column = '
            CU.CorrectIdx,CU.SiteCode,CU.ProdCode,CU.Title,CU.Content,CU.Price,CU.StartDate,CU.EndDate,CU.IsUse,CU.RegDatm,CU.RegAdminIdx
            ,BAT.AttachFileType,BAT.AttachFileIdx,BAT.AttachFilePath,BAT.AttachFileName,BAT.AttachRealFileName
            ';

            $arr_condition = ([
                'EQ'=>[
                    'CU.SiteCode' => $site_code,
                    'CU.ProdCode' => $prod_code,
                    'CU.CorrectIdx' => $correct_idx,
                    'CU.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'EQ'=>[
                    'CorrectIdx' => $correct_idx,
                    'RegType' => $this->btobCorrectModel->reg_type['admin'],
                    'AttachFileType' => $this->btobCorrectModel->attach_file_type['default'],
                    'IsStatus' => 'Y'
                ]
            ];
            $data = $this->btobCorrectModel->findCorrectUnitForModify($column, $arr_condition, $arr_condition_file);
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $input_params = [
            'site_code' => $site_code,
            'prod_code' => $prod_code,
            'correct_idx' => $correct_idx
        ];

        $this->load->view("correct/regist/unit_create_modal", [
            'method' => $method,
            'input_params' => $input_params,
            'data' => $data,
            'attach_file_cnt' => $this->btobCorrectModel->_attach_img_cnt,
        ]);
    }

    /**
     * 등록정보조회
     * @param array $params
     */
    public function unitReadModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $correct_idx = $params[0];
        $site_code = $this->_reqG('site_code');
        $prod_code = $this->_reqG('prod_code');
        if (empty($site_code) === true || empty($prod_code) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            CU.CorrectIdx,CU.SiteCode,CU.ProdCode,CU.Title,CU.Content,CU.Price,CU.StartDate,CU.EndDate,CU.IsUse,CU.RegDatm,CU.RegAdminIdx
            ,BAT.AttachFileType,BAT.AttachFileIdx,BAT.AttachFilePath,BAT.AttachFileName,BAT.AttachRealFileName,ADMIN.AdminName,ADMIN2.AdminName AS UpdAdminName,CU.UpdDatm
            ';

        $arr_condition = ([
            'EQ'=>[
                'CU.SiteCode' => $site_code,
                'CU.ProdCode' => $prod_code,
                'CU.CorrectIdx' => $correct_idx,
                'CU.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'EQ'=>[
                'CorrectIdx' => $correct_idx,
                'RegType' => $this->btobCorrectModel->reg_type['admin'],
                'AttachFileType' => $this->btobCorrectModel->attach_file_type['default'],
                'IsStatus' => 'Y'
            ]
        ];
        $data = $this->btobCorrectModel->findCorrectUnitForModify($column, $arr_condition, $arr_condition_file);
        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }
        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $input_params = [
            'site_code' => $site_code,
            'prod_code' => $prod_code,
            'correct_idx' => $correct_idx
        ];
        $this->load->view("correct/regist/unit_read_modal", [
            'input_params' => $input_params,
            'data' => $data,
            'attach_file_cnt' => $this->btobCorrectModel->_attach_img_cnt,
        ]);
    }

    public function unitStore($params = [])
    {
        $method = 'add';
        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'price', 'label' => '채점료', 'rules' => 'trim|required|integer'],
            ['field' => 'start_date', 'label' => '제출기간', 'rules' => 'trim|required'],
            ['field' => 'end_date', 'label' => '제출기간', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('correct_idx')) === false) {
            $method = 'modify';
        }
        $result = $this->btobCorrectModel->{$method.'Unit'}($this->_reqP(null), $this->_reqP('correct_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 회차삭제
     * @param array $params
     */
    public function unitDelete($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->btobCorrectModel->deleteUnit($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 파일 삭제
     */
    public function unitDestroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCorrectModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 상품 채점 현황
     * @param array $params
     */
    public function issueForProduct($params = [])
    {
        $arr_base['site_code'] = $this->_sess_btob_site_code;
        $arr_base['prod_code'] = $params[0];

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdCode' => $arr_base['prod_code'],
                'A.SiteCode' => $arr_base['site_code'],
                'A.IsStatus' => 'Y',
                'A.ProdTypeCcd' => $this->btobOffLectureModel->_ccd['prod_type'],
                'B.LearnPatternCcd' => $this->btobOffLectureModel->_ccd['learn_pattern'],
            ]
        ];
        $data = $this->btobOffLectureModel->listLecture(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc']);
        if (empty($data) === true) {
            show_error('조회된 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }
        $product_data = $data[0];

        $this->load->view('correct/regist/issue_index',[
            'arr_base' => $arr_base,
            'product_data' => $product_data
        ]);
    }

    public function issueForProductAjax()
    {
        $arr_condition = [
            'EQ' => [
                'lcu.ProdCode' => $this->_reqP('prod_code'),
                'lcua.IsReply' => $this->_reqP('search_is_reply'),
            ],
            'ORG' => [
                'LKB' => [
                    'lcu.Title' => $this->_reqP('search_value'),
                    'lcu.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜검색
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        if (empty($search_date_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            switch ($search_date_type) {
                case 'AssignDate' :  // 배정일
                    $arr_condition['BDT'] = ['AssignDate' => [$search_start_date, $search_end_date]];
                    break;
                case 'ReplyRegDate' :  // 채점일
                    $arr_condition['BDT'] = ['lcua.ReplyRegDate' => [$search_start_date, $search_end_date]];
                    break;
                case 'MemRegDatm' :  // 제출일
                    $arr_condition['BDT'] = ['lcua.RegDatm' => [$search_start_date, $search_end_date]];
                    break;
            }
        }

        $list = [];
        $count = $this->btobCorrectModel->listCorrectAssignment(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobCorrectModel->listCorrectAssignment(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['lcua.RegDatm' => 'desc']);
        }

        /*$count = 0;
        $list = [];*/

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }


    public function unitFileDownload()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}