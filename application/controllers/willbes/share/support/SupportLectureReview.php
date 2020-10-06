<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportLectureReview extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', '_lms/sys/site', '_lms/sys/code','_lms/product/base/subject');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강평/합격수기관리 > 수강후기 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code', $arr_input);
        $view_type = element('view_type',$arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);
        $get_page_params = 's_keyword='.urlencode($s_keyword);
        $get_page_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_page_params .= '&s_campus='.$s_campus;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_page_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_page_params .= '&on_off_link_cate_code='.$on_off_link_cate_code.'&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 과목
        $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);

        // 카테고리 조회
        if ($this->_site_code == config_item('app_intg_site_code')) {
            if (empty($s_site_code) === true) {
                $arr_base['category'] = [];
            } else {
                $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($s_site_code);
            }
        } else {
            $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);
        }

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardTwoWayFModel->listCampusCcd($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.ProfIdx' => $prof_idx,
                'b.SubjectIdx' => $subject_idx,
                'b.CampusCcd' => $s_campus,
                'd.OnOffLinkCateCode' => $on_off_link_cate_code,
                'b.SiteCode' => $s_site_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
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

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx, b.ProdCode, b.ProdName, b.SubjectIdx';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, b.RegMemName, m.MemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName, c.CateCode';
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

        $total_rows = $this->supportBoardTwoWayFModel->listBoardForQna(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path . '/index/?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForQna(false,$arr_condition, $s_cate_code, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/lecture_review', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'get_params' => $get_params,
        ]);
    }
}