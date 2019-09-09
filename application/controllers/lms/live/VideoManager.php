<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoManager extends \app\controllers\BaseController
{
    protected $models = array('live/videoManager', 'live/classRoom', 'sys/code', 'sys/site', 'sys/category', 'board/board', 'product/base/subject', 'product/base/course', 'product/base/professor');
    protected $helpers = array('download');
    protected $boardInfo = [
        '82' => '강의배정표',
        '83' => '강의자료실'
    ];
    private $board_name = [
        '82' => 'offlineBoard',
        '83' => 'liveLectureMaterial'
    ];
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 라이브송출관리 인덱스
     */
    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();
        $def_site_code = key($offLineSite_list);

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $list = $this->videoManagerModel->listLiveVideo([], null, null, ['lms_live_video.OrderNum' => 'asc', 'lms_live_video.LecLiveVideoIdx' => 'asc']);

        $this->load->view("live/video/index", [
            'def_site_code' => $def_site_code,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'boardInfo' => $this->boardInfo,
            'data' => $list
        ]);
    }

    /**
     * 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //강의실 조회
        $list_class_room = $this->classRoomModel->listClassRoom(['EQ' => ['A.IsUse' => 'Y']], null, null, ['CIdx' => 'asc']);

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->videoManagerModel->findLiveVideoForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('live/video/create', [
            'method' => $method,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'list_class_room' => $list_class_room,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required|integer'],
            ['field' => 'class_room_idx', 'label' => '강의실명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'live_video_route', 'label' => '영상경로', 'rules' => 'trim|required'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->videoManagerModel->{$method . 'LiveVideo'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 정렬변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->videoManagerModel->modifyLiveVideoReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 동영상 보기
     */
    public function viewVideoModel()
    {
        $this->load->view('live/video/view_video_model', [
            'video_route' => $this->_req('video_route')
        ]);
    }

    /**
     * 동영상 전체 보기
     */
    public function viewFullVideoModel()
    {
        $this->load->view('live/video/view_full_video_model', [
            'video_route' => $this->_req('video_route')
        ]);
    }

    /**
     * 게시판 - 강의자료실
     * @param array $params
     */
    public function ListLiveLectureMaterialModal($params = [])
    {
        $bm_idx = $params[0];
        $site_code = $this->_req('site_code');

        if (empty($this->boardInfo[$bm_idx]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        //과목조회
        $arr_subject = $this->subjectModel->getSubjectArray('');

        //과정조회
        $arr_course = $this->courseModel->getCourseArray('');

        //교수조회
        $arr_professor = $this->professorModel->getProfessorArray('');

        $this->load->view('live/video/board/list_liveLectureMaterial_modal', [
            'bm_idx' => $bm_idx,
            'boardInfo' => $this->boardInfo,
            'site_code' => $site_code,

            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
            'arr_subject' => $arr_subject,
            'arr_course' => $arr_course,
            'arr_professor' => $arr_professor,
        ]);
    }

    public function AjaxLiveLectureMaterialModal($params = [])
    {
        $bm_idx = $params[0];
        $site_code = $this->_req('site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.CampusCcd' => $this->_reqP('search_modal_campus_ccd'),
                'LB.SubjectIdx' => $this->_reqP('search_modal_subject'),
                'LB.CourseIdx' => $this->_reqP('search_modal_course'),
                'LB.ProfIdx' => $this->_reqP('search_modal_professor'),
                'LB.IsUse' => $this->_reqP('search_modal_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_modal_value'),
                    'LB.Content' => $this->_reqP('search_modal_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_modal_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_modal_start_date')) && !empty($this->_reqP('search_modal_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_modal_start_date'), $this->_reqP('search_modal_end_date')]]
            ]);
        }

        $sub_query_condition = [];
        if (empty($this->_reqP('search_category')) === false) {
            $sub_query_condition = [
                'EQ' => [
                    'subLBrC.IsStatus' => 'Y',
                    'subLBrC.CateCode' => $this->_reqP('search_category')
                ]
            ];
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title,LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.SubjectIdx, PS.SubjectName, LB.CourseIdx, PRODUCT_COURSE.CourseName, LB.ProfIdx, PROFESSOR.ProfNickName
            ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name[$bm_idx],true, $arr_condition, $sub_query_condition, $site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name[$bm_idx],false, $arr_condition, $sub_query_condition, $site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 게시판 - 강의배정표
     * @param array $params
     */
    public function ListOfflineBoardModal($params = [])
    {
        $bm_idx = $params[0];
        $site_code = $this->_req('site_code');

        if (empty($this->boardInfo[$bm_idx]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view('live/video/board/list_offLineBoard_modal', [
            'bm_idx' => $bm_idx,
            'boardInfo' => $this->boardInfo,
            'site_code' => $site_code,
            'offLineSite_list' => $offLineSite_list,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category,
        ]);
    }

    public function AjaxOfflineBoardModal($params = [])
    {
        $bm_idx = $params[0];
        $site_code = $this->_req('site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $bm_idx,
                'LB.IsStatus' => 'Y',
                'LB.CampusCcd' => $this->_reqP('search_modal_campus_ccd'),
                'LB.IsUse' => $this->_reqP('search_modal_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_modal_value'),
                    'LB.Content' => $this->_reqP('search_modal_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_modal_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_modal_start_date')) && !empty($this->_reqP('search_modal_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_modal_start_date'), $this->_reqP('search_modal_end_date')]]
            ]);
        }

        $sub_query_condition = [];
        if (empty($this->_reqP('search_category')) === false) {
            $sub_query_condition = [
                'EQ' => [
                    'subLBrC.IsStatus' => 'Y',
                    'subLBrC.CateCode' => $this->_reqP('search_category')
                ]
            ];
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoard($this->board_name[$bm_idx],true, $arr_condition, $sub_query_condition, $site_code);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoard($this->board_name[$bm_idx],false, $arr_condition, $sub_query_condition, $site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function readLiveLectureMaterialModal($params = [])
    {
        $board_idx = $params[0];
        $bm_idx = $this->_req('bm_idx');
        $get_site_code = $this->_req('site_code');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.SubjectIdx, PS.SubjectName, LB.CourseIdx, PRODUCT_COURSE.CourseName, LB.ProfIdx, PROFESSOR.ProfNickName
        ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name[$bm_idx], $column, $arr_condition, $arr_condition_file);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $this->load->view('live/video/board/read_liveLectureMaterial_modal', [
            'bm_idx' => $bm_idx,
            'get_site_code' => $get_site_code,
            'boardInfo' => $this->boardInfo,
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function readOfflineBoardModal($params = [])
    {
        $board_idx = $params[0];
        $bm_idx = $this->_req('bm_idx');
        $get_site_code = $this->_req('site_code');

        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm
        ';

        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardModel->findBoardForModify($this->board_name[$bm_idx], $column, $arr_condition, $arr_condition_file);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $data['arr_cate_code'] = [];
        $arr_cate_code = $this->boardModel->listBoardCategory($board_idx);
        if (empty($arr_cate_code) === false) {
            $data['arr_cate_code'] = array_values($arr_cate_code);
        }

        $this->load->view('live/video/board/read_offLineBoard_modal', [
            'bm_idx' => $bm_idx,
            'get_site_code' => $get_site_code,
            'boardInfo' => $this->boardInfo,
            'data' => $data,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt
        ]);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}