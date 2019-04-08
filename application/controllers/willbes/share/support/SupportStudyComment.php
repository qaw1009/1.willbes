<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportStudyComment extends BaseSupport
{
    protected $models = array('product/baseProductF', 'support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store');

    protected $_bm_idx;
    protected $_reg_type = 0;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강후기 리스트 (사용처 : 상품상세페이지)
     */
    public function listFrame()
    {
        $arr_input = array_merge($this->_reqG(null));
        $cate_code = element('cate',$arr_input);
        $prod_code = element('prod_code',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 'cate='.$cate_code.'&prod_code='.$prod_code;
        $get_params .= '&page='.$page;

        $arr_best_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'IsBest' => '1',
                'ProdCode' => $prod_code
            ]
        ];

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'ProdCode' => $prod_code
            ]
        ];

        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $column = 'BoardIdx, IsBest, RegType, RegMemIdx';
        $column .= ',IF(b.RegType=1, b.RegMemId, m.MemId) AS RegMemId, IF(b.RegType=1, b.RegMemName, m.MemName) AS RegMemName';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ',SubjectIdx, ProfIdx, b.ProdCode';
        $column .= ',SubjectName, ProfName, ProdName';
        $column .= ',ProdApplyTypeCcd, LecScore';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,$cate_code);
        $paging = $this->pagination('/support/studyComment/listFrame/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$cate_code,$column,$paging['limit'],$paging['offset'],$order_by);
        }
        $list_best = $this->supportBoardTwoWayFModel->listBoard(false,$arr_best_condition,$cate_code,$column,2,0,['LecScore' => 'Desc','BoardIdx'=>'Desc']);

        $this->load->view('support/frame/study', [
            'arr_input' => $arr_input,
            'paging' => $paging,
            'total_rows' => $total_rows,
            'list' => $list,
            'list_best' => $list_best
        ]);
    }

    /**
     * 수강후기 리스트 (사용처 : 레이어팝업)
     */
    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));
        $site_code = element('site_code', $arr_input, $this->_site_code);
        $cate_code = element('cate_code', $arr_input, $this->_cate_code);
        $prod_code = element('prod_code', $arr_input);
        $arr_base['subject_idx'] = element('subject_idx', $arr_input);
        $arr_base['subject_name'] = element('subject_name', $arr_input);
        $arr_base['prof_idx'] = element('prof_idx', $arr_input);

        /*if (empty($prod_code) === true || empty($arr_base['subject_idx']) === true || empty($arr_base['prof_idx']) === true) {
            show_alert('강좌 정보가 없습니다.', 'close');
        }*/

        if (element('show_onoff', $arr_input) == 'on') {
            $style_display['list'] = 'none';
            $style_display['show'] = 'block';
        } else {
            $style_display['list'] = 'block';
            $style_display['show'] = 'none';
        }

        if (config_app('SiteGroupCode') == '1002') {
            // 사이트그룹이 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($site_code, $cate_code);
            $arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($site_code, $cate_code, element('series_ccd', $arr_input));
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($site_code, $cate_code);
        }

        // 전체 교수 목록
        $arr_base['professor'] = $this->baseProductFModel->listProfessorSubjectMapping($site_code, ['ProfReferData', 'ProfEventData', 'IsNew'], $cate_code);

        /*// 수강중인 강좌 목록 [단강좌 AND 수강이력 AND 강좌종료일 + 30 데이터]
        $arr_condition = [
            'RAW' => [
                'MemIdx = ' => empty($this->session->userdata('mem_idx')) === true ? '\'\'' : $this->session->userdata('mem_idx'),
                'RealLecEndDate >= ' => 'DATE_FORMAT(DATE_ADD(NOW(), INTERVAL +30 DAY),\'%Y-%m-%d\')',
                'lastStudyDate != ' => '\'\''
            ]
        ];
        $arr_base['on_my_lecture'] = $this->supportBoardTwoWayFModel->getOnMyLectureArray($arr_condition);*/

        $this->load->view('support/popup_study', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'style_display' => $style_display
        ]);
    }

    /**
     * ajax list
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $cate_code = element('search_cate_code',$arr_input);
        $subject_idx = (element('search_subject_idx',$arr_input) == 'all') ? '' : element('search_subject_idx',$arr_input);
        $prof_idx = element('search_prof_idx',$arr_input);
        $prod_code = element('search_prod_code',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $orderby = element('orderby',$arr_input, 'best');

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'SubjectIdx' => $subject_idx,
                'ProfIdx' => $prof_idx,
                'ProdCode' => $prod_code
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword,
                    'Content' => $s_keyword
                ]
            ]
        ];

        /*if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'LKB' => [
                    'Category_String' => $cate_code
                ]
            ]);
        }*/

        $column = 'BoardIdx, IsBest, RegType, RegMemIdx';
        $column .= ',IF(b.RegType=1, b.RegMemId, m.MemId) AS RegMemId, IF(b.RegType=1, b.RegMemName, m.MemName) AS RegMemName';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ',SubjectIdx, ProfIdx, b.ProdCode';
        $column .= ',SubjectName, ProfName, ProdName';
        $column .= ',ProdApplyTypeCcd, LecScore';

        switch ($orderby) {
            case "best" :
                $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
                break;
            case "date" :
                $order_by = ['BoardIdx'=>'Desc'];
                break;
            case "score" :
                $order_by = ['LecScore'=>'Desc','BoardIdx'=>'Desc'];
                break;
            default :
                $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
                break;
        }

        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,'');
        $paging = $this->pagination('/support/studyComment/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $cate_code = element('search_cate_code',$arr_input);
        $subject_idx = (element('search_subject_idx',$arr_input) == 'all') ? '' : element('search_subject_idx',$arr_input);
        $prof_idx = element('search_prof_idx',$arr_input);
        $prod_code = element('search_prod_code',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SubjectIdx' => $subject_idx,
                'b.ProfIdx' => $prof_idx,
                'b.ProdCode' => $prod_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,$cate_code);
        $paging = $this->pagination('/support/studyComment/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        return $this->response([
            'paging' => $paging,
        ]);
    }

    /**
     * 수강후기 등록/수정
     */
    public function store()
    {
        $idx = '';
        $method = 'add';
        $msg = '저장되었습니다';

        $rules = [
            ['field' => 'study_cate_code', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'study_subject_idx', 'label' => '과목', 'rules' => 'trim|required'],
            ['field' => 'study_prof_idx', 'label' => '교수', 'rules' => 'trim|required'],
            ['field' => 'study_prod_code', 'label' => '강좌', 'rules' => 'trim|required|integer'],
            ['field' => 'start_count', 'label' => '평점', 'rules' => 'trim|required|integer'],
            ['field' => 'study_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'study_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('idx');
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);

        $this->json_result($result, $msg, $result);
    }

    /**
     * 교수정보조회
     */
    public function ajaxProfInfo()
    {
        $data = [];
        $arr_input = array_merge($this->_reqP(null));

        if (empty(element('cate_code', $arr_input)) === false && empty(element('subject_idx', $arr_input)) === false) {
            $data = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, element('cate_code', $arr_input), element('subject_idx', $arr_input));
        }

        $this->json_result(true, '', [], array_pluck($data, 'wProfName', 'ProfIdx'));
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
                'SiteCode' => $this->_site_code,
                'RegType' => '0',
                'IsBest' => '0',
                'Title' => element('study_title', $input),
                'Content' => element('study_content', $input),
                'ReadCnt' => '0',
                'SettingReadCnt' => '0',
                'ProfIdx' => element('study_prof_idx', $input),
                'SubjectIdx' => element('study_subject_idx', $input),
                'ProdApplyTypeCcd' => '636001',     //온라인,학원강좌 공통코드
                'LecScore' => element('start_count', $input),
                'ProdCode' => element('study_prod_code', $input),
            ],
            'board_r_category' => [
                'site_category' => element('study_cate_code', $input)
            ]
        ];

        return$input_data;
    }
}