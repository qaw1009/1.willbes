<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchSubjectMapping extends \app\controllers\BaseController
{
    protected $models = array('product/base/sortMapping');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 카테고리 + 과목 매핑 검색
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('common/search_subject_mapping', [
            'site_code' => element('0', $params, '')
        ]);
    }

    /**
     * 카테고리 + 과목 매핑 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => ['S.SiteCode' => $this->_reqP('site_code')],
            'ORG' => [
                'LKB' => [
                    'PS.SubjectIdx' => $this->_reqP('search_value'),
                    'PS.SubjectName' => $this->_reqP('search_value')
                ]
            ],
            'IN' => ['S.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];

        $list = [];
        $count = $this->sortMappingModel->listSearchSubjectMapping(true, $arr_condition);

        if ($count > 0) {
            $list = $this->sortMappingModel->listSearchSubjectMapping(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PSC.CsIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
