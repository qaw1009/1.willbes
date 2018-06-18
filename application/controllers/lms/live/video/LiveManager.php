<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveManager extends \app\controllers\BaseController
{
    protected $models = array('live/video/liveManager', 'sys/site', 'sys/category', 'board/board', 'product/base/subject', 'product/base/course', 'product/base/professor');
    protected $helpers = array();
    protected $boardInfo = [
        '82' => '강의배정표',
        '83' => '강의자료실'
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
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');
        $list = $this->liveManagerModel->listLiveVideo([], null, null, ['lms_lecture_live_video.LecLiveVideoIdx' => 'asc', 'lms_lecture_live_video.OrderNum' => 'asc']);

        $this->load->view("live/video/index", [
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

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->liveManagerModel->findLiveVideoForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('live/video/create', [
            'method' => $method,
            'arr_campus' => $arr_campus,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'lec_room_name', 'label' => '강의실명', 'rules' => 'trim|required'],
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

        $result = $this->liveManagerModel->{$method . 'LiveVideo'}($this->_reqP(null, false));

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

        $result = $this->liveManagerModel->modifyLiveVideoReorder(json_decode($this->_reqP('params'), true));

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
     * 게시판
     * @param array $params
     */
    public function viewBoardListModel($params = [])
    {
        $bm_idx = $params[0];
        $site_code = $this->_req('site_code');

        if (empty($this->boardInfo[$bm_idx]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->boardModel->getOffLineSiteArray();

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

        $this->load->view('live/video/view_board_list_model', [
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
}