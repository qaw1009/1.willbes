<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportQna extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', '_lms/sys/site', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('create', 'store');

    protected $_bm_idx = '48';       //bmidx : faq 게시판
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    private $_groupCcd = [
        'consult_ccd' => '622'   //유형 그룹 코드 = 상담유형
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
        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        //구분목록 (학원,온라인)
        $arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword
                    ,'Content' => $s_keyword
                ]
            ]
        ];

        // 통합사이트일 경우 전체 사이트 조회
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'SiteCode' => $this->_site_code
            ]);
        }

        $column = 'BoardIdx, CampusCcd, TypeCcd, IsBest, RegType';
        $column .= ', Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ', AttachData,DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', IsPublic, CampusCcd_Name, TypeCcd_Name';
        $column .= ', SiteName, ReplyStatusCcd, ReplyStatusCcd_Name';
        $column .= ', IF(RegType=1, \'\', RegMemName) AS RegName';
        $column .= ', IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition);

        $paging = $this->pagination('/support/qna/index/?s_keyword='.$s_keyword,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/qna', [
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    /**
     * 고객센터 > 상담게시판 등록/수정 폼
     */
    public function create($params = [])
    {
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

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_keyword='.$s_keyword.'&page='.$page;

        $method = 'POST';
        $data = null;
        $board_idx = null;

        $this->load->view('support/create_qna', [
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
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_keyword='.$s_keyword.'&page='.$page;

        $board_idx = element('board_idx',$arr_input);
        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];

        // 통합사이트일 경우 전체 사이트 조회
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'SiteCode' => $this->_site_code
            ]);
        }

        $column = '
            BoardIdx, SiteCode, MdCateCode, CampusCcd
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore
            , Title, Content, ReadCnt, SettingReadCnt
            , RegDatm
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name
            , ReplyStatusCcd_Name
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
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

        print_r($data['AttachData']);

        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        /* 이전글, 다음글*/


        $pre_data = null;
        $next_data = null;

        $this->load->view('support/show_qna',[
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
            ]
        );
    }

    /**
     * 고객센터 > 상담게시판 등록/수정
     * @param array $params
     */
    public function store($params = [])
    {
        $idx = '';
        $arr_input = array_merge($this->_reqG(null));
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_keyword='.$s_keyword.'&page='.$page;

        //캠퍼스 사용 유/무 조회
        $site_onoff_info = $this->supportBoardTwoWayFModel->getSiteOnOffType($this->_site_code);

        $method = 'add';
        $rules = [
            ['field' => 's_site_code', 'label' => '과정', 'rules' => 'trim|required|integer'],
            ['field' => 's_consult_type', 'label' => '상담유형', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

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

        if ($this->validate($rules) === false) {
            show_alert('필수항목이 없습니다.', 'back');
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);

        show_alert('저장되었습니다.', '/support/qna/index?'.$get_params);
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
            ],
            'board_r_category' => [
                'site_category' => element('s_cate_code', $input, $this->_site_code)
            ]
        ];

        return$input_data;
    }
}