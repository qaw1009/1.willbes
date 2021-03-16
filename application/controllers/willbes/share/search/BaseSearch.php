<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSearch extends \app\controllers\FrontController
{
    protected $models = array('search/searchF','product/lectureF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $_view_dir = '';

    private $_page_per_rows = 10;   // 페이지당 출력되는 상품수
    private $_show_page_num = 10;   // 페이지 수
    private $_learn_pattern = '';


    public function __construct($_view_file='site/search/result')
    {
        parent::__construct();
        $this->_view_dir = ($this->_site_code !== '2012' ? $_view_file : 'site/search/result_book');
    }

    public function index()
    {
        return;
    }

    /**
     * 검색 결과
     * @param array $params
     */
    public function result($params=[])
    {
        $arr_search_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_search_input = array_unset($arr_search_input,'page');
        
        if($this->_site_code === '2000') {  //www에서 검색시 등록된 사이트별 기준으로 검색결과 추출 -> 온라인사이트 : 온라인강좌, 학원사이트 : 학원강좌
            $site = $this->searchFModel->listSite(['EQ' => ['IsFrontUse'=>'Y', 'IsStatus'=>'Y', 'IsUse'=>'Y']]);
            foreach ($site as $row) {
                if($row['IsCampus'] === 'Y' ) {
                    $site_list['off'][] = $row['SiteCode'];
                } else {
                    $site_list['on'][] = $row['SiteCode'];
                }
            }
            $on_condition = ['IN' => ['SiteCode' => $site_list['on']]];
            $off_condition = ['IN' => ['SiteCode' => $site_list['off']]];

        } else {

            if(config_app('IsPassSite') === false) {    // 개별온라인사이트의 경우 해당 학원사이트 코드 추출 : 학원강좌 추출용
                $site_list = $this->searchFModel->listSite(['EQ' => ['IsFrontUse'=>'Y', 'IsStatus'=>'Y', 'IsUse'=>'Y', 'IsCampus' => 'Y', 'SiteGroupCode' => config_app('SiteGroupCode')]]);
                $on_condition = [
                    'EQ' => [
                        'SiteCode' => $this->_site_code
                    ]
                ];
                $off_condition = [
                    'EQ' => [
                        'SiteCode' => empty($site_list) ? null : $site_list[0]['SiteCode']
                    ]
                ];
            }
        }

        if(element('search_class',$arr_search_input) == '') {
            $type_condition = [
                'ORG1' =>[
                    'LKB' => [
                        'ProdName' => element('searchfull_text',$arr_search_input),
                        'Keyword' => element('searchfull_text',$arr_search_input),
                    ]
                ]
            ];
            if($this->_site_code==='2012') {
                $type_condition =  array_merge_recursive($type_condition,[
                        'ORG1' =>[
                            'LKB' => [
                                'wAuthorNames' => element('searchfull_text',$arr_search_input),
                                'wPublName' => element('searchfull_text',$arr_search_input)
                            ]
                        ]
                    ]
                );
            }
        } else {
            $type_condition = [
                'ORG1' =>[
                    'LKB' => [
                        element('search_class',$arr_search_input) => element('searchfull_text',$arr_search_input),
                    ]
                ]
            ];
        }

        $common_condition = array_merge_recursive($on_condition, $type_condition);
        $common_off_condition = array_merge_recursive($off_condition, $type_condition);

        $result = [];
        if(empty($arr_search_input) === false && empty(element('searchfull_text',$arr_search_input)) === false ) {

            if (element('search_target', $arr_search_input) == '') {

                $result = $this->_Search($arr_search_input, $common_condition, $common_off_condition);

            } elseif (element('search_target', $arr_search_input) == 'book') {      //교재검색일경우

                $this->_learn_pattern = 'book';
                $result = $this->_SearchBook($arr_search_input, $common_condition);

            }
        }

        $this->load->view($this->_view_dir,[
            'arr_search_input'=>$arr_search_input,
            'total_count' => element('total_cnt',$result,0),
            'data'=>$result,
            'learn_pattern' => $this->_learn_pattern,   //교재검색시 사용
            'query_string' => element('query_string',$result),    //교재검색시 사용
            'paging' => element('paging',$result),    //교재검색시 사용
            'count' => element('total_cnt',$result,0),  //교재검색시 사용
        ]);
    }

    /**
     * 일반검색 - 강의
     * @param array $arr_search_input
     * @param array $common_condition         온라인강의
     * @param array $common_off_condition   학원강의
     * @return array
     */
    private function _Search($arr_search_input = [], $common_condition = [], $common_off_condition = [])
    {
        $data = [];
        $data['on_lecture'] = [];
        $data['on_free_lecture'] = [];
        $data['adminpack_lecture_648001'] = [];
        $data['adminpack_lecture_648002'] = [];
        $data['off_lecture'] = [];
        $data['off_pack_lecture'] = [];

        $order_by = empty(element('searchfull_order',$arr_search_input)) ? ['ProdCode'=>'DESC'] : [element('searchfull_order',$arr_search_input)=>'DESC'];

        $order_by_pack = ['ProdCode'=>'DESC'];

        $limit = ($this->_site_code === '2000' ? '200' : null);

        //단강좌
        $data_lecture = $this->searchFModel->findSearchProduct('on_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $limit);
        //무료강좌
        $data_free_lecture = $this->searchFModel->findSearchProduct('on_free_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $limit);
        //추천패키지
        $data_adminpack_lecture_648001 = $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648001']]), $order_by_pack, $limit);
        //선택패키지
        $data_adminpack_lecture_648002 = $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648002']]), $order_by_pack, $limit);
        //학원단과
        $data_off_lecture = $this->searchFModel->findSearchProduct('off_lecture', false, array_merge_recursive($common_off_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $limit);
        //학원종합반
        $data_off_pack_lecture = $this->searchFModel->findSearchProduct('off_pack_lecture', false, $common_off_condition, $order_by_pack, $limit);

        $result_info = '단강좌:'.count($data_lecture).
            ', 무료강좌:' .count($data_free_lecture).
            ', 추천패키지:' .count($data_adminpack_lecture_648001).
            ', 선택패키지:' .count($data_adminpack_lecture_648002).
            ', 단과반:' .count($data_off_lecture).
            ', 종합반:' .count($data_off_pack_lecture)
        ; // 검색 항목이 추가될때마다 해당 내용 기재

        $total_cnt = count($data_lecture)
            + count($data_free_lecture)
            + count($data_adminpack_lecture_648001)
            + count($data_adminpack_lecture_648002)
            + count($data_off_lecture)
            + count($data_off_pack_lecture)
        ;

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

        if(!empty($data_off_lecture)) {
            foreach ($data_off_lecture as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $row['ProdBookData'] = json_decode($row['ProdBookData'], true);
                $data['off_lecture'][] = $row;
            }
        }

        if(!empty($data_off_pack_lecture)) {
            foreach ($data_off_pack_lecture as $idx => $row) {
                $row['ProdPriceData'] = json_decode($row['ProdPriceData'], true);
                $data['off_pack_lecture'][] = $row;
            }
        }

        $data['total_cnt'] = $total_cnt;

        $this->_SaveLog($arr_search_input,['total_cnt'=>$total_cnt, 'result_info'=>$result_info]);
        return $data;
    }

    /**
     * 교재전용검색
     * @param array $arr_search_input
     * @param array $common_condition
     * @return array
     */
    private function _SearchBook($arr_search_input=[], $common_condition=[])
    {
        $query_string = http_build_query($arr_search_input);

        $data = [];
        $list = [];

        $order_by = empty(element('searchfull_order',$arr_search_input)) ? ['ProdCode'=>'DESC'] : [element('searchfull_order',$arr_search_input)=>'DESC'];

        $count = $this->searchFModel->findSearchBookStoreProduct(true, $common_condition);

        $paging_url = '/' . ltrim($this->getFinalUriString(), APP_DEVICE . '/') . (empty($query_string) === false ? '?' . $query_string : '');
        $paging = $this->pagination($paging_url, $count, $this->_page_per_rows, $this->_show_page_num, true);

        if ($count > 0) {
            $list = $this->searchFModel->findSearchBookStoreProduct(false, $common_condition, $paging['limit'], $paging['offset'], $order_by);
        }

        $result_info = '교재검색:'.$count;
        $total_cnt = $count;

        $data['total_cnt'] = $count;
        $data['paging_url'] = $paging;
        $data['paging'] = $paging;
        $data['book'] = $list;

        $this->_SaveLog($arr_search_input,['total_cnt'=>$total_cnt, 'result_info'=>$result_info]);
        return $data;
    }

    /*
     * 검색로그 저장
     */
    private function _SaveLog($arr_search_input=[], $arr_etc=[])
    {
        $log_data = [
            'SiteCode' => $this->_site_code,
            'CateCode' => element('cate',$arr_search_input,0),
            'SearchWord' => element('searchfull_text',$arr_search_input),
            'ResultCount' => $arr_etc['total_cnt'],
            'ResultInfo' => $arr_etc['result_info'],
            'SearchType' => 'U',
            'SearchTarget' => empty(element('search_target',$arr_search_input)) ? 'lecture' : $arr_search_input['search_target'],
            'SearchClass' => empty(element('search_class',$arr_search_input)) ? null : $arr_search_input['search_class'],
            'EtcInfo' => empty(element('etc_info',$arr_search_input)) ? null : $arr_search_input['etc_info'],
        ];
        $this->searchFModel->saveSearchLog($log_data);
        return;
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