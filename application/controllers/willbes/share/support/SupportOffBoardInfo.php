<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportOffBoardInfo extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF', '_lms/sys/site');
    protected $helpers = array('download', 'url');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx; //(80-강의시간표,82-강의실배정표,75-학원휴강/보강공지,78-신규강의안내,89-모의고사성적공지)
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        if(empty($params[0])) {
            $bm_idx = '80';
        } else {
            $bm_idx = $params[0];
        }

        if($bm_idx == '89') {
            $bm_title = '모의고사성적공지';
            $tab_menu = false;
        } else {
            $bm_title = '학원강의정보';
            $tab_menu = true;
        }

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $get_page_params = '&s_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        //echo current_url();exit;

        //카테고리목록
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardFModel->listCampusCcd($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $this->_site_code
                ,'b.CampusCcd' => $s_campus

            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }
        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path.'/index/'.$bm_idx.'?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition, $s_cate_code,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

//        echo var_dump($paging);exit;

        $this->load->view('site/off_info/board_info_list', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list'=>$list,
            'paging' => $paging,
            'bm_idx' => $bm_idx,
            'bm_title'=> $bm_title,
            'tab_menu' => $tab_menu
        ]);
    }

    public function show($params=[])
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if(empty($params[0])) {
            $bm_idx = '80';
        } else {
            $bm_idx = $params[0];
        }

        if($bm_idx == '89') {
            $bm_title = '모의고사성적공지';
            $tab_menu = false;
        } else {
            $bm_title = '학원강의정보';
            $tab_menu = true;
        }

        $board_idx = element('board_idx',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        #-------------------------------- 게시글 조회
        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $bm_idx
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
                ,'b.BmIdx' => $bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.CampusCcd' => $s_campus
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

        $this->load->view('site/off_info/board_info_show', [
                'default_path' => $this->_default_path,
                'board_idx' => $board_idx,
                'get_params' => $get_params,
                'arr_input' => $arr_input,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
                'bm_idx' => $bm_idx,
                'bm_title'=> $bm_title,
                'tab_menu' => $tab_menu
            ]
        );
    }

}