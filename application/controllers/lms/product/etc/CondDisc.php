<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CondDisc extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'product/etc/condDisc');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 조건할인율 관리 인덱스
     */
    public function index()
    {
        $this->load->view('product/etc/cond_disc/index');
    }

    /**
     * 조건할인율 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CD.SiteCode' => $this->_reqP('search_site_code'),
                'CD.IsUse' => $this->_reqP('search_is_use')
            ],
            'IN' => [
                'CD.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ],
            'ORG1' => [
                'LKB' => [
                    'CD.DiscIdx' => $this->_reqP('search_value'),
                    'CD.DiscTitle' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->condDiscModel->listCondDisc(true, $arr_condition);

        if ($count > 0) {
            $list = $this->condDiscModel->listCondDisc(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CD.DiscIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 조건할인율 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->condDiscModel->findCondDiscByDiscIdx($idx, true);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 할인강좌 연결상품 조회
            $data['DiscProd'] = $this->condDiscModel->findDiscProductByDiscIdx($data['DiscIdx']);

            // 신청강좌 연결상품 조회
            $data['CondProd'] = $this->condDiscModel->findCondProductByDiscIdx($data['DiscIdx']);
        }

        // 온라인/학원 상품검색 학습형태공통코드 (운영자패키지, 종합반)
        $arr_search_learn_pattern_ccd = ['on' => '615003', 'off' => '615007'];

        $this->load->view('product/etc/cond_disc/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_search_learn_pattern_ccd' => $arr_search_learn_pattern_ccd
        ]);
    }

    /**
     * 조건할인율 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'disc_title', 'label' => '할인제목', 'rules' => 'trim|required'],
            ['field' => 'prod_code_disc[]', 'label' => '할인강좌선택', 'rules' => 'trim|required'],
            ['field' => 'prod_code_cond[]', 'label' => '신청강좌선택', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '할인식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->condDiscModel->{$method . 'CondDisc'}($this->_reqP(null, false));

        return $this->json_result($result, '저장 되었습니다.', $result);
    }
}
