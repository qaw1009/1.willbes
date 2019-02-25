<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeriodPackage extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = 'periodpack_lecture';  //기간제 패지키

    /**
     * 패키지 목록
     * @param array $params
     */
    public function index($params = [])
    {
        return;
    }

    /**
     * 패키지 콘텐츠 보기
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $data['lecture'] = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code);
        $data['contents'] = $this->packageFModel->findProductContents($prod_code); //상품 컨텐츠 추출

        $this->load->view('site/package/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'data' => $data
        ]);
    }

    /**
     * 패키지 상세 보기
     * @param array $params
     */
    public function show($params = [])
    {
        $pack = element('pack', $params);
        $prod_code = element('prod-code', $params);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_merge($arr_input, [
            'pack' => $pack
            , 'prod-code' => $prod_code
        ]);

        if (empty($prod_code)) {
            show_alert('상품코드가 존재하지 않습니다.', 'back');
        }

        $order_by = [];
        $model_method = 'subListProduct';

        switch ($pack) {
            case '648001':
                $view_page = 'show_normal';
                break;
            case '648002':
                $view_page = 'show_choice';
                $model_method = 'subListProductGroupBy';
                break;
        }
        //일반형, 선택형 조건 값 추가
        $arr_condition = [
            'EQ' => [
                'PackTypeCcd' => $pack
            ]
        ];

        $data = $this->packageFModel->findProductByProdCode($this->_learn_pattern, $prod_code, null, $arr_condition);  //상품 정보 추출
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        $data['contents'] = $this->packageFModel->findProductContents($prod_code); //상품 컨텐츠 추출

        // 판매가격 정보 확인
        $data['ProdPriceData'] = json_decode($data['ProdPriceData'], true); //상품 가격 정보 치환
        if (empty($data['ProdPriceData']) === true) {
            show_alert('판매가격 정보가 없습니다.', 'back');
        }

        $data_subject_cnt = [];

        if($pack === '648001') {
            $data_sublist = $this->packageFModel->{$model_method}($this->_learn_pattern, $prod_code, [], null, null, $order_by);   //패키지 하위 강좌 목록
            // 일반형일 경우 데이터별 항목 풀기
            foreach ($data_sublist as $idx => $row) {
                $data_sublist[$idx]['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $data_sublist[$idx]['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                $data_sublist[$idx]['ProfReferData'] = json_decode($row['ProfReferData'], true);
                $data_sublist[$idx]['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
            }

        } else {
            // 교수 목록 및 과목별 교수 갯수 구룹핑
            list($data_sublist, $data_subject_cnt) = $this->packageFModel->{$model_method}($this->_learn_pattern, $prod_code, [], null, null, $order_by);   //패키지 하위 강좌 목록

            // 필수,선택별 과목 묶기 --  $data_subject_cnt 로 대체
            //$selected_subjects = array_data_pluck($data_sublist, 'SubjectName', ['IsEssential','SubjectIdx']);

            foreach ($data_sublist as $idx => $row) {
                $data_sublist[$idx]['ProfReferData'] = json_decode($row['ProfReferData'], true);
            }
        }

        //echo var_dump($data_subject_cnt);

        $this->load->view('site/periodpackage/' . $view_page, [
            'arr_input' => $arr_input,
            'data' => $data,
            'data_sublist' => $data_sublist,
            'data_subject_cnt' => $data_subject_cnt,
            'learn_pattern' => $this->_learn_pattern
        ]);
    }
}