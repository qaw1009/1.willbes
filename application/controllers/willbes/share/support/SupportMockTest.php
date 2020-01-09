<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportMockTest extends BaseSupport
{
    protected $_bm_idx_qna;
    protected $_bm_idx_notice;
    protected $_default_path;
    protected $_include_path;
    protected $_paging_limit;
    protected $_paging_count;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 이의제기/정오표 : 모의고사 리스트
     */
    protected function _board()
    {
        $arr_input = $this->_reqG(null,false);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'pm.SiteCode' => ($this->_site_code == config_item('app_intg_site_code')) ? '' : $this->_site_code,
                'pm.CateCode' => $this->_cate_code,
                'pm.IsUse' => 'Y'

            ],
            'LKB' => [
                'pm.ProdName' => $s_keyword
            ]
        ];

        $column = 'pm.*,
            IFNULL(DATE_FORMAT(pm.TakeStartDatm, \'%Y%m%d\'), 0) as TakeStartDate,
            IFNULL(DATE_FORMAT(pm.TakeEndDatm, \'%Y%m%d\'), 0) as TakeEndDate,
            IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS noticeCnt
        ';
        $order_by = ['pm.ProdCode'=>'Desc'];

        $list = [];
        $count = $this->mockInfoFModel->listMockTestForBoard(true, $arr_condition);

        if ($this->_default_path == 'mocktestNew') {
            $paging = $this->pagination('/'.$this->_default_path.'/board/cate/'.$this->_cate_code.'?'.$get_page_params, $count, $this->_paging_limit, $this->_paging_count, true);
        } else {
            $paging = $this->pagination('/'.$this->_default_path.'?'.$get_page_params, $count, $this->_paging_limit, $this->_paging_count, true);
        }

        if($count > 0) {
            $list = $this->mockInfoFModel->listMockTestForBoard(false, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
        }

        $this->load->view('/support/mocktest/board_product',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'page_type' => 'board',
            'arr_input' => $arr_input,
            'get_params' => $get_page_params,
            'def_cate_code' => $this->_cate_code,
            'count' => $count,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    /**
     * 모의고사 이의제기 목록
     */
    protected function _listQna()
    {
        $list = [];
        $arr_input = $this->_reqG(null);
        $get_params = http_build_query($arr_input);
        $prod_code = (int)element('prod_code', $arr_input);
        $s_take_mock_part = element('s_take_mock_part',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 'prod_code='.$prod_code.'&s_take_mock_part='.$s_take_mock_part;
        $get_page_params .= '&s_keyword='.urlencode($s_keyword);

        //직렬 추출
        $mock_part = $this->mockInfoFModel->listMockTestMockPart($prod_code);

        // 모의고사 상품 상세 조회
        $prod_data = $this->_getProdData($prod_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx_qna,
                'b.IsUse' => 'Y',
                'mr.TakeMockPart' => $s_take_mock_part
            ],
            'RAW' => [
                'b.ProdCode = ' => $prod_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'BoardIdx, CampusCcd, TypeCcd, IsBest, RegType, RegMemIdx, ProdName';
        $column .= ', Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', IsPublic, CampusCcd_Name, TypeCcd_Name';
        $column .= ', SiteName, ReplyStatusCcd, ReplyStatusCcd_Name';
        $column .= ', IF(RegType=1, b.RegMemName, m.MemName) AS RegName';
        $column .= ', IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';
        $column .= ', fn_ccd_name(mr.TakeMockPart) AS TakeMockPart_Name';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardTwoWayFModel->listBoardForMockTest(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/listQna/cate/'.$this->_cate_code.'?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForMockTest(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('/support/mocktest/board_list_qna',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'page_type' => 'board_etc',
            'def_cate_code' => $this->_cate_code,
            'mock_part' => $mock_part,
            'prod_code' => $prod_code,
            'prod_data' => $prod_data,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging
        ]);
    }

    /**
     * 모의고사 이의제기 등록 폼
     */
    protected function _createQna()
    {
        $arr_input = $this->_reqG(null,false);
        $get_params = http_build_query($arr_input);
        $prod_code = element('prod_code', $arr_input);
        $board_idx = element('board_idx', $arr_input);

        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주세요.', 'back');
        }

        // 모의고사 상품 상세 조회
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'pm.IsUse' => 'Y',
                'pm.CateCode' => $this->_cate_code,
                'pm.SiteCode' => ($this->_site_code == config_item('app_intg_site_code')) ? '' : $this->_site_code,
                'op.PayStatusCcd' => '676001'
            ],
            'RAW' => [
                'op.MemIdx = ' => $this->session->userdata('mem_idx')
            ]
        ];
        $prod_data = $this->mockInfoFModel->findRegistForBoard($arr_condition);

        if (empty($prod_data) === true) {
            show_alert('응시한 모의고사 상품이 아닙니다.', 'back');
        }

        /*if ($prod_data['IsTake'] != 'Y') {
            show_alert('응시한 모의고사 상품이 아닙니다.', 'back');
        }*/

        $method = 'POST';
        $board_data = null;
        if (empty($board_idx) === false) {
            $method = 'PUT';

            $arr_condition = [
                'EQ' => [
                    'BmIdx' => $this->_bm_idx_qna,
                    'IsUse' => 'Y'
                ],
            ];

            $column = '
                BoardIdx, b.SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
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

            $board_data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
            if (empty($board_data)) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            if ($board_data['RegType'] == '0' && $board_data['IsPublic'] == 'N' && $board_data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                show_alert('잘못된 접근 입니다.', 'back');
            }
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }

            $board_data['AttachData'] = json_decode($board_data['AttachData'],true);       //첨부파일
        }

        $arr_board_post_data = [
            'board_idx' => $board_idx,
            'site_code' => $prod_data['SiteCode'],
            'cate_code' => $prod_data['CateCode'],
            'prod_code' => $prod_data['ProdCode'],
            'reg_type' => '0'
        ];

        $this->load->view('/support/mocktest/board_create_qna',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'method' => $method,
            'page_type' => 'board_etc',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'prod_data' => $prod_data,
            'board_data' => $board_data,
            'arr_board_post_data' => $arr_board_post_data,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_img_cnt
        ]);
    }

    /**
     * 모의고사 이의제기 등록
     */
    protected function _boardQnaStore()
    {
        $idx = '';
        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required|integer'],
            ['field' => 'cate_code', 'label' => '응시분야코드', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '모의고사코드', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('board_idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('board_idx');
        }

        $inputData = $this->_setInputForQnaData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);
        $this->json_result($result, $msg, $result);
    }

    protected function _showQna()
    {
        $arr_input = $this->_reqG(null, false);
        $prod_code = element('prod_code', $arr_input);
        $board_idx = element('board_idx', $arr_input);
        $s_take_mock_part = element('s_take_mock_part', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $page = element('page',$arr_input);
        $get_params = 'prod_code='.$prod_code.'&s_take_mock_part='.$s_take_mock_part;
        $get_params .= '&s_keyword='.urlencode($s_keyword);
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx_qna,
                'ProdCode' => $prod_code,
                'IsUse' => 'Y'
            ],
        ];

        $column = '
            BoardIdx, b.SiteCode, MdCateCode, CampusCcd
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
            , Title, Content, ReadCnt, SettingReadCnt
            , RegDatm
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, b.RegMemName, m.MemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
            , AttachData
        ';

        $board_data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($board_data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }

        if ($board_data['RegType'] == '0' && $board_data['IsPublic'] == 'N' && $board_data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }
        $board_data['AttachData'] = json_decode($board_data['AttachData'],true);       //첨부파일

        // 모의고사 상품 상세 조회
        if ($board_data['RegType'] == '1') {
            $prod_data = $this->_getProdData($prod_code);
        } else {
            $arr_condition = [
                'EQ' => [
                    'pm.ProdCode' => $prod_code,
                    'pm.IsUse' => 'Y',
                    'pm.CateCode' => $this->_cate_code,
                    'pm.SiteCode' => ($this->_site_code == config_item('app_intg_site_code')) ? '' : $this->_site_code,
                    'op.PayStatusCcd' => '676001'
                ],
                'RAW' => [
                    'op.MemIdx = ' => $this->session->userdata('mem_idx')
                ]
            ];
            $prod_data = $this->mockInfoFModel->findRegistForBoard($arr_condition);
            if (empty($prod_data) === true) {
                show_alert('응시한 모의고사 상품이 아닙니다.', 'back');
            }
            /*if ($prod_data['IsTake'] != 'Y') {
                show_alert('응시한 모의고사 상품이 아닙니다.', 'back');
            }*/
        }

        $this->load->view('/support/mocktest/board_show_qna',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'page_type' => 'board_etc',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'prod_data' => $prod_data,
            'board_data' => $board_data,
            'board_idx' => $board_idx,
            'reply_type_complete' => '621004'   //답변등록상태 (답변완료)
        ]);
    }

    /**
     * 모의고사 이의제기 게시물 삭제
     */
    protected function _deleteQna()
    {
        $arr_input = $this->_reqG(null, false);
        $prod_code = element('prod_code', $arr_input);
        $board_idx = element('board_idx', $arr_input);
        $s_take_mock_part = element('s_take_mock_part', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $page = element('page',$arr_input);
        $get_params = 'prod_code='.$prod_code.'&s_take_mock_part='.$s_take_mock_part;
        $get_params .= '&s_keyword='.urlencode($s_keyword);
        $get_params .= '&page='.$page;

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx, '621004');

        if (empty($result['ret_status']) === false) {
            show_alert('삭제 실패입니다. 관리자에게 문의해주세요.', 'back');
        }

        show_alert('삭제되었습니다.', front_url($this->_default_path.'/listQna/cate/'.$this->_cate_code.'?'.$get_params));
    }

    /**
     * 모의고사 정오표 목록
     */
    protected function _listNotice()
    {
        $list = [];
        $arr_input = $this->_reqG(null);
        $get_params = http_build_query($arr_input);
        $prod_code = (int)element('prod_code', $arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 'prod_code='.$prod_code.'&s_keyword='.urlencode($s_keyword);

        // 모의고사 상품 상세 조회
        $prod_data = $this->_getProdData($prod_code);

        // 직렬 추출 및 데이터 셋팅
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);
        $mockPart = explode(',', $prod_data['MockPart']);
        foreach ($mockPart as $mp) {
            if( !empty($codes[$mockKindCode][$mp]) ) $prod_data['MockPartName'][] = $codes[$mockKindCode][$mp];
        }

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx_notice,
                'b.IsUse' => 'Y'
            ],
            'RAW' => [
                'b.ProdCode = ' => $prod_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/listNotice/cate/'.$this->_cate_code.'?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition, '',$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('/support/mocktest/board_list_notice',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'page_type' => 'board_etc',
            'def_cate_code' => $this->_cate_code,
            'prod_code' => $prod_code,
            'prod_data' => $prod_data,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
        ]);
    }

    protected function _showNotice()
    {
        $arr_input = $this->_reqG(null, false);
        $prod_code = element('prod_code', $arr_input);
        $board_idx = element('board_idx', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $page = element('page',$arr_input);
        $get_params = 'prod_code='.$prod_code.'&s_keyword='.urlencode($s_keyword);
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        // 모의고사 상품 상세 조회
        $prod_data = $this->_getProdData($prod_code);

        // 직렬 추출 및 데이터 셋팅
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);
        $mockPart = explode(',', $prod_data['MockPart']);
        foreach ($mockPart as $mp) {
            if( !empty($codes[$mockKindCode][$mp]) ) $prod_data['MockPartName'][] = $codes[$mockKindCode][$mp];
        }

        // 게시글 조회
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => ($this->_site_code == config_item('app_intg_site_code')) ? '' : $this->_site_code
                ,'b.ProdCode' => $prod_code
                ,'b.BmIdx' => $this->_bm_idx_notice
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = '
           b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
           ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
           ,b.IsCampus,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
           ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
        ';
        $board_data = $this->supportBoardFModel->findBoard($board_idx,$arr_condition,$column);

        if (empty($board_data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        $board_data['AttachData'] = json_decode($board_data['AttachData'],true);       //첨부파일

        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        $this->load->view('/support/mocktest/board_show_notice',[
            'default_path' => $this->_default_path,
            'include_path' => $this->_include_path,
            'page_type' => 'board_etc',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'prod_data' => $prod_data,
            'board_data' => $board_data,
            'board_idx' => $board_idx,
        ]);
    }

    /**
     * 모의고사 상품 조회
     * @param $prod_code
     * @return mixed
     */
    private function _getProdData($prod_code)
    {
        // 모의고사 상품 상세 조회
        $arr_condition = [
            'EQ' => [
                'pm.ProdCode' => $prod_code,
                'pm.IsUse' => 'Y',
                'pm.CateCode' => $this->_cate_code,
                'pm.SiteCode' => ($this->_site_code == config_item('app_intg_site_code')) ? '' : $this->_site_code
            ],
        ];

        $prod_data = $this->mockInfoFModel->findMockTestForBoard($arr_condition);
        if (empty($prod_data) === true) {
            show_alert('모의고사 상품이 없습니다.', 'back');
        }

        return $prod_data;
    }

    private function _setInputForQnaData($input)
    {
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx_qna,
                'SiteCode' => element('site_code', $input),
                'RegType' => element('reg_type', $input, 0),
                'Title' => element('board_title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => element('is_public', $input),
                'ReplyStatusCcd' => '621001',
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
                'ProdCode' => element('prod_code', $input)
            ],
            'board_r_category' => [
                'site_category' => element('cate_code', $input)
            ]
        ];

        return$input_data;
    }
}