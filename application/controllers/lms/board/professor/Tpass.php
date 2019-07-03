<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/board/BaseBoard.php';

class Tpass extends BaseBoard
{
    protected $temp_models = array('sys/code', 'sys/category', 'sys/boardMaster', 'board/board', 'board/boardTpass', 'product/base/professor', 'product/on/packageAdmin');
    protected $helpers = array('download','file');
    private $board_name = 'tpass';
    private $site_code = '';
    private $bm_idx;
    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615003'; //운영자패키지
    private $_groupCcd = [
        'type_group_ccd' => '632' //유형 그룹 코드 = 자료유형
    ];
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
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
     * 강사게시판 - T-pass 자료실
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
     * 강사게시판 - 강사별 T-pass 자료실
     * 강사에 매핑된 운영자페키지목록 인덱스
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

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['618','648']);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view("board/professor/{$this->board_name}/productList", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'Sales_ccd' => $codes['618'],
            'Packtype_ccd' => $codes['648'],
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$arr_prof_info['SiteCode']}",
        ]);
    }

    /**
     * 강사게시판 - 강사별 T-pass 자료실
     * @return CI_Output
     */
    public function productListAjax()
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');

        $arr_condition = [
            'EQ' => [
                'C.CateCode' => $this->_reqP('search_md_cate_code'),
                'temp_a.SchoolYear' => $this->_reqP('search_schoolyear'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'temp_a.PackTypeCcd' =>$this->_reqP('search_packtype_ccd'),
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
        ];

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'A.RegDatm' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        $list = [];
        $count = $this->packageAdminModel->listLectureForProfByTpass(true, $prof_idx, $arr_condition);

        if ($count > 0) {
            $list = $this->packageAdminModel->listLectureForProfByTpass(false, $prof_idx, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
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
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ]
        ];
        $product_data = $this->packageAdminModel->listLectureForProfByTpass(false, $prof_idx, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        //자료유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        $this->load->view("board/professor/{$this->board_name}/regist/index", [
            'bm_idx' => $this->bm_idx,
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * T-pass 자료실[게시판] AJAX
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

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y'
            ]
        ];

        $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.TypeCcd, LSC.CcdName AS TypeCcdName,
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
     * 회원 자료실권한부여 등록 폼
     * @param array $params
     */
    public function createMemberAuthority($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];
        $method = 'POST';

        $input_params = [
            'site_code' => $this->site_code,
            'prof_idx' => $prof_idx
        ];

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ]
        ];
        $product_data = $this->packageAdminModel->listLectureForProfByTpass(false, $prof_idx, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $this->load->view("board/professor/{$this->board_name}/create_member_authority", [
            'boardName' => $this->board_name,
            'prod_code' => $prod_code,
            'arr_prof_info' => $arr_prof_info,
            'method' => $method,
            'input_params' => $input_params,
            'product_data' => $product_data,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * 회원 자료실 권한 부여
     * @param array $params
     */
    public function storeMemberAuthority($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'mem_idx[]', 'label' => '회원 선택', 'rules' => 'trim|required'],
            ['field' => 'valid_start_date', 'label' => '시작일', 'rules' => 'trim|required'],
            ['field' => 'valid_days', 'label' => '유효기간', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        list($result, $return_count, $arr_intersect_mem_idx) = $this->boardTpassModel->addMemberAuthority($this->_reqP(null, false), $params[0]);
        $success_msg = count($this->_reqP('mem_idx', false)).'명 중 '.$return_count.'명에게 권한이 부여되었습니다.';
        $result_data = [
            'intersect_count' => count($arr_intersect_mem_idx),
            'arr_intersect' => $arr_intersect_mem_idx
        ];
        $this->json_result($result, $success_msg, $result, $result_data);
    }

    /**
     * T-pass 자료실 회원 권한 목록
     * @param array $params
     * @return CI_Output
     */
    public function memberAuthorityAjax($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];

        $target_condition = [
            'EQ' => [
                'SiteCode' => $this->site_code,
                'ProdCode' => $prod_code,
                'ProfIdx' => $prof_idx
            ]
        ];

        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'b.MemName' => $this->_reqP('search_value'),
                    'b.MemId' => $this->_reqP('search_value')
                ]
            ],
        ];

        $column = ' STRAIGHT_JOIN
                    a.BtmaIdx, a.MemIdx, a.IsValid, a.ValidStartDate, a.ValidEndDate, a.ValidDay, IFNULL(a.ValidReason, \'\') AS ValidReason, a.RegDatm, a.RegAdminIdx, IFNULL(a.RetireDatm, \'\') AS RetireDatm, a.RetireAdminIdx,
                    b.MemId, b.MemName, fn_dec(b.PhoneEnc) AS Phone,
                    c.wAdminName AS RegAdminName, IFNULL(d.wAdminName, \'\') AS RetireAdminName
        ';

        $list = [];
        $count = $this->boardTpassModel->listAllBoardForTpassMemberAuthority(true, $target_condition, $arr_condition);

        if ($count > 0) {
            $list = $this->boardTpassModel->listAllBoardForTpassMemberAuthority(false, $target_condition, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.BtmaIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 회원 권한 수정
     */
    public function updateAuthority()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'is_authority', 'label' => '권한여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'params[]', 'label' => '회원 선택', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardTpassModel->modifyMemberAuthority($this->_reqP(null, false));
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * T-pass 자료실 등록/수정 폼
     * @param array $params
     */
    public function createBoardForTpass($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];
        $board_idx = $this->_req('board_idx');

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ]
        ];
        $product_data = $this->packageAdminModel->listLectureForProfByTpass(false, $prof_idx, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $method = 'POST';
        $data = null;

        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }
        $arr_prof_info['arr_prof_cate_code'] = explode(',', $arr_prof_info['CateCode']);
        $arr_prof_info['arr_prof_cate_name'] = explode(',', $arr_prof_info['CateName']);

        if (empty($board_idx) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName, LB.TypeCcd, LSC.CcdName AS TypeCcdName, LB.ProdApplyTypeCcd, LSC4.CcdName AS ProdApplyTypeName,
            LB.ProdCode, lms_product.ProdName
            ';
            $method = 'PUT';
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

        //자료유형
        $arr_type_group_ccd = $this->_getCcdArray($this->_groupCcd['type_group_ccd']);

        $input_params = [
            'site_code' => $product_data['SiteCode'],
            'cate_code[]' => $product_data['CateCode'],
            'bm_idx' => $this->bm_idx,
            'prof_idx' => $prof_idx,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type['admin']
        ];

        $this->load->view("board/professor/{$this->board_name}/regist/create", [
            'prod_code' => $prod_code,
            'boardName' => $this->board_name,
            'product_data' => $product_data,
            'arr_prof_info' => $arr_prof_info,
            'arr_type_group_ccd' => $arr_type_group_ccd,
            'method' => $method,
            'data' => $data,
            'input_params' => $input_params,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * T-pass 자료실 등록
     * @param array $params
     */
    public function storeBoardForTpass($params = [])
    {
        $method = 'add';
        $idx = '';
        $prod_code = $params[0];

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code[]', 'label' => '구분', 'rules' => 'trim|required'],
            ['field' => 'bm_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'type_ccd', 'label' => '자료유형', 'rules' => 'trim|required|integer'],
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

    public function readBoardForTpass($params = [])
    {
        $this->setDefaultBoardParam();
        $board_params = $this->getDefaultBoardParam();
        $this->bm_idx = $board_params['bm_idx'];
        $prof_idx = $this->_req('prof_idx');
        $this->site_code = $this->_req('site_code');
        $prod_code = $params[0];
        $board_idx = $this->_req('board_idx');

        if (empty($board_idx) === true) {
            show_error('잘못된 접근 입니다.');
        }

        // 기존 교수 기본정보 조회
        $arr_prof_info = $this->_findProfessor($prof_idx);
        if (count($arr_prof_info) < 1) {
            show_error('조회된 교수 정보가 없습니다.', _HTTP_NO_PERMISSION, '정보 없음');
        }

        // 기본 상품 정보
        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'A.SiteCode' => $this->site_code,
                'A.ProdCode' => $prod_code
            ]
        ];
        $product_data = $this->packageAdminModel->listLectureForProfByTpass(false, $prof_idx, $arr_condition, 1, 0, ['A.ProdCode' => 'desc'])[0];

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse, LB.ExamProblemYear,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.AreaCcd, LB.SubjectIdx, PS.SubjectName, LB.TypeCcd, LSC.CcdName AS TypeCcdName, LB.ProdApplyTypeCcd, LSC4.CcdName AS ProdApplyTypeName,
            LB.ProdCode, lms_product.ProdName
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
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($this->bm_idx, $board_idx, $data['IsBest'], $data['RegType'], $search_datas, '', $prof_idx, $prod_code);
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $this->load->view("board/professor/{$this->board_name}/regist/read", [
            'prod_code' => $prod_code,
            'boardName' => $this->board_name,
            'arr_prof_info' => $arr_prof_info,
            'product_data' => $product_data,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
            'boardDefaultQueryString' => "&bm_idx={$this->bm_idx}&prof_idx={$prof_idx}&site_code={$product_data['SiteCode']}",
        ]);
    }

    /**
     * T-pass 자료 삭제
     * @param array $params
     */
    public function deleteBoardForTpass($params = [])
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
     * T-pass 자료실 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'board_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardCopy($this->_reqP('board_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * T-pass 자료실 BEST 적용
     */
    public function storeIsBest()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->_boardIsBest(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
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
                'TypeCcd' => element('type_ccd', $input),
                'RegType' => $this->_reg_type['admin'],
                'Title' => element('title', $input),
                'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
                'Content' => element('board_content', $input),
                'IsUse' => element('is_use', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'SettingReadCnt' => element('setting_readCnt', $input),
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}