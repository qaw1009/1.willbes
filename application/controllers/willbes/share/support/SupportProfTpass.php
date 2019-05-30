<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProfTpass extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;       //bmidx : 강사게시판 -> 학습자료실
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * T-pass 자료실 [로그인 회원 수강중인 강좌 기준 게시판]
     */
    public function index()
    {
        $today = date('Y-m-d');
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $s_tpass_lecture = element('s_tpass_lecture',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $get_page_params = 's_cate_code='.$s_cate_code.'&s_tpass_lecture='.$s_tpass_lecture.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_page_params .= '&view_type='.$view_type;

        $arr_condition_pkg = [
            'EQ' => [
                /*'MemIdx' => $this->session->userdata('mem_idx'),*/
                'LearnPatternCcd' => '615003',    //운영자패키지
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일이 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ]
        ];

        $arr_condition_auth = [
            'EQ' => [
                'a.ProfIdx' => $prof_idx,
                'a.IsValid' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ];
        $arr_condition_auth['ORG2']['BET'] = [
            'a.ValidStartDate' => [$today, $today],
            'a.ValidEndDate' => [$today, $today],
        ];
        $arr_condition_auth['ORG2']['RAW'] = ['(a.ValidStartDate < "' => $today . '" AND a.ValidEndDate> "' . $today . '")'];

        // 셀렉트박스용 데이타 [수강중 운영자 패키지]
        $arr_base['packageLecture'] = $this->supportBoardFModel->getPackageArray($arr_condition_pkg, $arr_condition_auth);

        $arr_condition_board = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.ProfIdx' => $prof_idx
                ,'b.ProdCode' => element('s_tpass_lecture', $arr_input)
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

        $total_rows = $this->supportBoardFModel->listBoardForTpass($this->_site_code, '', true, $arr_condition_board, $arr_condition_pkg, $arr_condition_auth);
        $paging = $this->pagination($this->_default_path.'/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForTpass($this->_site_code, '', false, $arr_condition_board, $arr_condition_pkg, $arr_condition_auth, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/tpass', [
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
        $today = date('Y-m-d');

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $s_tpass_lecture = element('s_tpass_lecture',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);
        $get_params = 's_cate_code='.$s_cate_code.'&s_tpass_lecture='.$s_tpass_lecture.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $arr_condition_pkg = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자 아이디
                'LearnPatternCcd' => '615003',    //운영자패키지
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일이 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            /*'IN' => [
                'PayRouteCcd' => ['670001','670002'] // 결제루트 : 온, 방
            ]*/
        ];

        $arr_condition_auth = [
            'EQ' => [
                'a.MemIdx' => $this->session->userdata('mem_idx'),
                'a.ProfIdx' => $prof_idx,
                'a.IsValid' => 'Y',
                'a.IsStatus' => 'Y'
            ]
        ];
        $arr_condition_auth['ORG2']['BET'] = [
            'a.ValidStartDate' => [$today, $today],
            'a.ValidEndDate' => [$today, $today],
        ];
        $arr_condition_auth['ORG2']['RAW'] = ['(a.ValidStartDate < "' => $today . '" AND a.ValidEndDate> "' . $today . '")'];

        $arr_condition_board = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.IsCampus,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ,p.ProdName
                       ';

        $data = $this->supportBoardFModel->findBoardForTpass($this->_site_code, $board_idx, $arr_condition_board, $arr_condition_pkg, $arr_condition_auth, $column, 1, null);
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

        $arr_condition_base = [
            'EQ' => [
                'b.IsBest' => '0'
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.ProfIdx' => $prof_idx
                /*,'b.SubjectIdx' => $subject_idx*/
                ,'b.ProdCode' => $s_tpass_lecture
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ],
            'LKB' => [
                'Category_String'=>$s_cate_code
            ]
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


        $pre_data = $this->supportBoardFModel->findBoardForTpass($this->_site_code, false, $pre_arr_condition, $arr_condition_pkg, $arr_condition_auth, $column,1,null, $pre_order_by);
        $next_data = $this->supportBoardFModel->findBoardForTpass($this->_site_code, false, $next_arr_condition, $arr_condition_pkg, $arr_condition_auth, $column,1,null, $next_order_by);

        $this->load->view('support/'.$view_type.'/show_tpass',[
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