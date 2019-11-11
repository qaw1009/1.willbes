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
        $data = $this->organizationModel->listOrganization(false, [], null, null, ['ParentOrzCode' => 'ASC', 'ORZ.wOrderNum' => 'ASC']);

        // *** bootstrap-treeview에 맞는 JSON 생성 ***
        $itemsByReference = array();
        foreach($data as $key => &$item) {
            $itemsByReference[$item['wOrzCode']] = &$item;
            $itemsByReference[$item['wOrzCode']]['text'] = $item['wOrzName'];
            $itemsByReference[$item['wOrzCode']]['href'] = '';
            $itemsByReference[$item['wOrzCode']]['tags'] = '0';
        }
        foreach($data as $key => &$item)
            if($item['ParentOrzCode'] && isset($itemsByReference[$item['ParentOrzCode']]))
                $itemsByReference [$item['ParentOrzCode']]['nodes'][] = &$item;
        foreach($data as $key => &$item) {
            if($item['ParentOrzCode'] && isset($itemsByReference[$item['ParentOrzCode']]))
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
    public function getNewOrzCode($params = [])
    {
        $parent_orz_code = $params[0];
        if(empty($parent_orz_code) === true) {
            return $this->json_error('부모 코드가 없습니다.', _HTTP_NOT_FOUND);
        }
        $data = $this->organizationModel->getNewOrzCode($parent_orz_code);
        return $this->response([
            'new_orz_code' => $data['NewOrzCode'],
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
            ['field' => 'orz_name', 'label' => '조직명', 'rules' => 'trim|required'],
        ];

        if (empty($this->_reqP('orz_idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'orz_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->organizationModel->{$method . 'Organization'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

}