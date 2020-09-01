<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookStore extends \app\controllers\FrontController
{
    protected $models = array('categoryF', 'product/baseProductF', 'product/bookF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'book';     // 학습형태 (교재)
    private $_pattern_name = ['all' => '전체메뉴', 'best' => '베스트셀러', 'new' => '신간안내', 'willbes' => '윌비스출판사'];
    private $_page_per_rows = 10;   // 페이지당 출력되는 상품수
    private $_show_page_num = 10;   // 페이지 수
    private $_is_npay = false;  // 네이버페이 사용여부

    public function __construct()
    {
        parent::__construct();

        // 네이버페이 사용여부
        if ($this->_site_code == '2012') {
            $this->_is_npay = true;
        }
    }

    /**
     * 온라인서점 교재 목록
     * @param array $params [조회구분 (all : 전체, 베스트 : best, 신간 : new, 윌비스출판사 : willbes)]
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_input = array_unset($arr_input, 'page');

        // 입력값 설정
        $pattern = strtolower(element('pattern', $params, 'all'));
        $cate_code = element('cate_code', $arr_input, '');
        $query_string = http_build_query($arr_input);

        // 패턴값 체크
        if (array_key_exists($pattern, $this->_pattern_name) === false) {
            redirect(front_url('/bookStore/index/pattern/all'));
        }

        // 소트매핑 영역 노출 여부
        $is_sort_mapping = false;
        $arr_sort_mapping_pattern = $this->_is_mobile === true ? ['all'] : ['all', 'willbes'];
        if (in_array($pattern, $arr_sort_mapping_pattern) === true) {
            $is_sort_mapping = true;
        }

        // 대분류 카테고리 조회 (윌스토리 > 온라인서점 1차 카테고리 제외)
        $arr_base['category_d1'] = $this->categoryFModel->listSiteCategory($this->_site_code, 1, ['EQ' => ['IsDisp' => 'Y']]);

        // 모바일 환경일 경우 카테고리 디폴트 선택
        if ($this->_is_mobile === true && $pattern == 'all' && empty($cate_code) === true) {
            $cate_code = array_get($arr_base['category_d1'], '0.CateCode');
        }

        // 카테고리 코드
        $arr_base['cate_code_d1'] = substr($cate_code, 0, 4);
        $arr_base['cate_code_d2'] = strlen($cate_code) > 4 ? $cate_code : '';

        // 중분류 카테고리 조회
        if (empty($arr_base['cate_code_d1']) === false) {
            $arr_base['category_d2'] = $this->categoryFModel->listSiteCategory($this->_site_code, null, ['EQ' => ['ParentCateCode' => $arr_base['cate_code_d1']]]);
        }

        // 카테고리별 과목 조회
        $arr_base['subject'] = [];
        if (empty($cate_code) === false) {
            $arr_base['subject'] = $this->baseProductFModel->listSubjectCategoryMapping($this->_site_code, $cate_code);
        }

        // 상품 조회 조건
        // 검색어 설정
        $arr_base['search_keyword'] = '';
        $arr_base['search_value'] = '';
        if (empty(element('search_text', $arr_input)) === false) {
            $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2);
            $arr_base['search_keyword'] = element('0', $arr_search_text);
            $arr_base['search_value'] = element('1', $arr_search_text);
        }

        // 기본 조건
        $arr_condition = [
            'EQ' => [
                'SiteCode' => $this->_site_code,
            ],
            'LKR' => [
                'CateCode' => $cate_code,
            ],
            'LKB' => [
                'SubjectIdx' => element('subject_idx', $arr_input),
                $arr_base['search_keyword'] => $arr_base['search_value']
            ]
        ];

        // 패턴별 조건
        switch ($pattern) {
            case 'best' : $arr_condition['EQ']['IsBest'] = 'Y'; break;
            case 'new' : $arr_condition['EQ']['IsNew'] = 'Y'; break;
            case 'willbes' : $arr_condition['LKB']['wPublName'] = '윌비스'; break;
        }

        // 정렬순서
        $search_order_column = str_first_pos_before(element('search_order', $arr_input), '-');
        $search_order_type = str_first_pos_after(element('search_order', $arr_input), '-');
        $arr_order_column = ['name' => 'ProdName', 'publdate' => 'wPublDate', 'price' => 'rwRealSalePrice'];
        $arr_order_type = ['asc', 'desc'];
        $arr_order_by = ['ProdCode' => 'desc'];

        if (array_key_exists($search_order_column, $arr_order_column) === true && in_array($search_order_type, $arr_order_type) === true) {
            $arr_order_by = [$arr_order_column[$search_order_column] => $search_order_type];
        }

        // 상품 조회
        $list = [];
        $count = $this->bookFModel->listBookStoreProduct(true, $arr_condition);

        $paging_url = '/' . ltrim($this->getFinalUriString(), APP_DEVICE . '/') . (empty($query_string) === false ? '?' . $query_string : '');
        $paging = $this->pagination($paging_url, $count, $this->_page_per_rows, $this->_show_page_num, true);

        if ($count > 0) {
            $list = $this->bookFModel->listBookStoreProduct(false, $arr_condition, $paging['limit'], $paging['offset'], $arr_order_by);
        }

        $this->load->view('site/book_store/index', [
            'arr_input' => $arr_input,
            'arr_base' => $arr_base,
            'learn_pattern' => $this->_learn_pattern,
            'pattern' => $pattern,
            'pattern_name' => $this->_pattern_name[$pattern],
            'query_string' => $query_string,
            'is_sort_mapping' => $is_sort_mapping,
            'is_npay' => $this->_is_npay,
            'paging' => $paging,
            'count' => $count,
            'data' => $list
        ]);
    }

    /**
     * 온라인서점 교재 상세
     * @param array $params
     * @return mixed
     */
    public function show($params = [])
    {
        // 모바일 환경에서 PC 페이지 접근할 경우 모바일 페이지로 리다이렉트
        if (APP_DEVICE == 'pc') {
            $this->load->library('user_agent');
            if ($this->agent->is_mobile() == true && $this->session->userdata('viewPC') != '1') {
                redirect(front_device_url('/' . $this->getFinalUriString(), 'm', false, true));
            }
        }

        $prod_code = element('prod-code', $params);
        if (empty($prod_code) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 상품조회
        $data = $this->bookFModel->findBookStoreProductByProdCode($prod_code);
        if (empty($data) === true) {
            show_alert('데이터 조회에 실패했습니다.', 'back');
        }

        // WBS 추가정보 조회
        $w_data = $this->bookFModel->findBmsBookByWBookIdx($data['wBookIdx']);

        // 데이터 병합
        $data = array_merge($data, $w_data);

        // 최근본책 쿠키 저장
        $this->_setCookieRecentBooks($prod_code, $data['wAttachImgPath'] . $data['wAttachImgSmName']);

        return $this->load->view('site/book_store/show', [
            'learn_pattern' => $this->_learn_pattern,
            'pattern' => element('pattern', $params, 'all'),
            'is_npay' => $this->_is_npay,
            'data' => $data
        ]);
    }

    /**
     * 온라인서점 랜딩페이지 (recruit : 저자모집)
     * @param array $params
     */
    public function landing($params = [])
    {
        $type = element('type', $params);
        if (empty($type) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $this->load->view('site/book_store/landing_' . $type);
    }

    /**
     * 온라인서점 최근본책 쿠키 저장
     * @param $prod_code
     * @param $thumb_img_url
     */
    private function _setCookieRecentBooks($prod_code, $thumb_img_url)
    {
        $ck_name = 'recent_vw_products';
        $ck_data = get_arr_var(json_decode(base64_decode(get_cookie($ck_name)), true), []);

        // 이전 데이터에 신규 데이터 쿠키 저장
        $ck_data[$prod_code] = $thumb_img_url;
        $ck_data = base64_encode(json_encode($ck_data));

        set_cookie($ck_name, $ck_data, 0);
    }
}
