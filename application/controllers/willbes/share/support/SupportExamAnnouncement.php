<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportExamAnnouncement extends BaseSupport
{
    protected $models = array('support/supportBoardF', '_lms/sys/code', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    private $_groupCcd = [
        'type_group_ccd_announcement' => '630',     //유형 그룹 코드 = 공고유형
        'type_group_ccd_area' => '631',              //유형 그룹 코드 = 지역
        'type_group_ccd_division' => '714'           //유형 그룹 코드 = 분류
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_keyword = element('s_keyword',$arr_input);
        $s_announcement_type = element('s_announcement_type',$arr_input);
        $s_area = element('s_area',$arr_input);
        $s_division = element('s_division',$arr_input);
        $view_type = element('view_type',$arr_input);
        $get_page_params = 's_keyword='.$s_keyword;
        $get_page_params .= '&s_announcement_type='.$s_announcement_type;
        $get_page_params .= '&s_area='.$s_area;
        $get_page_params .= '&s_division='.$s_division;
        $get_page_params .= '&view_type='.$view_type;

        //공고유형
        $arr_base['announcement_type'] = $this->codeModel->getCcd($this->_groupCcd['type_group_ccd_announcement']);

        //지역
        $arr_base['area'] = $this->codeModel->getCcd($this->_groupCcd['type_group_ccd_area']);

        //분류
        $arr_base['division'] = $this->codeModel->getCcd($this->_groupCcd['type_group_ccd_division']);

        if ($this->_cate_code == '3024') {

        }

        $list = [];
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'TypeCcd' => $s_announcement_type,
                'AreaCcd' => $s_area,
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

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name, b.DivisionCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoardForSiteGroup(true, $this->_site_code, $cate_code, $arr_condition);

        $paging = $this->pagination($this->_default_path.'/examAnnouncement/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/examAnnouncement', [
            'default_path' => $this->_default_path,
            'get_params' => $get_params,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $s_announcement_type = element('s_announcement_type',$arr_input);
        $s_area = element('s_area',$arr_input);
        $page = element('page',$arr_input);
        $view_type = element('view_type',$arr_input);

        $get_params = 's_keyword='.$s_keyword;
        $get_params .= '&s_announcement_type='.$s_announcement_type;
        $get_params .= '&s_area='.$s_area;
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
                /*'b.SiteCode' => $this->_site_code,*/
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code, $cate_code, $board_idx, $arr_condition, $column);

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
                ,'TypeCcd' => $s_announcement_type
                ,'AreaCcd' => $s_area
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        /*if ($this->_site_code != config_item('app_intg_site_code')) {
            $arr_condition_base = array_merge_recursive($arr_condition_base, [
                'LKB' => [
                    'Category_String' => $this->_cate_code
                ]
            ]);
        }*/

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


        $pre_data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code, $cate_code, false, $pre_arr_condition, $column,1,null, $pre_order_by);
        $next_data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code, $cate_code, false, $next_arr_condition, $column,1,null, $next_order_by);

        $this->load->view('support/'.$view_type.'/show_examAnnouncement',[
                'default_path' => $this->_default_path,
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