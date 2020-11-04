<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportExamQuestion extends BaseSupport
{
    protected $models = array('support/supportBoardF', '_lms/sys/code', '_lms/product/base/subject', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array('download');

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
    private $_groupCcd = [
        'type_group_ccd_area' => '631'              //유형 그룹 코드 = 지역
    ];

    private $arr_swich;
    private $_on_off_swich = [
        '60' => [                               // bm_idx 수험정보게시판 -> 기출문제
            'site_code' => ['2017','2018'],     // 적용 사이트 [임용]
            'school_year' => '학년도',
            'compare_year' => '9',              // 연도 설정
        ]
    ];
    
    public function __construct()
    {
        parent::__construct();

        $this->arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($this->arr_swich) === false && in_array($this->_site_code,$this->arr_swich['site_code']) === true)){
            $this->arr_swich = null;
        }
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_keyword = element('s_keyword',$arr_input);
        $s_area = element('s_area',$arr_input);
        $s_year = element('s_year',$arr_input);
        $s_subject = element('s_subject',$arr_input);
        $view_type = element('view_type',$arr_input);
        $file_type = element('file_type', $arr_input);
        $get_page_params = 's_keyword='.$s_keyword;
        $get_page_params .= '&view_type='.$view_type;
        $get_page_params .= '&s_area='.$s_area;
        $get_page_params .= '&s_year='.$s_year;
        $get_page_params .= '&s_subject='.$s_subject;

        $arr_base['school_year'] = '연도';
        $arr_base['compare_year'] = 5;

        //지역
        $arr_base['area'] = $this->codeModel->getCcd($this->_groupCcd['type_group_ccd_area']);

        //과목
        $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);

        $list = [];
        $arr_condition = [
            'EQ' => [
                /*'b.SiteCode' => $this->_site_code,*/
                'b.BmIdx' => $this->_bm_idx,
                'AreaCcd' => $s_area,
                'ExamProblemYear' => $s_year,
                'SubjectIdx' => $s_subject,
                'b.IsUse' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd, b.ExamProblemYear
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->supportBoardFModel->listBoardForSiteGroup(true, $this->_site_code, $cate_code, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/examQuestion/index/cate/'.$this->_cate_code.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/' . $file_type . 'examQuestion', [
            'default_path' => $this->_default_path,
            'get_params' => $get_params,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'arr_swich' => $this->arr_swich
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $view_type = element('view_type',$arr_input);

        $get_params = 's_keyword='.$s_keyword;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        #-------------------------------- 게시글 조회
        $arr_condition = [
            'EQ' => [
                /*'b.SiteCode' => $this->_site_code*/
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd, b.ExamProblemYear
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code,$cate_code,$board_idx, $arr_condition, $column);

        if (empty($data) === true) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        #-------------------------------- 게시글 조회

        #--------------------------------  이전글, 다음글 조회 : 베스트/핫 일경우 무시하고 BoardIdx 로 비교 , 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition_base = [
            'EQ' => [
                /*'b.SiteCode' => $this->_site_code*/
                'b.IsBest' => '0'
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

        if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition_base = array_merge_recursive($arr_condition_base, [
                'LKB' => [
                    'Category_String' => $this->_cate_code
                ]
            ]);
        }

        $pre_arr_condition = array_merge($arr_condition_base,[
            'ORG1' => [
                'LT' => ['b.BoardIdx' => $board_idx]
            ]
        ]);
        $pre_order_by = ['b.BoardIdx'=>'Desc'];

        $next_arr_condition = array_merge($arr_condition_base,[
            'ORG1' => [
                'GT' => ['b.BoardIdx' => $board_idx]
            ]
        ]);
        $next_order_by = ['b.BoardIdx'=>'Asc'];


        $pre_data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code,$cate_code, false, $pre_arr_condition, $column,1,null, $pre_order_by);
        $next_data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code,$cate_code,false, $next_arr_condition, $column,1,null, $next_order_by);

        $this->load->view('support/'.$view_type.'/show_examQuestion',[
                'default_path' => $this->_default_path,
                'board_idx' => $board_idx,
                'get_params' => $get_params,
                'arr_input' => $arr_input,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
                'arr_swich' => $this->arr_swich
            ]
        );
    }

    /**
     * ajax list
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $s_keyword = element('s_keyword',$arr_input);
        $s_area = element('s_area',$arr_input);
        $s_year = element('s_year',$arr_input);
        $s_subject = element('s_subject',$arr_input);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'AreaCcd' => $s_area,
                'ExamProblemYear' => $s_year,
                'SubjectIdx' => $s_subject,
                'b.IsUse' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $list = [];
        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd, b.ExamProblemYear
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->supportBoardFModel->listBoardForSiteGroup(true, $this->_site_code, $cate_code, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/examQuestion/index/cate/'.$this->_cate_code,$total_rows,$this->_paging_limit,$paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
            'total_rows' => $total_rows
        ]);
    }

    /**
     * @return CI_Output
     */
    public function ajaxPaging()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $s_keyword = element('s_keyword',$arr_input);
        $s_area = element('s_area',$arr_input);
        $s_year = element('s_year',$arr_input);
        $s_subject = element('s_subject',$arr_input);
        $get_page_params = 's_keyword='.$s_keyword;
        $get_page_params .= '&s_area='.$s_area;
        $get_page_params .= '&s_year='.$s_year;
        $get_page_params .= '&s_subject='.$s_subject;

        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'ExamProblemYear' => $s_year,
                'SubjectIdx' => $s_subject,
                'b.IsUse' => 'Y'
            ],
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->supportBoardFModel->listBoardForSiteGroup(true, $this->_site_code, $cate_code, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/examQuestion/index/cate/'.$this->_cate_code.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        return $this->response([
            'paging' => $paging,
        ]);
    }

    public function download()
    {
        $file_idx = $this->_reqG('file_idx');
        $board_idx = $this->_reqG('board_idx');
        $this->downloadFModel->saveLog($board_idx);

        $file_data = $this->downloadFModel->getFileData($board_idx, $file_idx);
        if (empty($file_data) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }

        $file_path = $file_data['FilePath'].$file_data['FileName'];
        $file_name = $file_data['RealFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }
}