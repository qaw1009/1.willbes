<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportReview extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardTwoWayF', 'downloadF', '_lms/sys/site', '_lms/sys/code','_lms/product/base/sortMapping','_lms/product/base/subject', 'product/baseProductF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array('create', 'store', 'delete', 'destroyFile', 'writeReviewLayer');

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;
    protected $_reg_type = 0;    //등록타입
    private $_groupCcd = [
        'consult_ccd' => '622',   //유형 그룹 코드 = 상담유형
        'reply_status_ccd_complete' => '621004'  //답변등록상태 (답변완료)
    ];
    private $_on_off_swich = [
        '91' => [                               // bm_idx 수강평/합격수기관리 -> 합격수기
            'site_code' => ['2017','2018'],     // 적용 사이트 [임용]
            'campus' => 'd_none',               // 캠퍼스
            'subject' => 'show',                // 과목
            'name' => 'show',                   // 작성자
            'create_btn' => 'show',             // 등록버튼
            'mod_btn' => 'show',                // 수정버튼
            'arr_table_width' => [65,120,'',60,90,100,90],
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강평/합격수기관리 > 합격수기 인덱스
     * @param array $params
     */
    public function index($params = [])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code', $arr_input);
        $view_type = element('view_type',$arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);
        $get_page_params = 's_keyword='.urlencode($s_keyword);
        $get_page_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_page_params .= '&s_campus='.$s_campus;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_page_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_page_params .= '&on_off_link_cate_code='.$on_off_link_cate_code.'&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 과목
        if(empty($s_cate_code) === false){
            $subject_list = $this->sortMappingModel->listSubjectMapping('', $this->_site_code, $s_cate_code);
            if(empty($subject_list) === false){
                foreach ($subject_list as $key => $val){
                    if($val['SubjectIdx'] == $val['RSubjectIdx']){
                        $arr_base['subject'][$val['SubjectIdx']] = $val['SubjectName'];
                    }
                }
            }
        }else{
            $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);
        }

        // 프론트 ui
        $arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($arr_swich) === false && in_array($this->_site_code,$arr_swich['site_code']) === true)){
            $arr_swich = null;
        }

        // 카테고리 조회
        if ($this->_site_code == config_item('app_intg_site_code')) {
            if (empty($s_site_code) === true) {
                $arr_base['category'] = [];
            } else {
                $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($s_site_code);
            }
        } else {
            $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);
        }

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardTwoWayFModel->listCampusCcd($this->_site_code);

        //구분목록 (학원,온라인)
        //$arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.ProfIdx' => $prof_idx,
                'b.SubjectIdx' => $subject_idx,
                'b.CampusCcd' => $s_campus,
                'd.OnOffLinkCateCode' => $on_off_link_cate_code,
                'b.SiteCode' => $s_site_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        // 통합사이트일 경우 전체 사이트 조회
        if ($this->_site_code == config_item('app_intg_site_code')) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.SiteCode' => $s_site_code
            ]);
        } else {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.SiteCode' => $this->_site_code
            ]);
        }

        // 공지숨기기
        if ($s_is_display == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.IsBest' => '0'
            ]);
        }

        // 내질문보기
        if ($s_is_my_contents == 1) {
            if (empty($this->session->userdata('mem_idx')) === false) {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => $this->session->userdata('mem_idx'),
                    'b.RegType' => '0'
                ]);
            } else {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => '0',
                    'b.RegType' => '0'
                ]);
            }
        }

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx, b.ProdName, b.SubjectIdx';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, b.RegMemName, m.MemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';
        $column .= ', ps.SubJectName';
        //$order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $order_by = ['IsBest'=>'Desc','RegDatm'=>'Desc', 'BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        // 통합사이트인 공지만 나오도록
        $arr_condition['RAW'] = [
            ' (CASE WHEN b.IsBest = ' => " '1' THEN b.SiteCode = '{$this->_site_code}' ELSE TRUE END)"
        ];

        $total_rows = $this->supportBoardTwoWayFModel->listBoardForQna(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path . '/index/?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForQna(false,$arr_condition, $s_cate_code, $column, $paging['limit'], $paging['offset'], $order_by, $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/review', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'get_params' => $get_params,
            'arr_swich' => $arr_swich,
        ]);
    }


    public function create()
    {
        if(empty($this->session->userdata('mem_idx')) === true){
            show_alert('로그인 후 이용해주세요.');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code',$arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;
        $get_params .= '&on_off_link_cate_code='.$on_off_link_cate_code;
        $get_params .= '&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 카테고리 조회
        $param_site_code = $this->_site_code == '2000' ? null : $this->_site_code;
        $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($param_site_code);

        //켐퍼스목록
        $arr_base['campus'] = $this->supportBoardTwoWayFModel->listCampusCcd(null);

        //구분목록 (학원,온라인)
        //$arr_base['onoff_type'] = $this->supportBoardTwoWayFModel->listSiteOnOffType();

        //과목조회
        $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);

        // 카테고리 연관 과목 조회
        $arr_cate_subject = $this->_getCateSubjectParts($arr_base['category']);

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';

            $arr_condition = [
                'EQ' => [
                    'BmIdx' => $this->_bm_idx,
                    'IsUse' => 'Y'
                ],
            ];

            $column = '
                BoardIdx, b.SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName, SubjectIdx
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubJectName
                , IF(RegType=1, \'\', RegMemName) AS RegName
                , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
                , AttachData, Category_String
            ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);

            if (empty($data)) {
                show_alert('게시글이 존재하지 않습니다.', 'back');
            }
            if ($data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                show_alert('잘못된 접근 입니다.', 'back');
            }
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
            }

            $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        }

        $this->load->view('support/'.$view_type.'/create_review', [
            'default_path' => $this->_default_path,
            'method' => $method,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->supportBoardTwoWayFModel->_attach_img_cnt,
            'arr_cate_subject' => $arr_cate_subject
        ]);
    }

    public function show()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        //과목조회
        $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];

        if (empty($s_campus) === false) {
            $arr_condition['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
        }

        $column = '
            BoardIdx, b.SiteCode, MdCateCode, CampusCcd, SubjectIdx
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
            , Title, Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
            , DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, \'\', RegMemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName, Category_String
            , AttachData
        ';

        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['AttachData'], 1);

        if ($data['RegType'] == '0' && $data['IsPublic'] == 'N' && $data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        $arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($arr_swich) === false && in_array($this->_site_code,$arr_swich['site_code']) === true)){
            $arr_swich = null;
        }else{
            if(empty($data['RegName']) === true){ // 등록 게시글의 회원명 조회
                $data['RegName'] = $this->supportBoardTwoWayFModel->getBoardForMemberInfo($board_idx)['RegName'];
            }
        }

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

        #--------------------------------  이전글, 다음글 조회 : 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $pre_data = [];
        $next_data = [];
        if($data['IsBest'] != 1) {
            $arr_condition_base = [
                'EQ' => [
                    'b.SiteCode' => $this->_site_code
                    , 'b.IsBest' => '0'
                    , 'b.BmIdx' => $this->_bm_idx
                    , 'b.IsUse' => 'Y'
                    , 'b.ProfIdx' => $prof_idx
                    , 'b.SubjectIdx' => $subject_idx
                ],
                'ORG' => [
                    'LKB' => [
                        'b.Title' => $s_keyword
                        , 'b.Content' => $s_keyword
                    ]
                ],
                'LKB' => [
                    'Category_String' => $s_cate_code
                ],
            ];

            if (empty($s_campus) === false) {
                $arr_condition_base['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
            }

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

            $pre_data = $this->supportBoardTwoWayFModel->findBoard(false, $pre_arr_condition, $column, 1, null, $pre_order_by);
            $next_data = $this->supportBoardTwoWayFModel->findBoard(false, $next_arr_condition, $column, 1, null, $next_order_by);
        }

        $this->load->view('support/'.$view_type.'/show_review',[
                'default_path' => $this->_default_path,
                'arr_base' => $arr_base,
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'board_idx' => $board_idx,
                'reply_type_complete' => $this->_groupCcd['reply_status_ccd_complete'],
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
                'arr_swich' => $arr_swich,
            ]
        );
    }

    public function store()
    {
        $idx = '';
        if ($this->_site_code == config_item('app_intg_site_code')) {
            if ($this->_reqP('_method') == 'POST') {
                $s_site_code = $this->_reqP('s_site_code');
            } else {
                $s_site_code = $this->_reqP('put_site_code');
            }
        } else {
            $s_site_code = $this->_reqP('put_site_code');
        }

        //캠퍼스 사용 유/무 조회
        $site_onoff_info = $this->supportBoardTwoWayFModel->getSiteOnOffType($s_site_code);

        $method = 'add';
        $msg = '저장되었습니다';
        $rules = [
            ['field' => 'subject_idx', 'label' => '과목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'board_title', 'label' => '제목', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
            ['field' => 'is_public', 'label' => '공개여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        switch ($this->_default_path) {
            case '/support/review' :    // 합격수기
                if (empty($s_site_code) === true) {
                    $rules = array_merge($rules, [
                        ['field' => 's_site_code', 'label' => '과정', 'rules' => 'trim|required|integer'],
                    ]);
                }

                //통합사이트 제외한 나머지 카테고리 항목 체크
                if ($s_site_code != config_item('app_intg_site_code')) {
                    $rules = array_merge($rules, [
                        ['field' => 's_cate_code', 'label' => '카테고리', 'rules' => 'trim|required|integer']
                    ]);
                }

                //접근 사이트코드가 캠퍼스 사용중일 캠퍼스 항목 체크
                if ($site_onoff_info['IsCampus'] == 'Y') {
                    $rules = array_merge($rules, [
                        ['field' => 's_campus', 'label' => '캠퍼스', 'rules' => 'trim|required|integer']
                    ]);
                }
                break;
        }

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $msg = '수정되었습니다';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($s_site_code, $this->_reqP(null, false), $method);

        //_addBoard, _modifyBoard
        $result = $this->supportBoardTwoWayFModel->{$method . 'Board'}($inputData, $idx);
        $this->json_result($result, $msg, $result);
    }

    public function delete()
    {
        if (empty($this->session->userdata('mem_idx')) === true) {
            $this->json_error('로그인 후 이용해주세요.');
            return;
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'board_idx', 'label' => '게시판식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $board_idx = $this->_reqP('board_idx');
        $arr_condition = [
            'EQ' => [
                'm.MemIdx' => $this->session->userdata('mem_idx'),
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y'
            ]
        ];
        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx, $arr_condition, 'BoardIdx');

        if (empty($data) === true) {
            $this->json_error('조회된 게시물이 없습니다.');
            return;
        }

        $result = $this->supportBoardTwoWayFModel->boardDelete($board_idx);

        if ($result !== true) {
            $this->json_error('삭제 실패입니다. 관리자에게 문의해주세요.');
            return;
        }

        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->supportBoardTwoWayFModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function writeReviewLayer()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code',$arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;
        $get_params .= '&on_off_link_cate_code='.$on_off_link_cate_code;
        $get_params .= '&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);

        //과목조회
        foreach ($arr_base['category'] as $row){
            $arr_base['subject'][] = $this->baseProductFModel->listSubjectCategoryMapping($row['SiteCode'], $row['CateCode']);
        }

        $method = 'POST';
        $data = null;

        if (empty($board_idx) === false) {
            $method = 'PUT';

            $arr_condition = [
                'EQ' => [
                    'BmIdx' => $this->_bm_idx,
                    'IsUse' => 'Y'
                ],
            ];

            $column = '
                BoardIdx, b.SiteCode, MdCateCode, CampusCcd, RegType, TypeCcd, IsBest, IsPublic
                , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName, SubjectIdx
                , Title, Content, ReadCnt, SettingReadCnt
                , RegDatm, RegMemIdx, RegMemId, RegMemName
                , ReplyContent, ReplyRegDatm, ReplyStatusCcd
                , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
                , VocCcd_Name, MdCateCode_Name, SubJectName
                , IF(RegType=1, \'\', RegMemName) AS RegName
                , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
                , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName        
                , AttachData, Category_String
            ';

            $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);

            if (empty($data)) {
                $this->json_error('게시글이 존재하지 않습니다.');
            }
            if ($data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                $this->json_error('잘못된 접근 입니다.');
            }
            $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
            if($result !== true) {
                $this->json_error('게시글 조회시 오류가 발생되었습니다.');
            }

            $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일
        }

        $this->load->view('promotion/review_write_layer', [
            'default_path' => $this->_default_path,
            'method' => $method,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'data' => $data,
            'board_idx' => $board_idx,
            'reg_type' => $this->_reg_type,
        ]);
    }

    /**
     * 합격수기 리스트 ajax
     * @return mixed
     */
    public function listReviewAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('list_cate_code',$arr_input);
        $subject_idx = element('list_subject_idx',$arr_input);
        $s_keyword = element('list_keyword',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $on_off_link_cate_code = element('on_off_link_cate_code', $arr_input);
        $view_type = element('view_type',$arr_input);
        $s_cate_code_disabled = element('s_cate_code_disabled', $arr_input);
        $get_page_params = 'list_keyword='.urlencode($s_keyword);
        $get_page_params .= '&s_site_code='.$s_site_code.'&list_cate_code='.$s_cate_code;
        $get_page_params .= '&s_campus='.$s_campus;
        $get_page_params .= '&prof_idx='.$prof_idx.'&list_subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_page_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_page_params .= '&on_off_link_cate_code='.$on_off_link_cate_code.'&s_cate_code_disabled='.$s_cate_code_disabled;

        //사이트목록 (과정)
        $arr_base['site_list'] = $this->siteModel->getSiteArray(false, 'SiteName', ['EQ' => ['IsFrontUse' => 'Y']]);
        unset($arr_base['site_list'][config_item('app_intg_site_code')]);

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategoryRoute($this->_site_code);

        if(empty($arr_base['category']) === false){
            foreach ($arr_base['category'] as $row){
                $arr_base['subject'][] = $this->baseProductFModel->listSubjectCategoryMapping($row['SiteCode'], $row['CateCode']);
            }
        }

        // 프론트 ui
        $arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($arr_swich) === false && in_array($this->_site_code,$arr_swich['site_code']) === true)){
            $arr_swich = null;
        }

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx,
                'b.IsUse' => 'Y',
                'b.ProfIdx' => $prof_idx,
                'b.SubjectIdx' => $subject_idx,
                'b.CampusCcd' => $s_campus,
                'd.OnOffLinkCateCode' => $on_off_link_cate_code,
                'b.SiteCode' => $s_site_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword,
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        // 공지숨기기
        if ($s_is_display == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                'b.IsBest' => '0'
            ]);
        }

        // 내 학격수기 보기
        if ($s_is_my_contents == 1) {
            if (empty($this->session->userdata('mem_idx')) === false) {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => $this->session->userdata('mem_idx'),
                    'b.RegType' => '0'
                ]);
            } else {
                $arr_condition['EQ'] = array_merge($arr_condition['EQ'], [
                    'b.RegMemIdx' => '0',
                    'b.RegType' => '0'
                ]);
            }
        }

        $column = 'b.BoardIdx, b.CampusCcd, b.TypeCcd, b.IsBest, b.RegType, b.RegMemIdx, b.ProdName, b.SubjectIdx';
        $column .= ', b.Title, b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt';
        $column .= ', DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $column .= ', b.IsPublic, b.CampusCcd_Name, b.TypeCcd_Name';
        $column .= ', b.SiteName, b.ReplyStatusCcd, b.ReplyStatusCcd_Name';
        $column .= ', IF(b.RegType=1, b.RegMemName, m.MemName) AS RegName';
        $column .= ', IF(b.IsCampus=\'Y\',\'offline\',\'online\') AS CampusType';
        $column .= ', IF(b.IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName';
        $column .= ', ps.SubJectName';
        $order_by = ['IsBest'=>'Desc','RegDatm'=>'Desc', 'BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        // 통합사이트인 공지만 나오도록
        $arr_condition['RAW'] = [
            ' (CASE WHEN b.IsBest = ' => " '1' THEN b.SiteCode = '{$this->_site_code}' ELSE TRUE END)"
        ];

        $total_rows = $this->supportBoardTwoWayFModel->listBoardForQna(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path . '/listReviewAjax/?' . $get_page_params, $total_rows, $this->_paging_limit, $paging_count, true);
        if ($total_rows > 0) {
            $list = $this->supportBoardTwoWayFModel->listBoardForQna(false,$arr_condition, $s_cate_code, $column, $paging['limit'], $paging['offset'], $order_by, $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'], true);       //첨부파일
            }
        }

        $this->load->view('promotion/review_list_ajax', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
            'get_params' => $get_params,
            'arr_swich' => $arr_swich,
        ]);
    }

    public function showReviewLayer()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $board_idx = element('board_idx',$arr_input);
        $s_site_code = element('s_site_code',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $s_is_display = element('s_is_display',$arr_input);
        $s_is_my_contents = element('s_is_my_contents',$arr_input);
        $view_type = element('view_type',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_keyword='.urlencode($s_keyword);
        $get_params .= '&s_site_code='.$s_site_code.'&s_cate_code='.$s_cate_code;
        $get_params .= '&s_campus='.$s_campus;
        $get_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx.'&view_type='.$view_type;
        $get_params .= '&s_is_display='.$s_is_display.'&s_is_my_contents='.$s_is_my_contents;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            $this->json_error('게시글번호가 존재하지 않습니다.');
        }

        //과목조회
        $arr_base['subject'] = $this->subjectModel->getSubjectArray($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y'
            ],
        ];

        if (empty($s_campus) === false) {
            $arr_condition['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
        }

        $column = '
            BoardIdx, b.SiteCode, MdCateCode, CampusCcd, SubjectIdx
            , RegType, TypeCcd, IsBest, IsPublic
            , VocCcd, ProdApplyTypeCcd, ProdCode, LecScore, ProdName
            , Title, Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
            , DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
            , RegMemIdx, RegMemId, RegMemName
            , ReplyContent, ReplyRegDatm, ReplyStatusCcd
            , CampusCcd_Name, ReplyStatusCcd_Name, TypeCcd_Name
            , VocCcd_Name, MdCateCode_Name, SubJectName
            , IF(RegType=1, \'\', RegMemName) AS RegName
            , IF(IsCampus=\'Y\',\'offline\',\'online\') AS CampusType
            , IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name, SiteGroupName, Category_String
            , AttachData
        ';

        $data = $this->supportBoardTwoWayFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($data)) {
            $this->json_error('게시글이 존재하지 않습니다.');
        }
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachData']);
        $data['ReplyContent'] = $this->_getBoardForContent($data['ReplyContent'], $data['AttachData'], 1);

        if ($data['RegType'] == '0' && $data['IsPublic'] == 'N' && $data['RegMemIdx'] != $this->session->userdata('mem_idx')) {
            $this->json_error('잘못된 접근 입니다.');
        }

        $result = $this->supportBoardTwoWayFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            $this->json_error('게시글 조회시 오류가 발생되었습니다.');
        }

        $arr_swich = element($this->_bm_idx,$this->_on_off_swich);
        if(!(empty($arr_swich) === false && in_array($this->_site_code,$arr_swich['site_code']) === true)){
            $arr_swich = null;
        }else{
            if(empty($data['RegName']) === true){ // 등록 게시글의 회원명 조회
                $data['RegName'] = $this->supportBoardTwoWayFModel->getBoardForMemberInfo($board_idx)['RegName'];
            }
        }

        // 카테고리 조회
        $arr_base['category'] = $this->categoryFModel->listSiteCategory(null);
        $data['AttachData'] = json_decode($data['AttachData'],true);       //첨부파일

        #--------------------------------  이전글, 다음글 조회 : 리스트에서 핫/베스트 글을 찍고 들어왔을경우 이전글/다음글 미노출
        $pre_data = [];
        $next_data = [];
        if($data['IsBest'] != 1) {
            $arr_condition_base = [
                'EQ' => [
                    'b.SiteCode' => $this->_site_code
                    , 'b.IsBest' => '0'
                    , 'b.BmIdx' => $this->_bm_idx
                    , 'b.IsUse' => 'Y'
                    , 'b.ProfIdx' => $prof_idx
                    , 'b.SubjectIdx' => $subject_idx
                ],
                'ORG' => [
                    'LKB' => [
                        'b.Title' => $s_keyword
                        , 'b.Content' => $s_keyword
                    ]
                ],
                'LKB' => [
                    'Category_String' => $s_cate_code
                ],
            ];

            if (empty($s_campus) === false) {
                $arr_condition_base['ORG2']['RAW'] = ['(b.CampusCcd = "' => $s_campus . '" OR b.CampusCcd = 605999)'];
            }

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

            $pre_data = $this->supportBoardTwoWayFModel->findBoard(false, $pre_arr_condition, $column, 1, null, $pre_order_by);
            $next_data = $this->supportBoardTwoWayFModel->findBoard(false, $next_arr_condition, $column, 1, null, $next_order_by);
        }

        $this->load->view('promotion/review_show_layer', [
                'default_path' => $this->_default_path,
                'arr_base' => $arr_base,
                'arr_input' => $arr_input,
                'get_params' => $get_params,
                'data' => $data,
                'board_idx' => $board_idx,
                'reply_type_complete' => $this->_groupCcd['reply_status_ccd_complete'],
                'pre_data' => $pre_data,
                'next_data' =>  $next_data,
                'arr_swich' => $arr_swich,
            ]
        );
    }

    /**
     * 저장 데이터 셋팅
     * @param $input
     * @param $method
     * @return array
     */
    private function _setInputData($site_code, $input, $method){
        $input_data = [
            'board' => [
                'BmIdx' => $this->_bm_idx,
                'SiteCode' => (empty($site_code) === false) ? $site_code : $this->_site_code,
                'MdCateCode' => '',
                'CampusCcd' => element('s_campus', $input),
                'RegType' => element('reg_type', $input, 0),
                'Title' => element('board_title', $input),
                'Content' => element('board_content', $input),
                'IsPublic' => element('is_public', $input),
                'ReadCnt' => 0,
                'SettingReadCnt' => 0,
                'SubjectIdx' => element('subject_idx', $input),
            ],
            'board_r_category' => [
                'site_category' => element('s_cate_code', $input, $this->_cate_code)
            ]
        ];

        //수정일 경우 사이트코드 제외
        if ($method == 'modify') {
            unset($input_data['board']['SiteCode']);
        }
        return$input_data;
    }

    /**
     * 카테고리 연관 과목 조회
     * @param $arr_cate_code
     * @return array
     */
    private function _getCateSubjectParts($arr_cate_code = [])
    {
        $data = [];
        foreach ($arr_cate_code as $row){
            $arr_cate_subject = $this->sortMappingModel->listSubjectMapping('', $this->_site_code, $row['CateCode']);
            if(empty($arr_cate_subject) === false){
                foreach ($arr_cate_subject as $key => $val){
                    if($val['SubjectIdx'] == $val['RSubjectIdx']){
                        $data[$row['CateCode']][$val['SubjectIdx']] = $val['SubjectName'];
                    }
                }
            }
        }
        return $data;
    }

}