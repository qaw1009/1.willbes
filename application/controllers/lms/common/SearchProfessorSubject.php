<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProfessorSubject extends \app\controllers\BaseController
{
    protected $models = array('product/base/professor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사이트 카테고리별 과목/교수 데이터 검색
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('common/search_professor_subject', [
            'site_code' => element('0', $params, ''),
            'cate_code' => element('1', $params, '')
        ]);
    }

    /**
     * 사이트 카테고리별 과목/교수 데이터 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'PF.SiteCode' => $this->_reqP('site_code'),
                'PSC.CateCode' => $this->_reqP('cate_code'),
            ],
            'ORG' => [
                'LKB' => [
                    'PSC.ProfIdx' => $this->_reqP('search_value'),
                    'WP.wProfName' => $this->_reqP('search_value')
                ]
            ],
            'IN' => ['PF.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];

        $list = [];
        $count = $this->professorModel->listSearchProfessorSubjectMapping(true, $arr_condition);

        if ($count > 0) {
            $list = $this->professorModel->listSearchProfessorSubjectMapping(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PSC.PcIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
