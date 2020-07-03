<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportExamErrata extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);
        $s_keyword = element('s_keyword', $arr_input);
        $view_type = element('view_type', $arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);
        $get_page_params = 's_keyword='.$s_keyword;
        $get_page_params .= '&view_type='.$view_type;
        $get_page_params .= '&s_cate_code='.element('s_cate_code', $arr_input);
        $get_page_params .= '&s_cate_code_disabled='.$s_cate_code_disabled;

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);

        $list = [];
        $arr_condition = [
            'EQ' => [
                /*'b.SiteCode' => $this->_site_code,*/
                'b.BmIdx' => $this->_bm_idx,
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
        if(empty(element('s_cate_code', $arr_input)) === false) {
            $cate_code = element('s_cate_code', $arr_input);
        } else if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoardForSiteGroup(true, $this->_site_code, $cate_code, $arr_condition);

        $paging = $this->pagination($this->_default_path.'/examErrata/index/cate/'.$this->_cate_code.'?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForSiteGroup(false, $this->_site_code, $cate_code, $arr_condition, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/examErrata', [
            'default_path' => $this->_default_path,
            'get_params' => $get_params,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'arr_base' => $arr_base
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);
        $view_type = element('view_type',$arr_input);
        $s_cate_code = '&s_cate_code='.element('s_cate_code', $arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);

        $get_params = 's_keyword='.$s_keyword;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&page='.$page.'&s_cate_code='.$s_cate_code.'&s_cate_code_disabled='.$s_cate_code_disabled;

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

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';
        $data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code, $cate_code, $board_idx, $arr_condition, $column);

        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }
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
        $next_data = $this->supportBoardFModel->findBoardForSiteGroup($this->_site_code, $cate_code,false, $next_arr_condition, $column,1,null, $next_order_by);

        $this->load->view('support/'.$view_type.'/show_examErrata',[
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