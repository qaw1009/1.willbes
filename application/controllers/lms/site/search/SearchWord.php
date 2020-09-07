<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWord extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'site/search');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $arr_category = $this->categoryModel->getCategoryArray('','','',1);
        $arr_m_category = $this->categoryModel->getCategoryArray('','','',2);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $this->load->view('site/search/word_index',[
            'arr_category' => $arr_category,
            'arr_m_category' => $arr_m_category,
            'arr_input' => $arr_input,
            'arr_site_code' =>$arr_site_code
        ]);
    }

    public function listAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $arr_condition = $this->_common_condition($arr_input);

        $order_by = ['A.SwIdx' => 'DESC'];

        $count = $this->searchModel->listWord(true, $arr_condition, null, null,$order_by);

        if($count > 0) {
            $list = $this->searchModel->listWord(false, $arr_condition, element('length',$arr_input), element('start',$arr_input), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    private function _common_condition($arr_input)
    {
        $search_cate = empty(element('search_md_category', $arr_input)) ?  element('search_category', $arr_input) : element('search_md_category', $arr_input) ;
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => element('search_site_code', $arr_input),
                'A.CateCode' => $search_cate,
                'A.IsUse' => element('search_is_use', $arr_input),
            ]
        ];

        if(!empty(element('search_value', $arr_input))) {
            $arr_condition = array_merge($arr_condition, [
                'ORG' => [
                    'LKB' => [
                        'A.SearchWord' => $arr_input['search_value'],
                    ]
                ]
            ]);
        }
        return $arr_condition;
    }

    public function create($params=[])
    {
        $method = 'POST';
        $SwIdx = null;
        $data = null;

        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $arr_category = $this->categoryModel->getCategoryRouteArray();

        if(empty($params[0]) === false) {
            $method = 'PUT';
            $SwIdx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'A.SwIdx' => $SwIdx
                ],
            ];
            $data = $this->searchModel->listWord(false, $arr_condition);
            if(empty($data) === false) {
                $data = $data[0];
            }
        }

        $this->load->view('site/search/word_create_modal',[
            'method' => $method,
            'arr_category' => $arr_category,
            'SwIdx' => $SwIdx,
            'data' => $data,
            'arr_site_code' =>$arr_site_code
        ]);
    }

    public function store()
    {
         $method = 'add';
         $rules = [
            ['filed' => 'SearchWord', 'label' => '검색어설정',  'rules' => 'trim|required'],
            ['filed' => 'StartDate', 'label' => '적용시작일',  'rules' => 'trim|required'],
            ['filed' => 'EndDate', 'label' => '적용시작일',  'rules' => 'trim|required'],
            ['field' => 'OrderNum', 'label' => '순번', 'rules' => 'trim|required|integer'],
         ];

        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('SwIdx',false))===false) {
            $method = 'modify';
        }
        $result = $this->searchModel->{$method.'Word'}($this->_reqP(null));
        //$this->saveCache($this->_reqP('SiteCode',false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '상태값', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->searchModel->modifyByColumn(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->searchModel->modifyByOrder(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function saveCache($site_code = '')
    {
        $site_code = (is_array($site_code) ? $site_code[0] :  $site_code);

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = true;
        $this->_saveSearchWordCache($result, $site_code);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 검색어 캐쉬 저장
     * @param $is_success
     */
    private function _saveSearchWordCache($is_success, $skey = '', $type = '')
    {
        if ($is_success === true) {

            $this->load->driver('caching');

            if($type === '' || $type === 'Setup') {
                //설정 검색어 캐쉬 저장
                $this->caching->search_word_setup->save($skey);
            }
            if($type === '' || $type === 'Auto') {
                //자동 완성 캐쉬 저장
                $this->caching->search_word_auto->saveToAdapter('file', $skey);
            }
        }
    }

    /**
     * 검색어 캐쉬 제거
     * @param string $site_code
     */
    public function deleteCache($site_code = '')
    {
        $site_code = (is_array($site_code) ? $site_code[0] :  $site_code);

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $this->load->driver('caching');
        $this->caching->search_word_setup->delete($site_code);
        $this->caching->search_word_auto->delete($site_code);

        $result = true;
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 캐쉬 확인용
     * @param string $site_code
     */
    public function getCache($site_code = '')
    {
        $site_code = (is_array($site_code) ? (empty($site_code) ? '' :$site_code[0]) :  $site_code);
        $this->load->driver('caching');
        //$this->caching->search_word_setup->delete();return;
        //$this->caching->mobile_menu->deleteToAdapter('memcached', '');return;
        $setup = $this->caching->search_word_setup->get($site_code,false);
        $auto = $this->caching->search_word_auto->getToAdapter('file',$site_code);
        dd(['설정검색어'=>$setup, '자동완성'=>$auto]);
    }

    /**
     * 자동완성 단어 예외 처리
     * @param array $params
     */
    public function createExcept($params=[])
    {
        $method = 'POST';
        $SwaeIdx = null;
        $data = null;

        $arr_site_code = get_auth_on_off_site_codes('N', true);

        if(empty($params[0]) === false) {
            $method = 'PUT';
            $SwaeIdx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'A.SwaeIdx' => $SwaeIdx
                ],
            ];
            $data = $this->searchModel->listWordExcept(false, $arr_condition);
            if(empty($data) === false) {
                $data = $data[0];
            }
        }

        $this->load->view('site/search/word_create_except_modal',[
            'method' => $method,
            'SwaeIdx' => $SwaeIdx,
            'data' => $data,
            'arr_site_code' => $arr_site_code
        ]);
    }

    /**
     *자동완성 예외단어 목록
     * @return CI_Output
     */
    public function listExceptAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $arr_condition = [
            'EQ' => [
                //'A.SiteCode' => element('search_site_code', $arr_input),
            ]
        ];

        $order_by = ['A.SwaeIdx' => 'DESC'];

        $count = $this->searchModel->listWordExcept(true, $arr_condition, null, null,$order_by);

        if($count > 0) {
            $list = $this->searchModel->listWordExcept(false, $arr_condition, element('length',$arr_input), element('start',$arr_input), $order_by);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 자동완성 예외단어 등록
     */
    public function storeExcept()
    {
        $method = 'add';
        $rules = [
            ['filed' => 'SiteCode', 'label' => '사이트설정',  'rules' => 'trim|required'],
            ['filed' => 'ExceptWord', 'label' => '예외단어',  'rules' => 'trim|required'],
            ['field' => 'ExceptType', 'label' => '사용유무', 'rules' => 'trim|required|in_list[E,L]']
        ];


        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->searchModel->addWordExcept($this->_reqP(null));

        $this->load->driver('caching');
        //$this->_saveSearchWordCache(true, $this->_reqP('SiteCode'), $type = '');
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 자동완성 예외단어 삭제
     */
    public function deleteExcept()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'SwaeIdx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->searchModel->deleteWordExcept($this->_reqP(null));
        //$this->saveCache($this->_reqP('SiteCode',false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}