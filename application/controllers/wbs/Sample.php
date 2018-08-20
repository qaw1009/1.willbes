<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends \app\controllers\BaseController
{
    protected $models = array('sample');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 샘플 Datatable Ajax 인덱스
     */
    public function index()
    {
        // 암복호화
        /*$this->load->library('encrypt');
        $enc = $this->encrypt->encode('6578');
        $dec = $this->encrypt->decode($enc);
        dd($enc . ' => ' . strlen($enc) . ' => ' . $dec);*/
        
        // 메일발송
        /*$this->load->library('email');
        $this->email->to('bsshin@willbes.com');
        $this->email->subject('운영자 본인 인증용 인증번호 발송');

        $body = $this->load->view('emails/auth_number', [
            'auth_number' => 'test123'
        ], true);

        $this->email->message($body);
        $this->email->send();*/

        $this->load->view('sample/index');
    }

     /**
     * 샘플 Datatable Ajax 데이터 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'BDT' => ['regi_date' => [$this->input->post('search_start_date'), $this->input->post('search_end_date')]],
            'LKB' => [$this->input->post('search_keyword') => $this->input->post('search_value')]
        ];

        $list = [];
        $count = $this->sampleModel->listSample(true, $arr_condition);

        if ($count > 0) {
            $list = $this->sampleModel->listSample(false, $arr_condition, $this->input->post('length'), $this->input->post('start'), ['idx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ], 200);
    }

    /**
     * 샘플 Datatable All
     */
    public function list()
    {
        $arr_condition = [];

        // makeWhere
        //$list = $this->sampleModel->listSampleByMakeWhere($arr_condition);

        // bindQuery
        $list = $this->sampleModel->listSampleByPDO();

        $this->load->view('sample/list', [
            'data' => $list
        ]);
    }

    /**
     * 샘플 Paging Table
     * @param array $params
     */
    public function paging($params = [])
    {
        $this->output->enable_profiler(true);
        $arr_condition = [];

        $total_rows = $this->sampleModel->listSample(true, $arr_condition);

        $paging = $this->pagination('/sample/paging/', $total_rows, 1, 5, false);
        if ($total_rows > 0) {
            $paging['data'] = $this->sampleModel->listSample(false, $arr_condition, $paging['limit'], $paging['offset'], ['idx' => 'desc']);
        }

        $this->load->view('sample/paging', [
            'paging' => $paging
        ]);
    }

    /**
     * 샘플 등록 Form
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
            $data = $this->sampleModel->findSampleByIdx($idx, 'name, title, content');

            if (count($data) < 1) {
                show_error('샘플 데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('sample/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data
        ]);
    }

    /**
     * 샘플 등록 Form Layer 팝업
     * @param array $params
     */
    public function createModal($params = [])
    {
        $this->load->view('sample/create_modal');
    }

    /**
     * 샘플 데이터 저장
     */
    public function store()
    {
        $rules = [
            ['field' => 'name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->sampleModel->addSample($this->input->post(null, false));

        $this->json_result($result, '등록 되었습니다.', $result);
    }

    /**
     * 샘플 데이터 수정
     */
    public function update()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => '키', 'rules' => 'trim|required|integer'],
            ['field' => 'name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->sampleModel->modifySample($this->input->post(null, false));

        $this->json_result($result, '수정 되었습니다.', $result);
    }

    /**
     * 샘플 데이터 삭제
     */
    public function destroy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'idx', 'label' => '키', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->sampleModel->removeSample($this->input->post('idx'));

        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}