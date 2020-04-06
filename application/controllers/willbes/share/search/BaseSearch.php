<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSearch extends \app\controllers\FrontController
{
    protected $models = array('search/searchF','product/lectureF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $_view_dir = '';

    public function __construct($_view_file='site/search/result')
    {
        parent::__construct();
        $this->_view_dir = $_view_file;
    }

    public function index()
    {
        return;
    }

    /**
     * 검색결과
     * @param array $params
     */
    public function result($params=[])
    {

        $config['allow_any_cors_domain'] = TRUE;

        $arr_search_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $common_condition = [
            'EQ' => [
                'SiteCode' => ($this->_site_code === '2000' ? null : $this->_site_code)
            ]
            //,'LKR' => ['CateCode' => element('cate',$arr_search_input)]
            ,'ORG1' =>[
                'LKB' => [
                    'ProdName' => element('searchfull_text',$arr_search_input),
                    'Keyword' => element('searchfull_text',$arr_search_input)
                ]
            ]
        ];

        $order_by = empty(element('searchfull_order',$arr_search_input)) ? ['ProdCode'=>'DESC'] : [element('searchfull_order',$arr_search_input)=>'DESC'];
        $data = [];
        $total_cnt = 0;
        $limit = ($this->_site_code === '2000' ? '200' : null);

        if(empty($arr_search_input) === false && empty(element('searchfull_text',$arr_search_input)) === false ) {
            //단강좌
            $data_lecture = $this->searchFModel->findSearchProduct('on_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $limit);

            //무료강좌
            $data_free_lecture = $this->searchFModel->findSearchProduct('on_free_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $limit);

            //추천패키지
            $data_adminpack_lecture_648001= $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648001']]), $order_by,$limit);

            //선택패키지
            $data_adminpack_lecture_648002 = $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648002']]), $order_by,$limit);

            /*
             *로그 저장
             */
            $result_info = '단강좌:'.count($data_lecture).
                ', 무료강좌:' .count($data_free_lecture).
                ', 추천패키지:' .count($data_adminpack_lecture_648001).
                ', 선택패키지:' .count($data_adminpack_lecture_648002)
            ; // 검색 항목이 추가될때마다 해당 내용 기재

            $total_cnt = count($data_lecture)
                + count($data_free_lecture)
                + count($data_adminpack_lecture_648001)
                + count($data_adminpack_lecture_648002)
            ;

            $log_data = [
                'SiteCode' => $this->_site_code,
                'CateCode' => element('cate',$arr_search_input),
                'SearchWord' => element('searchfull_text',$arr_search_input),
                'ResultCount' => $total_cnt,
                'ResultInfo' => $result_info,
                'SearchType' => 'U'
            ];
            $this->searchFModel->saveSearchLog($log_data);
        }

        $data['on_lecture'] = [];
        $data['on_free_lecture'] = [];
        $data['adminpack_lecture_648001'] = [];
        $data['adminpack_lecture_648002'] = [];

        if(!empty($data_lecture)) {
            foreach ($data_lecture as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                $data['on_lecture'][] = $row;
            }
        }

        if(!empty($data_free_lecture)) {
            foreach ($data_free_lecture as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $row['LectureSampleData'] = json_decode($row['LectureSampleData'], true);
                $data['on_free_lecture'][] = $row;
            }
        }

        if(!empty($data_adminpack_lecture_648001)) {
            foreach ($data_adminpack_lecture_648001 as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $data['adminpack_lecture_648001'][] = $row;
            }
        }

        if(!empty($data_adminpack_lecture_648002)) {
            foreach ($data_adminpack_lecture_648002 as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $data['adminpack_lecture_648002'][] = $row;
            }
        }

        $this->load->view($this->_view_dir,[
            'arr_search_input'=>$arr_search_input,
            'total_count' => $total_cnt,
            'data'=>$data
        ]);
    }

    /**
     * 보강동영상 비밀번호 체크            :willbes/site/lecture.php
     * @param array $params
     * @return CI_Output
     */
    public function checkFreeLecPasswd($params = [])
    {
        $prod_code = element('prod-code', $params);
        $free_lec_passwd = trim($this->_reqP('free_lec_passwd'));
        $free_lec_check = trim($this->_reqP('free_lec_check'));

        // 필수 파라미터 체크
        if (empty($prod_code) === true) {
            return $this->json_error('필수 입력값 오류입니다.', _HTTP_BAD_REQUEST);
        }
        if ($free_lec_check !=="p" && empty($free_lec_passwd) === true) {
            return $this->json_error('비밀번호가 입력되지 않았습니다.', _HTTP_BAD_REQUEST);
        }

        // 상품 조회
        $data = $this->lectureFModel->findProductByProdCode('on_free_lecture', $prod_code, ', fn_dec(FreeLecPasswd) as FreeLecPasswdDec', ['EQ' => ['IsUse' => 'Y']]);
        if (empty($data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 보강동영상 여부 확인
        if ($data['FreeLecTypeCcd'] != $this->lectureFModel->_free_lec_type_ccd['bogang']) {
            return $this->json_error('해당 무료강좌는 보강동영상이 아닙니다.', _HTTP_NOT_FOUND);
        }

        // 비밀번호 비교
        if ($data['FreeLecPasswdDec'] != $free_lec_passwd) {
            return $this->json_error('비밀번호가 일치하지 않습니다.', _HTTP_NO_PERMISSION);
        }

        // 보강동영상 비밀번호 확인완료 세션 생성
        $sess_free_bogang_prod_codes = (array) $this->session->userdata('free_bogang_prod_codes');
        array_push($sess_free_bogang_prod_codes, $prod_code);
        $this->session->set_userdata('free_bogang_prod_codes', array_unique(array_filter($sess_free_bogang_prod_codes)));

        return $this->json_result(true, '', []);
    }
}