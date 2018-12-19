<?php
/**
 * ======================================================================
 * 교수검색 (단일) - lms_professor DB
 * ======================================================================
 *
 * @param $_GET['siteCode'] OR NULL
 * @return 부모창 <span id="selected_professor"> 태그내
 *         교수명 문자열 + <input type="hidden" name="ProfIdx">
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProfessor extends \app\controllers\BaseController
{
    protected $models = array('common/searchProfessor');
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수검색 팝업 메인
     */
    public function index()
    {
        $siteCode = $this->input->get('siteCode');
        if ( !empty($siteCode) && !preg_match('/^[0-9]+$/', $siteCode) ) return false;

        $this->load->view('common/search_professor', [
            'siteCode' => $siteCode,
        ]);
    }


    /**
     * 교수검색 팝업 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'sc_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'P.SiteCode' => $this->input->post('siteCode')
            ],
            'ORG' => [
                'LKB' => [
                    'P.ProfIdx' => $this->input->post('sc_fi', true),
                    'PMS.wProfName' => $this->input->post('sc_fi', true),
                    'PMS.wProfId' => $this->input->post('sc_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->searchProfessorModel->professorList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }
}