<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportQna extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', '_lms/sys/site', '_lms/sys/code');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array('create', 'store');

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    private $_groupCcd = [
        'consult_ccd' => '622',   //유형 그룹 코드 = 상담유형
        'reply_status_ccd_complete' => '621004'  //답변등록상태 (답변완료)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 고객센터 > 상담게시판 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);

        //구분목록 (학원,온라인)
        $arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'SiteCode' => $s_site_code,
                'TypeCcd' => $s_consult_type,
                'ProfIdx' => $prof_idx,
                'SubjectIdx' => $subject_idx
            ],
            'LKB' => [
                'Category_String'=>$this->_cate_code
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword,
                    'Content' => $s_keyword
                ]
            ]
        ];

        // 통합사이트일 경우 전체 사이트 조회
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'SiteCode' => $this->_site_code
            ]);
        }

        // 공지숨기기
        if ($s_is_display == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'IsBest' => '0'
            ]);
        }

        // 내질문보기
        if ($s_is_my_contents == 1) {
            if (empty($this->session->userdata('mem_idx')) === false) {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'RegMemIdx' => $this->session->userdata('mem_idx'),
                    'RegType' => '0'
                ]);
            } else {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'RegMemIdx' => '0',
                    'RegType' => '0'
                ]);
            }
        }

        $column = 'BoardIdx, CampusCcd, TypeCcd, IsBest, RegType, RegMemIdx';
        $column .= ', Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ', AttachData,DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', IsPublic, CampusCcd_Name, TypeCcd_Name';
        $column .= ', SiteName, ReplyStatusCcd, ReplyStatusCcd_Name';
        $column .= ', IF(RegType=1, \'\', RegMemName) AS RegName';
        $column .= ', IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition);

        $paging = $this->pagination($this->_default_path.'/qna/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/qna', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'get_params' => $get_params
        ]);
    }

    /**
     * 고객센터 > 상담게시판 등록/수정 폼
     */
    public function create()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);

        //켐퍼스목록
        $arr_base['campus'] = $this->supportBoardTwoWayFModel->listCampusCcd(null);

        //구분목록 (학원,온라인)
        $arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

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
            BoardIdx, SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
            , Title, Content, ReadCnt, SettingReadCnt
            , RegDatm, RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, \'\', RegMemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
            , AttachData, Category_String
        ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);

            if (empty($data)) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }
        }

        $this->load->view('support/'.$view_type.'/create_qna', [
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
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
            BoardIdx, SiteCode, MdCateCode, CampusCcd
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
            , Title, Content, ReadCnt, SettingReadCnt
            , RegDatm
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, \'\', RegMemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
            , AttachData
        ';

        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
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

        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        $this->load->view('support/'.$view_type.'/show_qna',[
                'default_path' => $this->_default_path,
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'board_idx' => $board_idx,
                'reply_type_complete' => $this->_groupCcd['reply_status_ccd_complete']
            ]
        );
    }

    /**
     * 고객센터 > 상담게시판 등록/수정
     */
    public function store()
    {
        $idx = '';
        $get_params = '';
        $arr_input = array_merge($this->_reqG(null));
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        //캠퍼스 사용 유/무 조회
        $site_onoff_info = $this->supportBoardTwoWayFModel->getSiteOnOffType($this->_reqP('s_site_code'));

        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 's_consult_type', 'label' => '상담유형', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        switch ($this->_default_path) {
            case '/support' :    //고객센터 상담게시판
                $get_params .= 's_keyword='.$s_keyword.'&page='.$page;

                $rules = array_merge($rules, [
                    ['field' => 's_site_code', 'label' => '과정', 'rules' => 'trim|required|integer'],
                ]);

                //통합사이트 제외한 나머지 카테고리 항목 체크
                if ($this->_reqP('s_site_code') != config_item('app_intg_site_code')) {
                    $rules = array_merge($rules, [
                        ['field' => 's_cate_code', 'label' => '카테고리', 'rules' => 'trim|required|integer']
                    ]);
                }

                //접근 사이트코드가 캠퍼스 사용중일 캠퍼스 항목 체크
                if ($site_onoff_info['IsCampus'] == 'Y') {
                    $rules = array_merge($rules, [
                        ['field' => 's_campus', 'label' => '캠퍼스', 'rules' => 'trim|required|integer']
                    ]);
                }
                break;

            case "/prof" :   //교수게시판 학습Q&A
                $get_params .= 's_keyword='.urlencode($s_keyword);
                $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
                $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
                $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
                $get_params .= '&page='.$page;

                $rules = array_merge($rules, [
                    ['field' => 's_cate_code', 'label' => '카테고리', 'rules' => 'trim|required|integer'],
                    ['field' => 's_prof_idx', 'label' => '교수식별자', 'rules' => 'trim|required|integer'],
                    ['field' => 's_subject_idx', 'label' => '과목식별자', 'rules' => 'trim|required|integer']
                ]);
                break;
        }

        if ($this->validate($rules) === false) {
            show_alert('필수항목이 없습니다.', 'back');
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);

        if (empty($result['ret_status']) === false) {
            show_alert('등록 실패입니다. 확인 후 다시 등록해 주세요.', 'back');
        }

        show_alert($msg, site_url($this->_default_path.'/qna/index?'.$get_params));
    }

    /**
     * 고객센터 > 상담게시판 삭제
     */
    public function delete()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx, $this->_groupCcd['reply_status_ccd_complete']);

        if (empty($result['ret_status']) === false) {
            show_alert('삭제 실패입니다. 관리자에게 문의해주세요.', 'back');
        }

        show_alert('삭제되었습니다.', $this->_default_path.'/qna/index?'.$get_params);
    }

    /**
     * 저장 데이터 셋팅
     * @param $input
     * @return array
     */
    private function _setInputData($input){
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx,
                'SiteCode' => element('s_site_code', $input, $this->_site_code),
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
                'ProfIdx' => element('s_prof_idx', $input),
                'SubjectIdx' => element('s_subject_idx', $input)
            ],
            'board_r_category' => [
                'site_category' => element('s_cate_code', $input, $this->_site_code)
            ]
        ];

        return$input_data;
    }
}