<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportQna extends BaseSupport
{
    protected $models = array('support/supportBoardF', '_lms/sys/site', '_lms/sys/code');
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_keyword = element('s_keyword',$arr_input);

        //var_dump($arr_input);
        $list = [];

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, \'\', b.RegMemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name,';

        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];
        $total_rows = $this->supportBoardFModel->listBoardTwoWay(true, $arr_condition);

        $paging = $this->pagination('/support/notice/index/?s_keyword='.$s_keyword,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardTwoWay(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/qna', [
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
        //사이트목록
        $arr_site = $this->siteModel->getSiteArray(false);

        //켐퍼스목록
        $campus_ccd = $this->supportBoardFModel->listCampusCcd(null);

        //구분목록 (학원,온라인)
        $onoff_type = $this->supportBoardFModel->listSiteOnOffType();

        //상담유형
        $arr_consult_type = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_keyword='.$s_keyword.'&page='.$page;

        $method = 'POST';
        $data = null;
        $board_idx = null;

        $this->load->view('support/create_qna', [
            'method' => $method,
            'arr_site' => $arr_site,
            'campus_ccd' => $campus_ccd,
            'onoff_type' => $onoff_type,
            'arr_consult_type' => $arr_consult_type,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->supportBoardFModel->_attach_img_cnt
        ]);
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
        $site_onoff_info = $this->supportBoardFModel->getSiteOnOffType($this->_site_code);

        $method = 'add';
        $rules = [
            ['field' => 's_consult_type', 'label' => '상담유형', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        //통합사이트 제외한 나머지 사이트 과정 항목 체크
        if ($this->_site_code == config_item('app_intg_site_code')) {
            $rules = array_merge($rules, [
                ['field' => 's_site_code', 'label' => '과정', 'rules' => 'trim|required|integer']
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
        $result = $this->supportBoardFModel->{$method . 'Board'}($inputData, $idx);

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
                'ReplyStatusCcd' => '621001',
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
            ],
            'board_r_category' => [
                'site_category' => config_app('CateCode')
            ]
        ];

        return$input_data;
    }
}