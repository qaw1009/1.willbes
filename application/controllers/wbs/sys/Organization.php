<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends \app\controllers\BaseController
{
    protected $models = array('sys/organization');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 조직관리 인덱스
     */
    public function index()
    {
        $this->load->view('sys/organization/index', []);
    }

    /**
     * 조직관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $data = $this->organizationModel->listOrganization(false, [], null, null, ['ParentOrgCode' => 'ASC', 'ORZ.wOrderNum' => 'ASC']);

        // *** bootstrap-treeview에 맞는 JSON 생성 ***
        $itemsByReference = array();
        foreach($data as $key => &$item) {
            $itemsByReference[$item['wOrgCode']] = &$item;
            $itemsByReference[$item['wOrgCode']]['text'] = $item['wOrgName'];
            $itemsByReference[$item['wOrgCode']]['href'] = '';
            $itemsByReference[$item['wOrgCode']]['tags'] = '0';
        }
        foreach($data as $key => &$item)
            if($item['ParentOrgCode'] && isset($itemsByReference[$item['ParentOrgCode']]))
                $itemsByReference [$item['ParentOrgCode']]['nodes'][] = &$item;
        foreach($data as $key => &$item) {
            if($item['ParentOrgCode'] && isset($itemsByReference[$item['ParentOrgCode']]))
                unset($data[$key]);
        }
        $list = json_encode($data);

        return $this->response([
            'data' => $list
        ]);
    }

    /**
     * 신규 조직코드 조회
     * @param $params
     * @return CI_Output
     */
    public function getNewOrgCode($params = [])
    {
        $parent_org_code = $params[0];
        if(empty($parent_org_code) === true) {
            return $this->json_error('부모 코드가 없습니다.', _HTTP_NOT_FOUND);
        }
        $data = $this->organizationModel->getNewOrgCode($parent_org_code);
        return $this->response([
            'new_org_code' => $data['NewOrgCode'],
            'new_order_num' => $data['NewOrderNum']
        ]);
    }

    /**
     * 조직 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'org_name', 'label' => '조직명', 'rules' => 'trim|required'],
        ];

        if (empty($this->_reqP('org_idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'org_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->organizationModel->{$method . 'Organization'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

}