<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWMasterLecture extends \app\controllers\BaseController
{
    protected $models = array('common/searchWMasterLecture','sys/wcp','sys/wCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cp_list = $this->wcpModel->getRoleCpArray();       //관리자권한 CP 목록
        $codes = $this->wCodeModel->getCcdInArray(['105','111']);    //강의진행상태,콘텐츠유형

        $this->load->view('common/search_wmasterlecture',[
            'cp_list' => $cp_list
            ,'content_ccd' => $codes['111']
            ,'progress_ccd' => $codes['105']
        ]);
    }

    /**
     * 마스터강의 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $_search_value = $this->_req('search_value');
        $_search_prof = $this->_req('search_prof');
        $_search_cp = $this->_req('search_cp');                        //cp
        $_search_category = $this->_req('search_category');     //콘텐츠유형
        $_search_progress = $this->_req('search_progress');     //진행상태
        $_search_is_use = $this->_req('search_is_use');            //사용여부

        $arr_condition = [
            'EQ' => [
                'cp_wAdminIdx'=>$this->session->userdata('admin_idx')
                ,'wCpIdx'=>$_search_cp
                ,'wContentCcd'=>$_search_category
                ,'wProgressCcd'=>$_search_progress
                ,'wIsUse'=>$_search_is_use
            ]
            ,'ORG1' => [
                'LKB' => [
                    'wLecIdx'=>$_search_value
                    ,'wLecName'=>$_search_value
                ]
            ]
            ,'ORG2' => [
                'LKB' => [
                    'profName_string'=>$_search_prof
                    ,'profIdx_string'=>$_search_prof
                ]
            ]
        ];

        $list = [];
        $count = $this->searchWMasterLectureModel->listLecture(true,$arr_condition);

        if($count > 0) {
            $list = $this->searchWMasterLectureModel->listLecture(false,$arr_condition,$this->_reqP('length'), $this->_reqP('start'), ['wLecIdx' => 'desc']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    //회차검색
    public function unit($params=[])
    {
        $lecidx = $params[0];

        //강의기본정보
        $data = $this->searchWMasterLectureModel->findLecture($lecidx);
        
        //회차정보
        $data_unit = $this->searchWMasterLectureModel->listAllUnit($lecidx);
        
        $this->load->view('common/search_wmasterlectureunit',[
            'data_lecture' => $data
            ,'data_unit' => $data_unit
        ]);
    }
    
    //마스터강의 연결 LMS 교수 정보 추출
    public function wMasterLectureProfessor()
    {
        $sitecode = $this->_req("sitecode");
        $wlecidx = $this->_req("wlecidx");
        $learnpatternccd = $this->_req("learnpatternccd");

        $result = $this->searchWMasterLectureModel->listWMasterLectureProfessor($sitecode,$learnpatternccd,$wlecidx);
        return $this->json_result(true,'성공',[],$result);
    }


    //단강좌 연결 마스터강의 연결 LMS 교수 정보 추출
    public function wMasterLectureProfessorFromLecture()
    {
        $sitecode = $this->_req("sitecode");
        $prodcode = $this->_req("prodcode");
        $learnpatternccd = $this->_req("learnpatternccd");

        $result = $this->searchWMasterLectureModel->listWMasterLectureProfessorFromLecture($sitecode,$learnpatternccd,$prodcode);
        return $this->json_result(true,'성공',[],$result);
    }


}

