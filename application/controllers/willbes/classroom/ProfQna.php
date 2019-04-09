<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class ProfQna extends SupportQna
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', '_lms/sys/site', '_lms/sys/code', 'downloadF');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '66';
    protected $_default_path = '/classroom/profQna';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    private $_groupCcd = [
        'consult_ccd' => '702',   //유형 그룹 코드 = 상담유형
        'reply_status_ccd_not_complete' => '621001',    //답변등록상태 (미답변)
        'reply_status_ccd_complete' => '621004'         //답변등록상태 (답변완료)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 학습Q&A 인덱스
     */
    public function index($params = [])
    {
        $tab_bm_idx = null;
        $list = [];
        $arr_input = $this->_reqG(null);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $replay_type = element('replay_type',$arr_input);
        $tab = element('tab',$arr_input, 'professor');

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&tab='.$tab;
        /*$get_params = http_build_query($arr_input);*/

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);
        /*unset($arr_base['site_list'][config_item('app_intg_site_code')]);*/

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        //상품정보
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'RegMemIdx' => $this->session->userdata('mem_idx')
            ],
        ];
        $arr_condition['RAW'] = ['ProdCode IS' => ' NOT NULL'];
        $arr_base['prof_list'] = $this->supportBoardTwoWayFModel->getProfForMemberList($arr_condition);

        //과목
        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'RegMemIdx' => $this->session->userdata('mem_idx')
            ],
        ];
        $arr_condition['RAW'] = ['ProdCode IS' => ' NOT NULL'];
        $arr_base['subject_list'] = $this->supportBoardTwoWayFModel->getSubjectForMemberList($arr_condition);

        $arr_condition = [
            'EQ' => [
                'RegMemIdx' => $this->session->userdata('mem_idx'),
                'RegType' => '0',
                'IsUse' => 'Y'
            ]
        ];
        //1:1상담
        $arr_condition_not_complete['EQ'] = array_merge($arr_condition['EQ'], [
            'BmIdx' => '48',
            'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_not_complete']
        ]);
        $count_complete_type['counsel']['not_complete'] = $this->supportBoardTwoWayFModel->getCountBoard($arr_condition_not_complete);

        $arr_condition_complete['EQ'] = array_merge($arr_condition['EQ'], [
            'BmIdx' => '48',
            'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_complete']
        ]);
        $count_complete_type['counsel']['complete'] = $this->supportBoardTwoWayFModel->getCountBoard($arr_condition_complete);

        //학습상담
        $arr_condition_not_complete['EQ'] = array_merge($arr_condition['EQ'], [
            'BmIdx' => '66',
            'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_not_complete']
        ]);
        $count_complete_type['professor']['not_complete'] = $this->supportBoardTwoWayFModel->getCountBoard($arr_condition_not_complete);

        $arr_condition_complete['EQ'] = array_merge($arr_condition['EQ'], [
            'BmIdx' => '66',
            'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_complete']
        ]);
        $count_complete_type['professor']['complete'] = $this->supportBoardTwoWayFModel->getCountBoard($arr_condition_complete);

        // 선택된 탭에 맞는 정보 조회
        $is_tab_select = isset($tab);
        switch ($tab) {
            case "counsel" :
            case "professor" :
                $arr_input['tab'] = $tab;
                break;
            default;
                show_alert("잘못된 접근입니다.", "/", false);
                break;
        }

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.RegMemIdx' => $this->session->userdata('mem_idx'),
                'b.RegType' => '0',
                'b.IsUse' => 'Y',
                'b.SiteCode' => $s_site_code,
                'b.TypeCcd' => $s_consult_type,
                'b.ProfIdx' => $prof_idx,
                'b.SubjectIdx' => $subject_idx,
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        if ($replay_type == 'Y') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_complete']
            ]);
        } else if ($replay_type == 'N') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_not_complete']
            ]);
        }

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx';
        $column .= ', b.ProfIdx, b.SubjectIdx, b.SubjectName, b.ProfName, b.ProdName';
        $column .= ', b.Title, b.Content, b.ReplyContent, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, \'\', RegMemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,'');

        $paging = $this->pagination('/classroom/profQna/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,'',$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('classroom/qna/index', [
            'arr_base' => $arr_base,
            'count_complete_type' => $count_complete_type,
            'arr_input' => $arr_input,
            'list' => $list,
            'paging' => $paging,
            /*'get_params' => $get_params,*/
            'is_tab_select' => $is_tab_select
        ]);
    }

    /**
     * 학습Q&A 등록 폼
     */
    public function create()
    {
        $arr_input = $this->_reqG(null);
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_consult_type = element('s_consult_type',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $tab = element('tab',$arr_input,'counsel');
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&tab='.$tab;
        $get_params .= '&page='.$page;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === true) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        } else {
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

        $this->load->view('support/create_prof_qna', [
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

    /**
     * 학습Q&A 뷰 페이지
     */
    public function show()
    {
        $arr_input = $this->_reqG(null);
        $board_idx = element('board_idx',$arr_input);
        $tab = element('tab',$arr_input,'professor');
        $get_params = 'tab='.$tab;

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
            , ProfIdx, SubjectIdx, ProdName
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
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
        $this->load->view('support/show_prof_qna',[
                'default_path' => $this->_default_path,
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'board_idx' => $board_idx,
                'reply_type_complete' => $this->_groupCcd['reply_status_ccd_complete']
            ]
        );
    }
}