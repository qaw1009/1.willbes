<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggest extends \app\controllers\FrontController
{
    protected $models = array('downloadF', 'support/supportBoardTwoWayF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '105';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = $this->_reqG(null);
        $this->load->view('site/supporters/suggest/index', [
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

        $column = 'BoardIdx, IsBest, RegType, RegMemIdx, IsPublic';
        $column .= ',IF(b.RegType=1, b.RegMemId, m.MemId) AS RegMemId, IF(b.RegType=1, b.RegMemName, m.MemName) AS RegMemName';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ',SupportersIdx';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,'');
        $paging = $this->pagination('/supporters/suggest/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,'',$column,$paging['limit'],$paging['offset'],$order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    /**
     * @return CI_Output
     */
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
        $paging = $this->pagination('/supporters/suggest/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);
        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function create()
    {
        $arr_input = $this->_reqG(null);
        $supporters_idx = element('supporters_idx',$arr_input);
        $board_idx = element('board_idx',$arr_input);

        if (empty($supporters_idx) == true) {
            show_alert('잘못된 접근 입니다.', site_url('/supporters/home/index'), false);
        }

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';
            $arr_condition = [
                'EQ' => [
                    'BmIdx' => $this->_bm_idx,
                    'IsUse' => 'Y'
                ],
            ];

            $column = '
                BoardIdx, b.SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
                , ProfIdx, SubjectIdx, ProdName
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubJectName
                , IF(RegType=1, b.RegMemName, m.MemName) AS RegName
                , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
                , AttachData, Category_String
            ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);

            if (empty($data)) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            if ($data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                show_alert('잘못된 접근 입니다.', 'back');
            }
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }

            $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        }

        $this->load->view('site/supporters/suggest/create', [
            'method' => $method,
            'arr_input' => $arr_input,
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
                BoardIdx, b.SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
                , ProfIdx, SubjectIdx, ProdName
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubJectName
                , IF(RegType=1, b.RegMemName, m.MemName) AS RegName
                , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
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
        $this->load->view('site/supporters/suggest/show', [
            'arr_input' => $arr_input,
            'data' => $data,
            'board_idx' => $board_idx,
            'supporters_idx' => $supporters_idx,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_img_cnt
        ]);
    }

    public function store()
    {
        $idx = '';
        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 'supporters_idx', 'label' => '서포터즈식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);
        $this->json_result($result, $msg, $result);
    }

    /**
     * 게시글 삭제
     */
    public function delete()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $board_idx = $this->_reqG('board_idx');
        $attach_type = $this->_reqG('attach_type');
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

        $result = $this->supportBoardTwoWayFModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    private function _setInputData($input){
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx,
                'SiteCode' => $this->_site_code,
                'MdCateCode' => '',
                'RegType' => element('reg_type', $input, 0),
                'Title' => element('board_title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => element('is_public', $input),
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
                'SupportersIdx' => element('supporters_idx', $input)
            ],
            'board_r_category' => []
        ];
        return$input_data;
    }
}