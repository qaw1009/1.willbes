<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportAnonymous extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', 'downloadF', '_lms/sys/site', '_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array('create', 'store');

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
    protected $_reg_type = 0;    //등록타입

    // 접근 허용 카테고리
    private $_allow_cate_code = [
        309004      // 변리사 (자격증 온라인)
    ];

    public function __construct()
    {
        parent::__construct();
        if($this->_checkAllowCate() === false) {
            show_alert('허용되지 않은 카테고리입니다.', 'back');
        }
    }

    /**
     * 익명 자유게시판 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        if (empty($this->_cate_code) === true) {
            show_alert('잘못된 접근입니다.', 'back');
        }

        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_site_code = element('s_site_code', $arr_input);
        $s_cate_code = element('s_cate_code', $arr_input);
        $s_campus = element('s_campus', $arr_input);
        $s_consult_type = element('s_consult_type', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $s_is_display = element('s_is_display', $arr_input);
        $s_is_my_contents = element('s_is_my_contents', $arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code', $arr_input);
        $view_type = element('view_type', $arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);
        $get_page_params = 's_keyword='.urlencode($s_keyword);
        $get_page_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_page_params .= '&s_campus='.$s_campus;
        $get_page_params .= '&view_type='.$view_type;
        $get_page_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_page_params .= '&on_off_link_cate_code='.$on_off_link_cate_code.'&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        /*unset($arr_base['site_list'][config_item('app_intg_site_code')]);*/

        // 카테고리 조회
        if ($this->_site_code == config_item('app_intg_site_code')) {
            if (empty($s_site_code) === true) {
                $arr_base['category'] = [];
            } else {
                //$arr_base['category'] = $this->categoryFModel->listSiteCategory($s_site_code);
                $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);
            }
        } else {
            //$arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);
            $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);
        }

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.TypeCcd' => $s_consult_type,
                'b.CampusCcd' => $s_campus,
                'd.OnOffLinkCateCode' => $on_off_link_cate_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword,
                    'b.RegNickName' => $s_keyword
                ]
            ]
        ];

        // 통합사이트일 경우 전체 사이트 조회
        if ($this->_site_code == config_item('app_intg_site_code')) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.SiteCode' => $s_site_code
            ]);
        } else {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.SiteCode' => $this->_site_code
            ]);
        }

        // 공지숨기기
        if ($s_is_display == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.IsBest' => '0'
            ]);
        }

        // 내질문보기
        if ($s_is_my_contents == 1) {
            if (empty($this->session->userdata('mem_idx')) === false) {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => $this->session->userdata('mem_idx'),
                    'b.RegType' => '0'
                ]);
            } else {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => '0',
                    'b.RegType' => '0'
                ]);
            }
        }

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx, b.RegNickName, b.ProdName';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, \'\', m.MemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';
        $column .= ', (SELECT COUNT(*) AS cnt FROM lms_board_r_comment AS temp_c WHERE b.BoardIdx = temp_c.BoardIdx AND temp_c.IsStatus = \'Y\' AND temp_c.IsUse = \'Y\') AS TotalCommentCnt';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        // 통합사이트인 공지만 나오도록
        $arr_condition['RAW'] = [
            ' (CASE WHEN b.IsBest = ' => " '1' THEN b.SiteCode = '{$this->_site_code}' ELSE TRUE END)"
        ];

        //$total_rows = $this->supportBoardTwoWayFModel->listBoardForQna(true, $arr_condition, $s_cate_code);
        $total_rows = $this->supportBoardTwoWayFModel->listBoardForQna(true, $arr_condition, $this->_cate_code);
        $paging = $this->pagination($this->_default_path . '/index/?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);
        if ($total_rows > 0) {
            //$list = $this->supportBoardTwoWayFModel->listBoardForQna(false, $arr_condition, $s_cate_code, $column, $paging['limit'], $paging['offset'], $order_by);
            $list = $this->supportBoardTwoWayFModel->listBoardForQna(false, $arr_condition, $this->_cate_code, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/anonymous', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list' => $list,
            'paging' => $paging,
            'get_params' => $get_params
        ]);
    }

    /**
     * 익명 자유게시판 등록/수정 폼
     */
    public function create()
    {
        if (empty($this->_cate_code) === true) {
            show_alert('잘못된 접근입니다.', 'back');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx', $arr_input);
        $s_site_code = element('s_site_code', $arr_input);
        $s_cate_code = element('s_cate_code', $arr_input);
        $s_campus = element('s_campus', $arr_input);
        $s_consult_type = element('s_consult_type', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $s_is_display = element('s_is_display', $arr_input);
        $s_is_my_contents = element('s_is_my_contents', $arr_input);
        $view_type = element('view_type', $arr_input);
        $page = element('page', $arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code', $arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;
        $get_params .= '&on_off_link_cate_code='.$on_off_link_cate_code;
        $get_params .= '&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 카테고리 조회
        $param_site_code = $this->_site_code == '2000' ? null : $this->_site_code;
        $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($param_site_code);

        //켐퍼스목록
        $arr_base['campus'] = $this->supportBoardTwoWayFModel->listCampusCcd(null);

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
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegNickName, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubJectName
                , IF(RegType=1, \'\', RegMemName) AS RegName
                , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
                , AttachData, Category_String
            ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx, $arr_condition, $column);

            if (empty($data)) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            if ($data['RegType'] == '0' && $data['IsPublic'] == 'N' && $data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                show_alert('잘못된 접근 입니다.', 'back');
            }
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }

            $data['AttachData'] = json_decode($data['AttachData'], true);       //첨부파일
        }

        $this->load->view('support/'.$view_type.'/create_anonymous', [
            'default_path' => $this->_default_path,
            'method' => $method,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_img_cnt
        ]);
    }

    public function show()
    {
        if (empty($this->_cate_code) === true) {
            show_alert('잘못된 접근입니다.', 'back');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx', $arr_input);
        $s_site_code = element('s_site_code', $arr_input);
        $s_cate_code = element('s_cate_code', $arr_input);
        $s_campus = element('s_campus', $arr_input);
        $s_consult_type = element('s_consult_type', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $s_is_display = element('s_is_display', $arr_input);
        $s_is_my_contents = element('s_is_my_contents', $arr_input);
        $view_type = element('view_type', $arr_input);
        $page = element('page', $arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];

        $column = '
            BoardIdx, b.SiteCode, MdCateCode, CampusCcd
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
            , Title, Content, ReadCnt, SettingReadCnt
            , RegDatm, RegNickName
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, \'\', RegMemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName, Category_String
            , AttachData, (ReadCnt + SettingReadCnt) as TotalReadCnt
        ';

        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx, $arr_condition, $column);
        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['AttachData'], 1);

        if ($data['RegType'] == '0' && $data['IsPublic'] == 'N' && $data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);

        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        $this->load->view('support/'.$view_type.'/show_anonymous',[
                'default_path' => $this->_default_path,
                'arr_base' => $arr_base,
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'board_idx' => $board_idx
            ]
        );
    }

    /**
     * 익명 자유게시판 등록/수정
     */
    public function store()
    {
        $idx = '';
        if ($this->_site_code == config_item('app_intg_site_code')) {
            if ($this->_reqP('_method') == 'POST') {
                $s_site_code = $this->_reqP('s_site_code');
            } else {
                $s_site_code = $this->_reqP('put_site_code');
            }
        } else {
            $s_site_code = $this->_reqP('put_site_code');
        }

        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 'reg_nick_name', 'label' => '닉네임', 'rules' => 'trim|required|max_length[20]'],
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

        $inputData = $this->_setInputData($s_site_code, $this->_reqP(null, false), $method);

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);
        $this->json_result($result, $msg, $result);
    }

    /**
     * 익명 자유게시판 삭제
     */
    public function delete()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx', $arr_input);
        $s_site_code = element('s_site_code', $arr_input);
        $s_cate_code = element('s_cate_code', $arr_input);
        $s_campus = element('s_campus', $arr_input);
        $s_consult_type = element('s_consult_type', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $s_is_display = element('s_is_display', $arr_input);
        $s_is_my_contents = element('s_is_my_contents', $arr_input);
        $view_type = element('view_type', $arr_input);
        $page = element('page', $arr_input);
        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx);

        if (empty($result['ret_status']) === false) {
            show_alert('삭제 실패입니다. 관리자에게 문의해주세요.', 'back');
        }

        show_alert('삭제되었습니다.', front_url($this->_default_path.'/index?'.$get_params));
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

    /**
     * 저장 데이터 셋팅
     * @param $site_code
     * @param $input
     * @param $method
     * @return array
     */
    private function _setInputData($site_code, $input, $method){
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx,
                'SiteCode' => (empty($site_code) === false) ? $site_code : $this->_site_code,
                'MdCateCode' => '',
                'CampusCcd' => element('s_campus', $input),
                'RegType' => element('reg_type', $input, 0),
                'Title' => element('board_title', $input),
                'Content' => element('board_content', $input),
                'TypeCcd' => element('s_consult_type', $input),
                'IsPublic' => element('is_public', $input),
                'ReplyStatusCcd' => '621001',
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
                'ProdCode' => element('study_prod_code', $input),
                'RegNickName' => element('reg_nick_name', $input)
            ],
            'board_r_category' => [
                //'site_category' => element('s_cate_code', $input, $this->_cate_code)
                'site_category' => $this->_cate_code
            ]
        ];

        //수정일 경우 사이트코드 제외
        if ($method == 'modify') {
            unset($input_data['board']['SiteCode']);
        }
        return $input_data;
    }

    /**
     * 익명 자유게시판 미사용 처리
     */
    public function disuse()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx', $arr_input);
        $s_site_code = element('s_site_code', $arr_input);
        $s_cate_code = element('s_cate_code', $arr_input);
        $s_campus = element('s_campus', $arr_input);
        $s_consult_type = element('s_consult_type', $arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $s_is_display = element('s_is_display', $arr_input);
        $s_is_my_contents = element('s_is_my_contents', $arr_input);
        $view_type = element('view_type', $arr_input);
        $page = element('page', $arr_input);
        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        $result = $this->supportBoardTwoWayFModel->boardDisuse($board_idx);

        if (empty($result['ret_status']) === false) {
            show_alert('삭제 실패입니다. 관리자에게 문의해주세요.', 'back');
        }

        show_alert('삭제되었습니다.', front_url($this->_default_path.'/index?'.$get_params));
    }

    //허용 카테고리 체크
    private function _checkAllowCate() {
        foreach ($this->_allow_cate_code as $key) {
            if($key == $this->_cate_code) return true;
        }
        return false;
    }
}