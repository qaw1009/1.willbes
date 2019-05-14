<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProfessorLecture extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/lecture','product/on/lectureFree','common/searchWMasterLecture');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    /**
     * 과정 상세보기
     * @return CI_Output
     */
    public function view($params)
    {
        if(empty($params)) {
            return $this->json_error('강좌 코드가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }

        $prod_code = $params[0];
        $learnpattern_ccd = $params[1];

        if($learnpattern_ccd == '615001') {
            $lecture_model = 'lectureModel';
        } else if($learnpattern_ccd == '615005') {
            $lecture_model = 'lectureFreeModel';
        }


        $arr_condition = [
            'EQ' => [
                'A.ProdCode' => $prod_code
            ]
        ];

        //교수 관리자의 경우 본인의 과정만 추출
        if($this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == $this->config->item('prof_role_idx')) {
            if(empty($this->session->userdata("admin_wprof_idx")) === false) {
                $arr_condition = array_merge_recursive($arr_condition,[
                    'EQ' => [
                        'E.wProfIdx' => $this->session->userdata("admin_wprof_idx")
                    ]
                ]);
            }
        }

        $data = $this->{$lecture_model}->listLecture(false, $arr_condition);
        if(empty($data)) {
            return $this->json_error('강좌 정보가 존재하지 않습니다.', _HTTP_BAD_REQUEST);
        }

        $data_unit = $this->searchWMasterLectureModel->listAllUnit($data[0]['wLecIdx']);

        $this->load->view('common/search_professor_lecture_view',[
            'data' => $data[0],
            'data_unit' => $data_unit
        ]);
    }
}
