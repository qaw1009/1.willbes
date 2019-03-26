<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class PassNotice extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF', '_lms/sys/site');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '99';       //bmidx : 기간제패키지 공지사항
    protected $_default_path = '/classroom/passNotice';
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

        $s_site_code = element('s_site_code',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_site_code='.$s_site_code.'&s_keyword='.$s_keyword;

        //사이트목록 (과정, 통합사이트코드 제거)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $s_site_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx, b.TypeCcd, b.IsBest, b.Title,b.Content, Category_NameString, b.SiteName
        , DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition, '',$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/passNotice', [
            'default_path' => $this->_default_path,
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
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code.'&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        #-------------------------------- 게시글 조회
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.SiteCode' => $s_site_code
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx, b.TypeCcd, b.IsBest, b.Title,b.Content, Category_NameString, b.SiteName, b.AttachData
                    ,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                    ,b.CampusCcd, b.CampusCcd_Name
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
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition_base = [
            'EQ' => [
                'b.IsBest' => '0'
                ,'b.SiteCode' => $s_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
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

        $this->load->view('support/show_notice',[
                'default_path' => $this->_default_path,
                'cate_path' => '',
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