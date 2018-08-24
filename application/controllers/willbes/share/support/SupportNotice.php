<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportNotice extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '45';       //bmidx : notice 게시판
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $campus_ccd = $this->supportBoardFModel->listCampusCcd($this->_site_code);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        //var_dump($arr_input);
        $list = [];

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
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
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition);

        $paging = $this->pagination('/support/notice/index/?s_campus='.$s_campus.'&s_keyword='.$s_keyword,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/notice', [
            'campus_ccd' => $campus_ccd,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $board_idx = element('board_idx',$arr_input);

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
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $data = $this->supportBoardFModel->findBoard($board_idx,$arr_condition,$column);

        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }
        #-------------------------------- 게시글 조회


        #--------------------------------  이전글, 다음글 조회 : 베스트/핫 일경우 무시하고 BoardIdx 로 비교 , 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition_base = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.CampusCcd' => $s_campus
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
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
                'arr_input' => $arr_input,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
            ]
        );
    }

}