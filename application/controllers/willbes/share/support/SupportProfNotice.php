<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProfNotice extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF', '_lms/sys/site');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
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

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $get_page_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_page_params .= '&view_type='.$view_type;

        if ($this->_validationData([$prof_idx]) !== true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        //카테고리목록
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardFModel->listCampusCcd($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
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
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm,
                       IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name
                       ';
        $order_by = ['m.IsBest'=>'Desc','m.BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }
        $total_rows = $this->supportBoardFModel->listBoardForProf(true, $this->_site_code, $prof_idx, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/notice/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = $this->_getAttachData(json_decode($row['AttachData'],true));
            }
        }

        $this->load->view('support/'.$view_type.'/notice', [
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

        // 첨부파일 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['AttachData'] = $this->_getAttachData(json_decode($data['AttachData'],true));
        #-------------------------------- 게시글 조회

        #--------------------------------  이전글, 다음글 조회 : 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $pre_data = [];
        $next_data = [];
        if($data['IsBest'] != 1) {
            $s_campus = element('s_campus', $arr_input);
            $s_keyword = element('s_keyword', $arr_input);

            $arr_condition_base = [
                'EQ' => [
                    /*'b.SiteCode' => $this->_site_code*/
                    'b.IsBest' => '0'
                    , 'b.BmIdx' => $this->_bm_idx
                    , 'b.IsUse' => 'Y'
                    , 'b.CampusCcd' => $s_campus
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
                    'Category_String'=>$s_cate_code
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

        $this->load->view('support/'.$view_type.'/show_notice',[
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

        $this->load->view('support/popup_notice_index', [
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

        $column = 'b.BoardIdx, b.IsBest, b.RegType';
        $column .= ',b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['m.IsBest'=>'Desc','m.BoardIdx'=>'Desc'];

        $list = [];
        $total_rows = $this->supportBoardFModel->listBoardForProf(true, $this->_site_code, $prof_idx, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/notice/listAjax/', $total_rows, $this->_paging_limit, $this->_paging_count, true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = $this->_getAttachData(json_decode($row['AttachData'],true));
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

        // 첨부파일 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['AttachData'] = $this->_getAttachData(json_decode($data['AttachData'],true));
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

        $this->load->view('support/popup_show_notice',[
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

    /**
     * 첨부파일 가공 이미지일 경우 제외
     * @param array $attach_data
     * @return mixed
     */
    private function _getAttachData($attach_data = [])
    {
        $data = [];
        if(empty($attach_data) === false){
            foreach ($attach_data as $row){
                $arr_file_name = explode('.', $row['FileName']);
                $file_extension = end($arr_file_name);

                if(in_array($file_extension, $this->_file_type) !== true){
                    array_push($data, $row);
                }
            }
        }

        return $data;
    }

}