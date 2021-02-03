<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportLectureReview extends BaseSupport
{
    protected $models = array('categoryF', 'product/baseProductF', 'support/supportBoardTwoWayF', 'product/professorF', 'order/orderListF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('create');

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
        $arr_input = $this->_reqG(null);
        $site_code = element('site_code', $arr_input, $this->_site_code);
        $s_cate_code = element('s_cate_code', $arr_input);
        $prof_idx = element('prof_idx', $arr_input);
        $subject_idx = element('subject_idx', $arr_input);
        $orderby = element('orderby',$arr_input, 'best');

        $arr_check = ['s_cate_code','prof_idx','subject_idx'];
        foreach ($arr_input as $key => $val){
            if(in_array($key,$arr_check) === true){
                if(!(empty($s_cate_code) === false && empty($prof_idx) === false && empty($subject_idx) === false)){
                    show_alert('잘못된 접근 입니다.', 'back');
                }
                break;
            }
        }

        $arr_base['board_idx'] = element('board_idx', $arr_input);

        // 카테고리 조회
        //$arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);

        // 카테고리별 과목 조회
        //$arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $s_cate_code);

        // 교수 목록 조회
        $group_by = ' group by PSC.SubjectIdx, P.ProfIdx ';
        $arr_base['professor'] = $this->baseProductFModel->listProfessorSubjectMapping($site_code, ['ProfReferData', 'ProfEventData', 'IsNew'], '', '', '', [], $group_by);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.SubjectIdx' => $subject_idx,
                'b.ProfIdx' => $prof_idx,
                //'b.ProfSiteCode' => $this->_site_code
            ],
            'RAW' => [
                'b.ProfIdx is not ' => 'null'
            ]
        ];

        $column = 'b.BoardIdx, b.IsBest, b.RegType, b.RegMemIdx';
        $column .= ',IF(b.RegType=1, b.RegMemId, m.MemId) AS RegMemId, IF(b.RegType=1, b.RegMemName, m.MemName) AS RegMemName';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ',b.SubjectIdx, b.ProfIdx, b.ProdCode';
        $column .= ',b.SubjectName, b.ProdName, f.wProfName as ProfName';
        $column .= ',ProdApplyTypeCcd, LecScore';

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        switch ($orderby) {
            case "best" :
                $order_by = ['IsBest'=>'Desc','RegDatm'=>'Desc','BoardIdx'=>'Desc'];
                break;
            case "date" :
                $order_by = ['RegDatm'=>'Desc','BoardIdx'=>'Desc'];
                break;
            case "score" :
                $order_by = ['LecScore'=>'Desc','RegDatm'=>'Desc','BoardIdx'=>'Desc'];
                break;
            default :
                $order_by = ['IsBest'=>'Desc','RegDatm'=>'Desc','BoardIdx'=>'Desc'];
                break;
        }

        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition,$s_cate_code);
        $paging = $this->pagination($this->_default_path .'/index',$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$s_cate_code,$column,$paging['limit'],$paging['offset'],$order_by,$order_by);
        }

        $this->load->view('support/lecture_review', [
            'default_path' => $this->_default_path,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'paging' => $paging,
            'list' => $list,
            'orderby' => $orderby,
            'site_code' => $site_code
        ]);
    }

    public function create()
    {
        $arr_input = $this->_reqG(null);
        $order_idx = element('o', $arr_input);
        $arr_base['site_code'] = element('site_code', $arr_input);
        $arr_base['prod_code'] = element('prod_code', $arr_input);
        $arr_base['cate_code'] = element('cate_code', $arr_input);
        $arr_base['subject_idx'] = element('subject_idx', $arr_input);
        $arr_base['subject_name'] = element('subject_name', $arr_input);
        $arr_base['prof_idx'] = element('prof_idx', $arr_input);
        $arr_base['board_idx'] = element('board_idx', $arr_input);

        if(empty($order_idx) === true || empty($arr_base['prof_idx']) === true || empty($arr_base['prod_code']) === true || empty($arr_base['subject_idx']) === true || empty($arr_base['subject_name']) === true){
            show_alert('잘못된 접근입니다.', 'back');
        }

        // 교수 정보 조회
        $prof_data = $this->professorFModel->findProfessorByProfIdx($arr_base['prof_idx']);
        if(empty($prof_data['IsOpenStudyComment']) === true || $prof_data['IsOpenStudyComment'] !== 'Y'){
            show_alert('잘못된 접근입니다.', 'back');
        }

        // 주문정보 조회
        $order_data = $this->orderListFModel->findOrderByOrderIdx($order_idx, $this->session->userdata('mem_idx'));
        if(empty($order_data) === true){
            show_alert('잘못된 접근입니다.', 'back');
        }

        $this->load->view('support/write_review', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
        ]);
    }

}