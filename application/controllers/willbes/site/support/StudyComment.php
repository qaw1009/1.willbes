<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudyComment extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = 85;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));

        if ($this->_site_code == '2004') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base['series'] = $this->baseProductFModel->listSeriesCategoryMapping($this->_site_code, $this->_cate_code);
            /*$arr_base['subject'] = $this->baseProductFModel->listSubjectSeriesMapping($this->_site_code, $this->_cate_code, element('series_ccd', $arr_input));*/
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, element('cate_code', $arr_input));
        }

        $this->load->view('site/professor/study_comment_index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base
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
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input,1);

        $get_params = 'search_cate_code='.$cate_code.'&search_prof_idx='.$prof_idx.'&search_subject_idx='.$subject_idx;
        $get_params .= '&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'SubjectIdx' => $subject_idx,
                'ProfIdx' => $prof_idx
            ],
            'LKB' => [
                'Category_String' => $cate_code
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword,
                    'Content' => $s_keyword
                ]
            ]
        ];

        $column = 'BoardIdx, IsBest, RegType, RegMemIdx, RegMemId, RegMemName';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',AttachData, DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ',SubjectIdx, ProfIdx, ProdCode';
        $column .= ',SubjectName, ProfName, ProdName';
        $column .= ',ProdApplyTypeCcd, ProdCode, LecScore';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $list = [];
        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition);
        /*$paging = $this->pagination('/support/studyComment/listAjax/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);*/
        $paging = $this->pagination('/support/studyComment/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
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
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input,1);

        $get_params = 'search_cate_code='.$cate_code.'&search_prof_idx='.$prof_idx.'&search_subject_idx='.$subject_idx;
        $get_params .= '&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'SubjectIdx' => $subject_idx,
                'ProfIdx' => $prof_idx
            ],
            'LKB' => [
                'Category_String' => $cate_code
            ],
            'ORG' => [
                'LKB' => [
                    'Title' => $s_keyword,
                    'Content' => $s_keyword
                ]
            ]
        ];

        $total_rows = $this->supportBoardTwoWayFModel->listBoard(true, $arr_condition);
        /*$paging = $this->pagination('/support/studyComment/listAjax/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);*/
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