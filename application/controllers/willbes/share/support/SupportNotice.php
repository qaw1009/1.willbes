<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportNotice extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF', '_lms/sys/site');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_cate_path = '';
    protected $_paging_limit = 20;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();

        // 카테고리 링크 path 설정
        empty($this->_cate_code) === false && $this->_cate_path = '/' . config_get('uri_segment_keys.cate') . '/' . $this->_cate_code;
    }

    public function index($params=[])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $get_page_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_page_params .= '&view_type='.$view_type;

        //카테고리목록
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardFModel->listCampusCcd($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $this->_site_code
                ,'b.ProfIdx' => $prof_idx
                ,'b.SubjectIdx' => $subject_idx
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];
        if (empty($s_campus) === false) {
            $arr_condition['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
        }

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';
        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path.'/index'.$this->_cate_path.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition, $s_cate_code, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/notice', [
            'default_path' => $this->_default_path,
            'cate_path' => $this->_cate_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        #-------------------------------- 게시글 조회
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.IsCampus,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $data = $this->supportBoardFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($data)) {
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
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition_base = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.IsBest' => '0'
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.ProfIdx' => $prof_idx
                ,'b.SubjectIdx' => $subject_idx
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ],
            'LKB' => [
                'Category_String'=>$s_cate_code
            ],
        ];
        if (empty($s_campus) === false) {
            $arr_condition_base['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
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


        $pre_data = $this->supportBoardFModel->findBoard(false,$pre_arr_condition,$column,1,null,$pre_order_by);
        $next_data = $this->supportBoardFModel->findBoard(false,$next_arr_condition,$column,1,null,$next_order_by);

        $this->load->view('support/'.$view_type.'/show_notice',[
                'default_path' => $this->_default_path,
                'cate_path' => $this->_cate_path,
                'board_idx' => $board_idx,
                'get_params' => $get_params,
                'arr_input' => $arr_input,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
            ]
        );
    }

}