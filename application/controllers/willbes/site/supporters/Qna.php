<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qna extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', 'categoryF', 'downloadF', 'product/baseProductF', 'supportersF', 'support/supportBoardTwoWayF', 'classroomF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '118';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    protected $_LearnPatternCcd_pass = ['615004'];

    private $_groupCcd = [
        'consult_ccd' => '702',   //유형 그룹 코드 = 상담유형
        'reply_status_ccd_complete' => '621004'  //답변등록상태 (답변완료)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = $this->_reqG(null);
        $this->load->view('site/supporters/qna/index', [
            'arr_input' => $arr_input
        ]);
    }

    public function listAjax()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code,
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SupportersIdx' => $supporters_idx
            ]
        ];

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx, b.ProdName';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.TypeCcd_Name, b.SubjectName';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, b.RegMemName, m.MemName) AS RegName';
        $column .= ',SupportersIdx';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,'');
        $paging = $this->pagination('/supporters/qna/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,'',$column,$paging['limit'],$paging['offset'],$order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    public function ajaxPaging()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code,
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SupportersIdx' => $supporters_idx
            ]
        ];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,'');
        $paging = $this->pagination('/supporters/qna/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);
        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function create()
    {
        $method = 'POST';
        $data = null;

        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $board_idx = element('board_idx',$arr_input);

        if (empty($supporters_idx) == true) {
            show_alert('잘못된 접근 입니다.', site_url('/supporters/home/index'), false);
        }

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        // 과목 조회
        $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code);

        //상품 조회
        $product_list = $this->supportersFModel->listProduct($supporters_idx);

        $today = date("Y-m-d", time());
        $lec_arr = array_data_pluck($product_list, 'ProdCode');
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
                'ProdCode' => $lec_arr
            ]
        ];

        // 수강중 강좌정보 읽어오기
        $arr_base['package_list'] = $this->classroomFModel->getPackage($cond_arr, ['OrderDate' => 'DESC']);

        if (empty($board_idx) === false) {
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }

            $method = 'PUT';
            $arr_condition = [
                'EQ' => [
                    'BmIdx' => $this->_bm_idx,
                    'IsUse' => 'Y'
                ],
            ];

            $column = '
                BoardIdx, b.SiteCode, RegType, TypeCcd, IsBest, IsPublic
                , SubjectIdx, ProdName
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubjectName
                , IF(RegType=1, b.RegMemName, m.MemName) AS RegName        
                , AttachData, Category_String
            ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
            if (empty($data) === true) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            $data['AttachData'] = json_decode($data['AttachData'],true);
        }

        $this->load->view('site/supporters/qna/create', [
            'method' => $method,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'data' => $data,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_img_cnt
        ]);
    }

    public function show()
    {
        $arr_input = $this->_reqG(null);
        $board_idx = element('board_idx',$arr_input);
        $supporters_idx = element('supporters_idx',$arr_input);

        if (empty($board_idx) == true || empty($supporters_idx) == true) {
            show_alert('잘못된 접근 입니다.', site_url('/supporters/home/index'), false);
        }

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];

        $column = '
                BoardIdx, b.SiteCode, RegType, TypeCcd, IsBest, IsPublic
                , SubjectIdx, ProdName
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubjectName
                , IF(RegType=1, b.RegMemName, m.MemName) AS RegName        
                , AttachData, Category_String
            ';

        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);

        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        $this->load->view('site/supporters/qna/show', [
            'arr_input' => $arr_input,
            'data' => $data,
            'board_idx' => $board_idx,
            'supporters_idx' => $supporters_idx,
            'reply_type_complete' => $this->_groupCcd['reply_status_ccd_complete']
        ]);
    }

    public function store()
    {
        $idx = '';
        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code', 'label' => '구분', 'rules' =>'trim|required|integer'],
            ['field' => 'consult_type', 'label' => '상담유형', 'rules' => 'trim|required|integer'],
            ['field' => 'subject_idx', 'label' => '과목', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '강좌', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if ($this->validate($rules) === false) {
            return false;
        }

        $supporters_data = $this->_getSupportersData($this->_reqP('supporters_idx'));
        if (empty($supporters_data) === true) {
            return $this->json_error('조회된 서포터즈가 없습니다. 새로고침 후 다시 시도해 주세요.');
        }
        if ($supporters_data['SupportersTypeCcd'] == '736002' && empty($supporters_data['MenuInfo']) === true) {
            return $this->json_error('온라인 관리반 기본정보 조회 실패입니다. 관리자에게 문의해 주세요.');
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false), $method);

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);
        $this->json_result($result, $msg, $result);
    }

    /**
     * 게시글 삭제
     */
    public function delete()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'board_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $arr_input = $this->_reqP(null);
        $board_idx = element('board_idx',$arr_input);

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->supportBoardTwoWayFModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }


    /**
     * 저장 데이터 셋팅
     * @param $input
     * @param $method
     * @return array[]
     */
    private function _setInputData($input, $method){
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx,
                'SiteCode' => $this->_site_code,
                'MdCateCode' => '',
                'RegType' => element('reg_type', $input, 0),
                'TypeCcd' => element('consult_type', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProdCode' => element('prod_code', $input),
                'Title' => element('board_title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => element('is_public', $input),
                'ReplyStatusCcd' => '621001',
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
                'SupportersIdx' => element('supporters_idx', $input)
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        //수정일 경우 사이트코드 제외
        if ($method == 'modify') {
            unset($input_data['board']['SiteCode']);
        }
        return$input_data;
    }

    /**
     * 서포터즈데이터 조회
     * @param $supporters_idx
     * @return mixed
     */
    private function _getSupportersData($supporters_idx)
    {
        $column = 'a.SupportersIdx, a.SupportersTypeCcd, a.MenuInfo, a.Title AS SupportersTitle, a.SupportersYear, a.SupportersNumber, a.CouponIssueCcd';
        $arr_condition_1 = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx,
                'IsUse' => 'Y'
            ]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'b.MemIdx' => $this->session->userdata('mem_idx'),
                'b.SiteCode' => $this->_site_code,
                'b.SupportersStatusCcd' => '720001',
                'b.IsStatus' => 'Y'
            ]
        ];
        return $this->supportersFModel->findSupporters($arr_condition_1, $arr_condition_2, $column);
    }

    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $board_idx = $this->_reqG('board_idx');
        $attach_type = (empty($this->_reqG('attach_type')) === true) ? '0' : $this->_reqG('attach_type');
        $this->downloadFModel->saveLog($board_idx, $attach_type);

        $file_data = $this->downloadFModel->getFileData($board_idx, $file_idx, 'board_assignment');
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }
}