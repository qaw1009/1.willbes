<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PgKey extends \app\controllers\BaseController
{
    protected $models = array('sys/pgKey', 'sys/code');
    protected $helpers = array();
    private $_pg_group_ccd = '603';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * PG키 관리 인덱스
     */
    public function index()
    {
        $list = $this->pgKeyModel->listPgKey([], null, null, ['PgDriver' => 'asc', 'PgKeyIdx' => 'asc']);

        // PG사 공통코드 조회
        $arr_pg_ccd = $this->codeModel->getCcd($this->_pg_group_ccd, 'CcdEtc');
        
        $this->load->view('sys/pg_key/index', [
            'data' => $list,
            'arr_pg_ccd' => $arr_pg_ccd
        ]);
    }

    /**
     * PG키 등록/수정 폼
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
            $data = $this->pgKeyModel->findPgKeyForModify($idx);

            if (empty($data) === true) {
                show_alert('데이터 조회에 실패했습니다.', 'back');
            }
        }

        // PG사 공통코드 조회
        $arr_pg_ccd = $this->codeModel->getCcd($this->_pg_group_ccd, 'CcdEtc');

        $this->load->view('sys/pg_key/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_pg_ccd' => $arr_pg_ccd
        ]);
    }

    /**
     * PG키 등록/수정
     * @return CI_Output|null
     */
    public function store()
    {
        $rules = [
            ['field' => 'pg_mname', 'label' => '상점명', 'rules' => 'trim|required'],
            ['field' => 'client_key', 'label' => '클라이언트키', 'rules' => 'trim|required'],
            ['field' => 'secret_key', 'label' => '시크릿키', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if ($this->_reqP('_method') == 'POST') {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'pg_driver', 'label' => 'PG드라이버', 'rules' => 'trim|required'],
                ['field' => 'pg_mid', 'label' => '상점아이디', 'rules' => 'trim|required'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->pgKeyModel->{$method . 'PgKey'}($this->_reqP(null, false));

        return $this->json_result($result, '저장 되었습니다.', $result);
    }
}