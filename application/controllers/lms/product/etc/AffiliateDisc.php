<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AffiliateDisc extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'product/etc/affiliateDisc');
    protected $helpers = array();
    private $_group_ccd = array();

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->affiliateDiscModel->_group_ccd;
    }

    /**
     * 제휴할인율 인덱스
     */
    public function index()
    {
        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(array_values($this->_group_ccd));

        $this->load->view('product/etc/affiliate_disc/index', [
            'def_site_code' => element('0', array_keys($arr_site_code)),
            'arr_site_code' => $arr_site_code,
            'arr_aff_type_ccd' => $codes[$this->_group_ccd['AffType']],
            'arr_apply_type_ccd' => $codes[$this->_group_ccd['ApplyType']]
        ]);
    }

    /**
     * 제휴할인율 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->affiliateDiscModel->listAffiliateDisc(true, $arr_condition);

        if ($count > 0) {
            $list = $this->affiliateDiscModel->listAffiliateDisc(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['ADC.AffIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴할인율 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'EQ' => [
                'ADC.SiteCode' => $this->_reqP('search_site_code'),
                'ADC.AffTypeCcd' => $this->_reqP('search_aff_type_ccd'),
                'ADC.IsUse' => $this->_reqP('search_is_use')
            ],
            'IN' => [
                'ADC.SiteCode' => get_auth_on_off_site_codes('Y')  // 학원사이트 권한 추가
            ],
            'LKB' => [
                'ADC.ApplyTypeCcds' => $this->_reqP('search_apply_type_ccd')
            ],
            'ORG1' => [
                'LKB' => [
                    'ADC.AffIdx' => $this->_reqP('search_value'),
                    'ADC.AffName' => $this->_reqP('search_value')
                ]
            ]
        ];
    }

    /**
     * 제휴할인율 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        // 학원사이트 코드 조회
        $arr_site_code = get_auth_on_off_site_codes('Y', true);

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->affiliateDiscModel->findAffiliateDiscByAffIdx($idx, true);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $data['ApplyTypeCcds'] = explode(',', $data['ApplyTypeCcds']);  // 적용구분
        }

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(array_values($this->_group_ccd));

        $this->load->view('product/etc/affiliate_disc/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_site_code' => $arr_site_code,
            'arr_aff_type_ccd' => $codes[$this->_group_ccd['AffType']],
            'arr_apply_type_ccd' => $codes[$this->_group_ccd['ApplyType']]
        ]);
    }

    /**
     * 제휴할인율 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'aff_type_ccd', 'label' => '제휴구분', 'rules' => 'trim|required'],
            ['field' => 'aff_name', 'label' => '제휴업체명', 'rules' => 'trim|required'],
            ['field' => 'apply_type_ccd[]', 'label' => '적용구분', 'rules' => 'trim|required'],
            ['field' => 'disc_rate', 'label' => '할인율', 'rules' => 'trim|required|integer|greater_than[0]' . ($this->_reqP('disc_type') == 'R' ? '|less_than[100]' : '')],
            ['field' => 'disc_type', 'label' => '할인구분', 'rules' => 'trim|required|in_list[R,P]'],
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
            return;
        }

        $result = $this->affiliateDiscModel->{$method . 'AffiliateDisc'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
