<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Assignment extends BaseBoard
{
    protected $temp_models = array('sys/boardMaster', 'board/board', 'board/boardAssignment', 'product/base/professor', 'product/on/lecture');
    protected $helpers = array('download','file');

    private $board_name = 'assignment';
    private $site_code = '';
    private $bm_idx;
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615001'; //단강좌
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];
    private $_arr_assignment_status_ccd = [
        'R' => '698001',    //임시저장
        'S' => '698002',    //제출완료
        'M' => '698003'     //채점완료
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        redirect(site_url("/board/professor/{$this->board_name}/mainList?bm_idx={$this->bm_idx}"));
    }

    /**
     * 강사게시판 - 첨삭게시판
     */
    public function mainList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $this->load->view("board/professor/{$this->board_name}/mainList", [
            'boardName' => $this->board_name,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}",
        ]);
    }
    
    public function mainListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];

        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        //교수관리자로 로그인 했을 경우 (T-zone)
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == $this->lms_prof_role_idx) {
            $arr_condition = array_merge($arr_condition,[
                'IN' => [
                    'P.ProfIdx' => $this->session->userdata('admin_prof_idxs')
                ]
            ]);
        }

        if (empty($this->_reqP('search_site_code')) === false) {
            $arr_condition['EQ']['P.SiteCode'] = $this->_reqP('search_site_code');
        } else {
            $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        }

        $list = [];
        $count = $this->professorModel->listProfessorSubjectMappingForBoard(true, $arr_condition, $this->bm_idx);

        if ($count > 0) {
            $list = $this->professorModel->listProfessorSubjectMappingForBoard(false, $arr_condition, $this->bm_idx, '', $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강사게시판 - 강사별 첨삭게시판
     * 강사에 매핑된 단강좌목록 인덱스
     */
    public function productList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $this->load->view("board/professor/{$this->board_name}/productList", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$arr_prof_info['SiteCode']}",
        ]);
    }

    /**
     * 강사게시판 - 강사별 첨삭게시판
     * 강사에 매핑된 단강좌목록 데이타
     */
    public function productListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.IsEdit' => 'Y',
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->_reqP('site_code'),
                'A.IsUse' =>$this->_reqP('search_is_use')
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ],
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ];

        $list = [];
        $count = $this->lectureModel->listLectureForBoard(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureModel->listLectureForBoard(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 강사게시판 - 회원 과제 제출 리스트
     */
    public function boardList()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        $this->load->view("board/professor/{$this->board_name}/boardList", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$arr_prof_info['SiteCode']}",
        ]);
    }

    public function boardListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');

        $target_condition = [
            'IN' => [
                'AssignmentStatusCcd' => [$this->_arr_assignment_status_ccd['S'], $this->_arr_assignment_status_ccd['M']]
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'BmIdx' => $this->bm_idx,
                'ProfIdx' => $prof_idx,
            ]
        ];

        $arr_condition = [
            'EQ' => [
                'b.IsStatus' => 'Y',
                'b.IsUse' => 'Y',
                'a.IsReply' => $this->_reqP('search_is_reply'),
            ],
            'ORG' => [
                'LKB' => [
                    'c.MemId' => $this->_reqP('search_member_value'),
                    'c.MemName' => $this->_reqP('search_member_value'),
                ],
                'LKR' => [
                    'c.Phone3' => $this->_reqP('search_member_value')
                ]
            ],
            'LKB' => [
                'b.Title' => $this->_reqP('search_title'),
                'lms_product.ProdName' => $this->_reqP('search_product_name'),
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            if ($this->_reqP('search_date_type') == 'R') {
                $arr_condition = array_merge($arr_condition, [
                    'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                ]);
            } else {
                $arr_condition = array_merge($arr_condition, [
                    'BDT' => ['a.ReplyRegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                ]);
            }
        }

        $column = ' STRAIGHT_JOIN
            a.BaIdx, a.BoardIdx, a.MemIdx, a.AssignmentStatusCcd, a.RegDatm, a.ReplyRegDatm, a.ReplyRegAdminIdx,
            fn_ccd_name(a.AssignmentStatusCcd) AS AssignmentStatusCcdName, a.IsStatus,
            ReplyADMIN.wAdminName AS ReplyAdminName, a.IsReply, a.ReplyRegDatm, lms_product.ProdName,
            b.Title, c.MemName, c.MemId, fn_dec(c.PhoneEnc) AS MemPhone,
            e.AttachFilePath, e.AttachFileName, e.AttachRealFileName,
            d.AttachFileIdx AS AttachFileIdx_User, d.AttachFilePath AS AttachFilePath_User, d.AttachFileName AS AttachFileName_User, d.AttachRealFileName AS AttachRealFileName_User
        ';

        $list = [];
        $count = $this->boardAssignmentModel->listAllBoardForAssignment(true, $target_condition, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardAssignmentModel->listAllBoardForAssignment(false, $target_condition, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['a.BaIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 과제등록관리[게시판]
     * @param array $params
     */
    public function registForBoard($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];
        $product_data = $this->lectureModel->listLectureForBoard(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $this->load->view("board/professor/{$this->board_name}/regist/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 과제등록관리[게시판] AJAX
     * @param array $params
     * @return CI_Output
     */
    public function registForBoardAjax($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('site_code');
        $prof_idx = $this->_req('prof_idx');
        $prod_code = $params[0];

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.ProfIdx' => $prof_idx,
                'LB.ProdCode' => $prod_code,
                'LB.IsStatus' => 'Y',
                'LB.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $sub_query_condition = [
            /*'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]*/
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name,true, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name,false, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 과제노출스케줄관리
     * @param array $params
     */
    public function createScheduleModal($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_reqP('site_code');
        $prof_idx = $this->_req('prof_idx');
        $prod_code = $params[0];

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];
        $product_data = $this->lectureModel->listLectureForBoard(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        // 스케줄 정보 조회
        $schedule = $this->boardModel->getAssignmentSchedule($prod_code);
        // 스케줄 상세 정보 조회
        $arr_schedule_date = $this->boardModel->getAssignmentScheduleDate($prod_code);

        if (empty($schedule) === true) {
            $method = 'POST';
            $schedule_data = [
                'start_date' => $product_data['StudyStartDate'],
                'end_date' => date('Y-m-d', strtotime("+12 months", strtotime($product_data['StudyStartDate']))),   //종료일 자동 셋팅 (강좌등록일기준 +365일)
                'week_arr' => explode(",",",,,,,,"),
                'arr_schedule_date' => []
            ];
        } else {
            $method = 'PUT';
            $schedule_data = [
                'start_date' => $schedule['StartDate'],
                'end_date' => $schedule['EndDate'],
                'week_arr' => explode(",",$schedule['WeekArray']),
                'arr_schedule_date' => $arr_schedule_date
            ];
        }

        $this->load->view("board/professor/{$this->board_name}/create_schedule_modal", [
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'method' => $method,
            'schedule_data' => $schedule_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 과제노출스케줄 등록
     * @param array $params
     */
    public function storeSchedule($params = [])
    {
        $prod_code = $params[0];

        $rules = [
            ['field' => 'start_date', 'label' => '강좌등록일', 'rules' => 'trim|required'],
            ['field' => 'end_date', 'label' => '강좌종료일', 'rules' => 'trim|required'],
            ['field' => 'week[]', 'label' => '노출요일', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('savDay[]')) === true) {
            $rules = array_merge($rules, [
                ['field'=>'savDay[]', 'label'=>'노출일', 'rules'=>'trim|required']
            ]);
        } else {
            $c = 0;
            foreach ($this->_reqP('savDay[]') as $key => $val) {
                if (empty($val) === false) {
                    $c = $c + 1;
                }
            }

            if ($c <= 0) {
                $rules = array_merge($rules, [
                    ['field'=>'savDay[]', 'label'=>'노출일', 'rules'=>'trim|required']
                ]);
            }
        }

        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $this->_reqG('prof_idx'),
            ]
        ];

        $product_data = $this->lectureModel->listLectureForBoard(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];
        if (empty($product_data) === true) {
            $rules = array_merge($rules, [
                ['field'=>'prod_code', 'label'=>'상품코드', 'rules'=>'trim|required']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->addAssignmentSchedule($prod_code, $this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과제등록[게시판등록]
     * @param array $params
     */
    public function createAssignmentModal($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_req('site_code');
        $cate_code = $this->_req('cate_code');
        $prof_idx = $this->_req('prof_idx');
        $board_idx = $this->_req('board_idx');
        $prod_code = $params[0];

        $input_params = [
            'site_code' => $this->site_code,
            'cate_code[]' => $cate_code,
            'bm_idx' => $this->bm_idx,
            'prof_idx' => $prof_idx,
            'board_idx' => $board_idx
        ];

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';

            $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
            ';

            $arr_condition = ([
                'EQ'=>[
                    'LB.BoardIdx' => $board_idx,
                    'LB.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'reg_type' => $this->_reg_type['admin'],
                'attach_file_type' => $this->_attach_reg_type['default']
            ];
            $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);
        }

        $this->load->view("board/professor/{$this->board_name}/regist/create_modal", [
            'boardName' => $this->board_name,
            'method' => $method,
            'input_params' => $input_params,
            'prod_code' => $prod_code,
            'data' => $data,
            'attach_file_cnt' => 5
        ]);
    }

    public function readAssignmentModal($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_req('site_code');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ProfIdx, LB.ProdCode,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
            ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $params[0],
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name, $column, $arr_condition, $arr_condition_file);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($params[0]);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = implode(', ', array_keys($arr_cate_code));
        }

        $this->load->view("board/professor/{$this->board_name}/regist/read_modal", [
            'boardName' => $this->board_name,
            'prod_code' => $data['ProdCode'],
            'data' => $data,
            'board_idx' => $params[0],
            'attach_file_cnt' => 5,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$data['ProfIdx']}&site_code={$data['SiteCode']}&cate_code={$data['arr_cate_code']}&board_idx={$data['BoardIdx']}",
        ]);
    }

    /**
     * 과제등록
     * @param array $params
     */
    public function storeAssignment($params = [])
    {
        $method = 'add';
        $idx = '';
        $prod_code = $params[0];

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'bm_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('board_idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false), $prod_code);

        //_addBoard, _modifyBoard
        $result = $this->{'_' . $method . 'Board'}($method, $inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과제 삭제
     * @param array $params
     */
    public function deleteRegistBoard($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->_delete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 과제제출목록관리
     * @param array $params
     */
    public function issueForBoard($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];
        $product_data = $this->lectureModel->listLectureForBoard(false, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $this->load->view("board/professor/{$this->board_name}/issue/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 과제제출목록관리 Ajax
     * @param array $params
     * @return CI_Output
     */
    public function issueForBoardAjax($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        $target_condition = [
            'IN' => [
                'AssignmentStatusCcd' => [$this->_arr_assignment_status_ccd['S'], $this->_arr_assignment_status_ccd['M']]
            ]
        ];

        $sub_query_condition = [
            'EQ' => [
                'BmIdx' => $this->bm_idx,
                'ProdCode' => $prod_code,
                'ProfIdx' => $prof_idx,
            ]
        ];

        $arr_condition = [
            'EQ' => [
                'b.IsStatus' => 'Y',
                'b.IsUse' => 'Y',
                'a.IsReply' => $this->_reqP('search_is_reply')
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $this->_reqP('search_value'),
                    'a.Content' => $this->_reqP('search_value'),
                ]
            ],
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            if ($this->_reqP('search_date_type') == 'R') {
                $arr_condition = array_merge($arr_condition, [
                    'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                ]);
            } else {
                $arr_condition = array_merge($arr_condition, [
                    'BDT' => ['a.ReplyRegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                ]);
            }
        }

        $column = ' STRAIGHT_JOIN
            a.BaIdx, a.BoardIdx, a.MemIdx, a.AssignmentStatusCcd, a.RegDatm, a.ReplyRegDatm, a.ReplyRegAdminIdx,
            fn_ccd_name(a.AssignmentStatusCcd) AS AssignmentStatusCcdName, a.IsStatus,
            ReplyADMIN.wAdminName AS ReplyAdminName, a.IsReply,
            b.Title, c.MemName, c.MemId, fn_dec(c.PhoneEnc) AS MemPhone,
            a.ReplyRegDatm,
            e.AttachFilePath, e.AttachFileName, e.AttachRealFileName
        ';

        $list = [];
        $count = $this->boardAssignmentModel->listAllBoardForAssignment(true, $target_condition, $arr_condition, $sub_query_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardAssignmentModel->listAllBoardForAssignment(false, $target_condition, $arr_condition, $sub_query_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['a.BaIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 첨삭현황
     */
    public function managerAssignmentModal()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $this->site_code = $this->_req('site_code');
        $hidden_data = [
            'bm_idx' => $this->bm_idx,
            'ba_idx' => $this->_req('ba_idx'),
            'board_idx' => $this->_req('board_idx'),
            'prof_idx' => $this->_req('prof_idx')
        ];

        //첨삭데이터 조회
        $column = '
        STRAIGHT_JOIN
        a.BaIdx, b.Title,
        f.MemName, f.MemId, fn_dec(f.PhoneEnc) AS MemPhone, f2.SmsRcvStatus,
        ReplyADMIN.wAdminName AS ReplyAdminName, a.RegDatm, a.IsReply, a.ReplyRegDatm,
        b.Content AS ProfContent, a.Content AS MemContent, a.ReplyContent,
        c.AttachFileIdx AS AttachFileIdx_Admin, c.AttachFilePath AS AttachFilePath_Admin, c.AttachFileName AS AttachFileName_Admin, c.AttachRealFileName AS AttachRealFileName_Admin,
        d.AttachFileIdx AS AttachFileIdx_User, d.AttachFilePath AS AttachFilePath_User, d.AttachFileName AS AttachFileName_User, d.AttachRealFileName AS AttachRealFileName_User,
        e.AttachFileIdx AS AttachFileIdx_Reply, e.AttachFilePath AS AttachFilePath_Reply, e.AttachFileName AS AttachFileName_Reply, e.AttachRealFileName AS AttachRealFileName_Reply
        ';
        $data = $this->boardAssignmentModel->findBoardForAssignment($column, $hidden_data['ba_idx'], $hidden_data['board_idx']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $data['arr_attach_file_idx_admin'] = explode(',', $data['AttachFileIdx_Admin']);
        $data['arr_attach_file_path_admin'] = explode(',', $data['AttachFilePath_Admin']);
        $data['arr_attach_file_name_admin'] = explode(',', $data['AttachFileName_Admin']);
        $data['arr_attach_file_real_name_admin'] = explode(',', $data['AttachRealFileName_Admin']);

        $data['arr_attach_file_idx_user'] = explode(',', $data['AttachFileIdx_User']);
        $data['arr_attach_file_path_user'] = explode(',', $data['AttachFilePath_User']);
        $data['arr_attach_file_name_user'] = explode(',', $data['AttachFileName_User']);
        $data['arr_attach_file_real_name_user'] = explode(',', $data['AttachRealFileName_User']);

        $data['arr_attach_file_idx_reply'] = explode(',', $data['AttachFileIdx_Reply']);
        $data['arr_attach_file_path_reply'] = explode(',', $data['AttachFilePath_Reply']);
        $data['arr_attach_file_name_reply'] = explode(',', $data['AttachFileName_Reply']);
        $data['arr_attach_file_real_name_reply'] = explode(',', $data['AttachRealFileName_Reply']);

        $this->load->view("board/professor/{$this->board_name}/issue/manager_modal", [
            'method' => 'PUT',
            'boardName' => $this->board_name,
            'data' => $data,
            'hidden_data' => $hidden_data,
            'attach_file_cnt' => 5,
        ]);
    }

    public function storeReply()
    {
        $rules = [
            ['field' => 'ba_idx', 'label' => '첨삭게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        //_addBoard, _modifyBoard
        $result = $this->boardAssignmentModel->modifyAssignmentBoard($this->_reqP(null, false), $this->_arr_assignment_status_ccd['M'], 'Y');

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 제출자료삭제
     */
    public function deleteAssignment($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->boardAssignmentModel->boardDeleteForAssignment($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
    }

    /**
     * 파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 게시판 등록/수정 데이타 셋팅
     * @param $input
     * @param $prod_code
     * @return array
     */
    private function _setInputData($input, $prod_code){
        $input_data = [
            'board' => [
                'SiteCode' => element('site_code', $input),
                'BmIdx' => element('bm_idx', $input),
                'ProdCode' => $prod_code,
                'ProfIdx' => element('prof_idx', $input),
                'RegType' => $this->_reg_type['admin'],
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => '0',
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}