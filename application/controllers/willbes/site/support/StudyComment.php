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
        $page = element('page',$arr_input);

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
        $paging = $this->pagination('/support/studyComment/listAjax/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    public function ajaxPaging()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $cate_code = element('search_cate_code',$arr_input);
        $subject_idx = (element('search_subject_idx',$arr_input) == 'all') ? '' : element('search_subject_idx',$arr_input);
        $prof_idx = element('search_prof_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);

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
        $paging = $this->pagination('/support/studyComment/listAjax/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function ajaxProfInfo()
    {
        $data = [];
        $arr_input = array_merge($this->_reqP(null));

        if (empty(element('cate_code', $arr_input)) === false && empty(element('subject_idx', $arr_input)) === false) {
            $data = $this->baseProductFModel->listProfessorSubjectMapping($this->_site_code, null, element('cate_code', $arr_input), element('subject_idx', $arr_input));
        }

        $this->json_result(true, '', [], array_pluck($data, 'wProfName', 'ProfIdx'));
    }
}