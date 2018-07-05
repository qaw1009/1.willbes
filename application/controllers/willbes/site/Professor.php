<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->library('restClient');
    }

    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if ($this->_site_id == 'gosi') {
            // 공무원일 경우 카테고별 직렬, 직렬별 과목 조회
            $arr_base = $this->api_get_data(
                $this->restclient->getsDataJson([
                    ['name' => 'series', 'uri' => 'product/bases/series2category/' . $this->_site_code, 'params' => ['cate_code' => $this->_cate_code]],
                    ['name' => 'subject', 'uri' => 'product/bases/subject2series/' . $this->_site_code, 'params' => ['cate_code' => $this->_cate_code, 'series_ccd' => element('series_ccd', $arr_input)]],
                ])
            );
        } else {
            // 카테고리별 과목 조회
            $arr_base['subject'] = $this->api_get_data(
                $this->restclient->getDataJson('product/bases/subject2category/' . $this->_site_code, [
                    'cate_code' => $this->_cate_code
                ])
            );
        }

        // 신규강좌 조회
        $arr_base['product'] = $this->api_get_data(
            $this->restclient->getDataJson('product/products/index/on_lecture', [
                'site_code' => $this->_site_code,
                'cate_code' => $this->_cate_code,
                'is_new' => 'Y',
                'offset' => 0,
                'limit' => 5
            ])
        );

        // 교수 조회
        $arr_base['professor'] = $this->api_get_data(
            $this->restclient->getDataJson('product/bases/professor-in-refer2subject/' . $this->_site_code, [
                'cate_code' => $this->_cate_code,
                'subject_idx' => element('subject_idx', $arr_input),
            ])
        );

        // 교수조회 결과에 존재하는 과목 정보
        $selected_subjects = array_pluck($arr_base['professor'], 'SubjectName', 'SubjectIdx');

        // 교수 조회결과 재정의
        $selected_list = [];
        foreach ($arr_base['professor'] as $idx => $row) {
            $row['ProfReferData'] = $row['ProfReferData'] == 'N' ? [] : json_decode($row['ProfReferData'], true);

            $selected_list[$row['SubjectIdx']][] = $row;
        }

        $this->load->view('site/professor/index' . $this->_pass_site_val, [
            'arr_param' => $params,
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ]
        ]);
    }

    public function show()
    {
        echo '교수 상세';
    }    
}