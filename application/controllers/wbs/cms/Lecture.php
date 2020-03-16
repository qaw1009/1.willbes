<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\BaseController
{
	protected $models = array('sys/code','sys/cp','pms/professor','cms/lecture','cms/unit');
	protected $helpers = array('download','file');


	public function __construct()
	{
		parent::__construct();
	}

    /**
     * 마스터강의 메인
     */
	public function index()
	{
        //cp목록(관리자 권한별)
        $rolecp = $this->cpModel->getRoleCpArray();

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['105','111']);

		$this->load->view('cms/lecture/index',[
            'cp_list' => $rolecp
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
        $_search_cp = $this->_req('search_cp');
        $_search_category = $this->_req('search_category');
        $_search_progress = $this->_req('search_progress');
        $_search_is_use = $this->_req('search_is_use');

        $arr_condition = [
            'EQ' => [
                'A.wIsStatus'=>'Y'
                ,'G.wAdminIdx'=>$this->session->userdata('admin_idx')
                ,'A.wCpIdx'=>$_search_cp
                ,'A.wContentCcd'=>$_search_category
                ,'A.wProgressCcd'=>$_search_progress
                ,'A.wIsUse'=>$_search_is_use
            ]
            ,'ORG1' => [
                'LKB' => [
                    'A.wLecIdx'=>$_search_value
                    ,'A.wLecName'=>$_search_value
                ]
            ]
            ,'ORG2' => [
                'LKB' => [
                    'H.profName_string'=>$_search_prof
                    ,'H.profIdx_string'=>$_search_prof
                ]
            ]
        ];

        $list = [];
        $count = $this->lectureModel->listLecture(true,$arr_condition);

        if($count > 0) {
            $list = $this->lectureModel->listLecture(false,$arr_condition,$this->_reqP('length'), $this->_reqP('start'), ['A.wRegDatm' => 'desc']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 마스터강의 등록/수정 폼
     * @param array $params
     */
	public function create($params = [])
	{
		$method = 'POST';
		$lecidx = null;
		$data = null;
        $data_prof = [];
        $data_unit = [];

        $rolecp = [];
        $prof = [];
        $codes = [];
        
		if (empty($params[0]) === false) {
			$method = 'PUT';
			$lecidx = $params[0];
            $data = $this->lectureModel->findLectureForModify($lecidx);     //마스터강의 정보
            $data_prof = $this->lectureModel->findLectureProfessorForModify($lecidx);   //마스터강의 연결 교수 정보
            $data_unit = $this->unitModel->listAllUnit($lecidx);    //회차정보
		}

		//cp목록(관리자 권한별)
		$rolecp = $this->cpModel->getRoleCpArray();

		//교수목록
		$prof = $this->professorModel->getProfessorArray();

		//공통코드
		$codes = $this->codeModel->getCcdInArray(['104','105','111']);

		$this->load->view('cms/lecture/create',[
			'method' => $method
			,'cp_list' => $rolecp
			,'prof_list' => $prof
			,'content_ccd' => $codes['111']
			,'shooting_ccd' => $codes['104']
			,'progress_ccd' => $codes['105']
			,'lecidx' => $lecidx
			,'data' => $data
            ,'data_prof' => $data_prof
            ,'data_unit' => $data_unit
		]);

	}

    /**
     * 마스터강의 등록/수정 처리
     */
	public function store()
	{
		$method='add';
		$rules = [
			['field'=>'CpIdx','label'=>'CP사','rules'=>'trim|required']
			,['field'=>'ContentCcd','label'=>'콘텐츠유형','rules'=>'trim|required']
			,['field'=>'LecName','label'=>'마스터강의명','rules'=>'trim|required']
            ,['field'=>'ProfIdx[0]', 'label' => '교수', 'rules' => 'trim|required']
            //,['field'=>'ProfIdx[]', 'label' => '교수', 'rules' => 'callback_check_default'] //selectbox 밸리데이트 필요한듯..
			,['field'=>'ShootingCcd','label'=>'촬영형태','rules'=>'trim|required']
			,['field'=>'ProgressCcd','label'=>'진행상태','rules'=>'trim|required']
			,['field'=>'MakeY','label'=>'제작년','rules'=>'trim|required']
			,['field'=>'MakeM','label'=>'제작월','rules'=>'trim|required']
			,['field'=>'MediaUrl','label'=>'미디어경로','rules'=>'trim|required']
		];

		if(empty($this->_reqP('LecIdx',false)) === false) {
			$method = 'modify';
		}

		if($this->validate($rules) === false) {
			return;
		}

		$result = $this->lectureModel->{$method.'Lecture'}($this->_reqP(null,false));

		$this->json_result($result['ret_cd'],'저장 되었습니다.',$result['ret_data'],$result['ret_data']);
	}

    /**
     * 마스터강의 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download()
    {
        $filename = urldecode($this->_req('filename', false));
        $filename_ori = urldecode($this->_req('filename_ori',false));
        public_download($filename, $filename_ori);
    }

    /**
     * 마스터강의 처리 (add/modify)
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'wlecidx', 'label' => '마스터강의코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $wlecidx = $this->_req('wlecidx');

        $result = $this->lectureModel->lectureCopy($wlecidx);

        $this->json_result($result,'복사 되었습니다.',$result);
    }

    /**
     * 마스터강의 목록내 사용여부 처리
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '상태값', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->lectureModel->modifyLectureByColumn(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }



    /**
     * 마스터강의 회차 등록 폼
     * @param array $params
     * @return CI_Output
     */
    public function createUnitModal($params=[])
    {
        $method='POST';
        $prof = [];
        $data_unit = [];
        $selected_prof_idx = '';

        if(empty($params[0]) === false) {
            $lecidx = $params[0];
            if(empty($params[1]) == false) {
                $selected_prof_idx =  $params[1];
            }

            // 화면비율 코드
            $codes = $this->codeModel->getCcdInArray(['108']);

            //마스터강의 정보
            $data = $this->lectureModel->findLectureForUnit($lecidx);

            //교수목록
            $prof = $this->professorModel->getProfessorArray();

            //회차정보
            $data_unit = $this->unitModel->listAllUnit($lecidx);

            $this->load->view('cms/lecture/create_unit_modal',[
                'method' => $method
                ,'lecidx'=>$lecidx
                ,'data'=>$data
                ,'prof_list'=> $prof
                ,'data_unit' => $data_unit
                ,'codes' => $codes
                ,'selected_prof_idx' => $selected_prof_idx
            ]);

        } else {
            return $this->json_error('마스터 강의 코드가 없습니다.', _HTTP_NOT_FOUND);
        }
    }

    /**
     * 마스터강의 회차 처리 프로세스 (등록/수정/삭제)
     * @return CI_Output
     */
    public function storeUnit($params=[])
    {
        $method='add';

        if(empty($this->_reqP('method')) === false) {
            if($this->_reqP('method') === 'POST') {
                $method='deleteFile';
            }
        }

        if(empty($this->_reqP('LecIdx',false)) === true) {
            return $this->json_error('마스터 강의 코드가 없습니다.', _HTTP_NOT_FOUND);
        }

        $result = $this->unitModel->{$method.'Unit'}($this->_req(null,false));
        $this->json_result($result,'저장 되었습니다.',$result);
    }

    /**
     *  마스터강의 회차 실행
     */
    public function player()
    {
        $lecidx = $this->_req("lecidx");
        $unitidx = $this->_req('unitidx');
        $quility = $this->_req('quility');
        $url = $this->_req("url");
        $ratio = $this->_req("ratio");

        $data = $data = $this->lectureModel->findLectureForModify($lecidx);

        if( empty($unitidx) == true){
            $ratioArr = $this->codeModel->getCode($ratio);
            $ratio = $ratioArr[0]['wCcdValue'];
            $title = 'URL : '.$url;

        } else {
            $unitdata = $this->unitModel->getUnit($unitidx);

            if(empty($unitdata) == true){
                show_alert('회차정보가 없습니다.', 'close');
            }

            $unitdata = $unitdata[0];
            $ratioArr = $this->codeModel->getCode($unitdata['wContentSizeCcd']);
            $ratio = $ratioArr[0]['wCcdValue'];

            switch($quility){
                case 'WD':
                    $filename = $unitdata['wWD'];
                    $ratio = 21;
                    break;

                case 'HD':
                    $filename = $unitdata['wHD'];
                    break;

                case 'SD':
                    $filename = $unitdata['wSD'];
                    break;

                default:
                    $filename = $unitdata['wWD'];
                    break;
            }

            $url = $data['wMediaUrl'].'/'.$filename;
            $title = $unitdata['wUnitNum'].'회 '.$unitdata['wUnitLectureNum'].'강 '.$unitdata['wUnitName'];
        }


        $this->load->view('cms/lecture/player', [
            'title' => $title,
            'url' => $url,
            'ratio'=> $ratio,
            'data' => $data
        ]);
    }

}