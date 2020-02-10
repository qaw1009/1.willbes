<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array('search/searchF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function result($params=[])
    {
        $arr_search_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $common_condition = [
                                'EQ' => [
                                    'SiteCode' => $this->_site_code,
                                ]
                                ,'LKR' => ['CateCode' => element('cate',$arr_search_input)]
                                ,'ORG1' =>[
                                        'LKB' => [
                                            'ProdName' => element('searchfull_text',$arr_search_input),
                                            'Keyword' => element('searchfull_text',$arr_search_input)
                                        ]
                                    ]
                                ]
        ;
        $order_by = ['ProdCode'=>'DESC'];

        $data = [];
        $result_query = '';   //초기 데이터 검증을 위해 쿼리 로그 저장 : 2020-02-06 -> 모니터링 후 이상 없으면 쿼리 로그 제거
        $result_info = '';
        $total_cnt = 0;

        if(empty($arr_search_input) === false && empty(element('searchfull_text',$arr_search_input)) === false ) {
            //단강좌
            $this->searchFModel->findSearchProduct('on_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $result_data, $exec_query);
            $data['on_lecture'] = $result_data;
            $result_query = (empty($result_query) === false ? $result_query . ';' . $exec_query : $exec_query);

            //무료강좌
            $this->searchFModel->findSearchProduct('on_free_lecture', false, array_merge_recursive($common_condition, ['ORG1' => ['LKB' => ['ProfNickName' => element('searchfull_text', $arr_search_input)]]]), $order_by, $result_data, $exec_query);
            $data['on_free_lecture'] = $result_data;
            $result_query = (empty($result_query) === false ? $result_query . ';' . $exec_query : $exec_query);

            //추천패키지
            $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648001']]), $order_by, $result_data, $exec_query);
            $data['adminpack_lecture_648001'] = $result_data;
            $result_query = (empty($result_query) === false ? $result_query . ';' . $exec_query : $exec_query);

            //선택패키지
            $this->searchFModel->findSearchProduct('adminpack_lecture', false, array_merge_recursive($common_condition, ['EQ' => ['PackTypeCcd' => '648002']]), $order_by, $result_data, $exec_query);
            $data['adminpack_lecture_648002'] = $result_data;
            $result_query = (empty($result_query) === false ? $result_query . ';' . $exec_query : $exec_query);

            /*
             *로그 저장
             */
            $result_info = '단강좌:'.count($data['on_lecture']).
                ', 무료강좌:' .count($data['on_free_lecture']).
                ', 추천패키지:' .count($data['adminpack_lecture_648001']).
                ', 선택패키지:' .count($data['adminpack_lecture_648002'])
            ; // 검색 항목이 추가될때마다 해당 내용 기재

            $total_cnt = count($data['on_lecture'])
                + count($data['on_free_lecture'])
                + count($data['adminpack_lecture_648001'])
                + count($data['adminpack_lecture_648002'])
            ;

            $log_data = [
                'SiteCode' => config_app('SiteCode'),
                'CateCode' => element('cate',$arr_search_input),
                'SearchWord' => element('searchfull_text',$arr_search_input),
                'ResultCount' => $total_cnt,
                'ResultInfo' => $result_info,
                'QueryInfo' => $result_query,
                'SearchType' => 'U'
            ];
            $this->searchFModel->saveSearchLog($log_data);
        }

        $this->load->view('site/search/result',[
            'arr_search_input'=>$arr_search_input,
            'total_count' => $total_cnt,
            'data'=>$data
        ]);
    }
}