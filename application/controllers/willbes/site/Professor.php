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

    /**
     * 교수진 소개 메인
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $subject_idx = element('subject_idx', $arr_input);

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
            $this->restclient->getDataJson('product/products/index/on_lecture/simple', [
                'site_code' => $this->_site_code,
                'cate_code' => $this->_cate_code,
                'is_new' => 'Y',
                'limit' => 5
            ])
        );

        // 전체 교수 조회
        $arr_professor = $this->api_get_data(
            $this->restclient->getDataJson('product/bases/professor-refer2subject/' . $this->_site_code, [
                'cate_code' => $this->_cate_code
            ])
        );

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'wProfName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 선택된 과목에 맞는 교수 정보
        $arr_base['professor'] = current(element($subject_idx, $arr_subject2professor, []));

        // 교수 조회결과 재정의
        $selected_list = $selected_subjects = [];
        foreach ($arr_professor as $idx => $row) {
            if (empty($subject_idx) === true || $subject_idx == $row['SubjectIdx']) {
                $row['ProfReferData'] = $row['ProfReferData'] == 'N' ? [] : json_decode($row['ProfReferData'], true);

                $selected_subjects[$row['SubjectIdx']] = $row['SubjectName'];
                $selected_list[$row['SubjectIdx']][] = $row;
            }
        }

        $this->load->view('site/professor/index' . $this->_pass_site_val, [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'arr_subject2professors' => $arr_subject2professor,
            'data' => [
                'subjects' => $selected_subjects,
                'list' => $selected_list
            ]
        ]);
    }

    /**
     * 교수 상세
     * @param array $params
     */
    public function show($params = [])
    {
        $prof_idx = element('prof-idx', $params);
        if (empty($prof_idx)) {
            show_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST, '잘못된 접근');
        }

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 전체 교수 조회
        $arr_professor = $this->api_get_data(
            $this->restclient->getDataJson('product/bases/professor2subject/' . $this->_site_code, [
                'cate_code' => $this->_cate_code
            ])
        );

        // LNB 메뉴용 전체 교수 정보
        $arr_subject2professor = array_data_pluck($arr_professor, 'wProfName', ['SubjectIdx', 'SubjectName', 'ProfIdx']);

        // 교수 정보 조회
        $data = $this->api_get_data(
            $this->restclient->getDataJson('product/professors/index/' . $prof_idx, [
                'is_refer' => 'Y'
            ])
        );

        // 교수 참조 정보
        $data['ProfReferData'] = $data['ProfReferData'] == 'N' ? [] : json_decode($data['ProfReferData'], true);

        // 베스트, 신규 강좌 조회
        $products = $this->api_get_data(
            $this->restclient->getsDataJson([
                ['name' => 'best', 'uri' => 'product/products/index/on_lecture/lecture-sample',
                    'params' => ['site_code' => $this->_site_code, 'cate_code' => $this->_cate_code, 'ProfIdx' => $prof_idx, 'SubjectIdx' => $arr_input['subject_idx'],  'is_best' => 'Y', 'limit' => 3]
                ],
                ['name' => 'new', 'uri' => 'product/products/index/on_lecture/simple',
                    'params' => ['site_code' => $this->_site_code, 'cate_code' => $this->_cate_code, 'ProfIdx' => $prof_idx, 'SubjectIdx' => $arr_input['subject_idx'], 'is_new' => 'Y', 'limit' => 2]
                ],
            ])
        );

        $this->load->view('site/professor/show' . $this->_pass_site_val, [
            'arr_input' => $arr_input,
            'arr_subject2professors' => $arr_subject2professor,
            'data' => $data,
            'products' => $products
        ]);
    }    
}
