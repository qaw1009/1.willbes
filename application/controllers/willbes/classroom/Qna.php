<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class Qna extends SupportQna
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', '_lms/sys/site', '_lms/sys/code', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '48';
    protected $_default_path = '/classroom/qna';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입
    private $_groupCcd = [
        'consult_ccd' => '622',   //유형 그룹 코드 = 상담유형
        'reply_status_ccd_not_complete' => '621001',    //답변등록상태 (미답변)
        'reply_status_ccd_complete' => '621004'         //답변등록상태 (답변완료)
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 1:1상담 인덱스
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
        $tab = element('tab',$arr_input,'counsel');

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_consult_type='.$s_consult_type;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&tab='.$tab;
        /*$get_params = http_build_query($arr_input);*/

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);
        /*unset($arr_base['site_list'][config_item('app_intg_site_code')]);*/

        //상담유형
        $arr_base['consult_type'] = $this->codeModel->getCcd($this->_groupCcd['consult_ccd']);

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
                'BmIdx' => $this->_bm_idx,
                'RegMemIdx' => $this->session->userdata('mem_idx'),
                'RegType' => '0',
                'IsUse' => 'Y',
                'b.SiteCode' => $s_site_code,
                'TypeCcd' => $s_consult_type,
                'ProfIdx' => $prof_idx,
                'SubjectIdx' => $subject_idx
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword,
                    'Content' => $s_keyword
                ]
            ]
        ];

        if ($replay_type == 'Y') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_complete']
            ]);
        } else if ($replay_type == 'N') {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'ReplyStatusCcd' => $this->_groupCcd['reply_status_ccd_not_complete']
            ]);
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
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition, '');

        $paging = $this->pagination('/classroom/qna/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition, '',$column,$paging['limit'],$paging['offset'],$order_by);
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
}