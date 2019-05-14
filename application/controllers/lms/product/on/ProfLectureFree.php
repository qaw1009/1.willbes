<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/lms/product/on/LectureFree.php';


Class ProfLectureFree extends LectureFree
{
    public function __construct()
    {
        parent::__construct();

        //교수권한
        $this->prof_role_idx = $this->config->item('prof_role_idx');
    }

    public function index()
    {
        $learnpattern_ccd='615005';

        //사이트 구분값 추출
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $is_prof = $this->session->userdata('admin_auth_data')['Role']['RoleIdx'] == $this->prof_role_idx ? 'Y' : '';

        //공통코드
        $codes = $this->codeModel->getCcdInArray(['652','611','618','635']);

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/on/proflecture/index',[
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'LecType_ccd' => $codes['652'],
            'Multiple_ccd' => $codes['611'],
            'Sales_ccd' => $codes['618'],
            'PointApply_ccd' => $codes['635'],
            'is_prof' => $is_prof,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'learnpattern_ccd' => $learnpattern_ccd
        ]);
    }

}

