<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProfMaterial extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '69';       //bmidx : 강사게시판 -> 학습자료실
    protected $_default_path = '/prof';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_keyword = element('s_keyword',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.$s_keyword;
        $get_params .= '&s_cate_code='.$s_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&page='.$page;

        if ($this->_validationData([$prof_idx]) !== true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $list = [];
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
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
                       ,b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $order_by = ['m.IsBest'=>'Desc','m.BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoardForProf(true, $this->_site_code, $prof_idx, $arr_condition, '');

        $paging = $this->pagination($this->_default_path.'/material/index/?'.$get_params,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/material', [
            'default_path' => $this->_default_path,
            'get_params' => $get_params,
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
        $s_cate_code = element('s_cate_code',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.$s_keyword;
        $get_params .= '&s_cate_code='.$s_cate_code.'&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_params .= '&view_type='.$view_type;
        $get_params .= '&page='.$page;

        if ($this->_validationData([$prof_idx, $board_idx]) !== true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

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
                       ,p.ProdName
                       ';

        $data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, $board_idx, $arr_condition, $column);
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

        #--------------------------------  이전글, 다음글 조회 : 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $pre_data = [];
        $next_data = [];
        if($data['IsBest'] != 1) {
            $arr_condition_base = [
                'EQ' => [
                    /*'b.SiteCode' => $this->_site_code*/
                    'b.IsBest' => '0'
                    , 'b.BmIdx' => $this->_bm_idx
                    , 'b.IsUse' => 'Y'
                    /*,'b.ProfIdx' => $prof_idx
                    ,'b.SubjectIdx' => $subject_idx*/
                ],
                'ORG' => [
                    'LKB' => [
                        'b.Title' => $s_keyword
                        , 'b.Content' => $s_keyword
                    ]
                ],
                /*'LKB' => [
                    'Category_String'=>$this->_cate_code
                ],*/
            ];

            $pre_arr_condition = array_merge($arr_condition_base, [
                'ORG1' => [
                    'LT' => ['b.BoardIdx' => $board_idx]
                ]
            ]);
            $pre_order_by = ['b.BoardIdx' => 'Desc'];

            $next_arr_condition = array_merge($arr_condition_base, [
                'ORG1' => [
                    'GT' => ['b.BoardIdx' => $board_idx]
                ]
            ]);
            $next_order_by = ['b.BoardIdx' => 'Asc'];

            $pre_data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, false, $pre_arr_condition, $column, 1, null, $pre_order_by);
            $next_data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, false, $next_arr_condition, $column, 1, null, $next_order_by);
        }

        $this->load->view('support/'.$view_type.'/show_material',[
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

    public function popupIndex(){
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $this->load->view('support/popup_material_index', [
            'default_path' => $this->_default_path,
            'arr_input' => $arr_input,
        ]);
    }

    /**
     * ajax list
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $prof_idx = element('prof_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $arr_condition = [
            'EQ' => [
                'b.IsUse' => 'Y',
                'b.BmIdx' => $this->_bm_idx
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx, b.IsBest, b.RegType, b.CampusCcd_Name, b.TypeCcd_Name, b.AreaCcd_Name';
        $column .= ',b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['m.IsBest'=>'Desc','m.BoardIdx'=>'Desc'];

        $list = [];
        $total_rows = $this->supportBoardFModel->listBoardForProf(true, $this->_site_code, $prof_idx, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/material/listAjax/', $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    public function popupShow(){
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.$s_keyword.'&page='.$page;

        if ($this->_validationData([$prof_idx, $board_idx]) !== true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        #-------------------------------- 게시글 조회
        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.IsCampus,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
                       ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
                       ';

        $data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, $board_idx, $arr_condition, $column);
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

        #--------------------------------  이전글, 다음글 조회 : 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $pre_data = [];
        $next_data = [];
        if($data['IsBest'] != 1) {
            $arr_condition_base = [
                'EQ' => [
                    'b.IsBest' => '0'
                    , 'b.BmIdx' => $this->_bm_idx
                    , 'b.IsUse' => 'Y'
                ],
                'ORG' => [
                    'LKB' => [
                        'b.Title' => $s_keyword
                        , 'b.Content' => $s_keyword
                    ]
                ],
            ];

            $pre_arr_condition = array_merge($arr_condition_base, [
                'ORG1' => [
                    'LT' => ['b.BoardIdx' => $board_idx]
                ]
            ]);
            $pre_order_by = ['b.BoardIdx' => 'Desc'];

            $next_arr_condition = array_merge($arr_condition_base, [
                'ORG1' => [
                    'GT' => ['b.BoardIdx' => $board_idx]
                ]
            ]);
            $next_order_by = ['b.BoardIdx' => 'Asc'];

            $pre_data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, false, $pre_arr_condition, $column, 1, null, $pre_order_by);
            $next_data = $this->supportBoardFModel->findBoardForProf($this->_site_code, $prof_idx, false, $next_arr_condition, $column, 1, null, $next_order_by);
        }

        $this->load->view('support/popup_show_material',[
                'default_path' => $this->_default_path,
                'board_idx' => $board_idx,
                'arr_input' => $arr_input,
                'data' => $data,
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
                'prof_idx' => $prof_idx,
                'get_params' => $get_params,
            ]
        );
    }

}