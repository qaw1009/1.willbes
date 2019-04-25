<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubTitles extends \app\controllers\BaseController
{
    protected $models = array('predict/predict');
    protected $helpers = array('download');

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("predict/subTitles/index", [
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y',
            ]
        ];

        $list = [];
        $count = $this->predictModel->listSubTitles(true, $arr_condition, $arr_condition);

        if ($count > 0) {
            $list = $this->predictModel->listSubTitles(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PstIdx' => 'asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $pst_idx = null;
        $arr_set_content = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $pst_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'a.PstIdx' => $pst_idx,
                    'a.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->predictModel->findSubTitlesForModify($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            if (empty($data['Content']) === false) {
                $temp_content = explode('|', $data['Content']);
                foreach ($temp_content as $key => $val) {
                    $arr_set_content[$key] = explode('^', $val);
                }
            }
        }

        $this->load->view("predict/subTitles/create", [
            'method' => $method,
            'data' => $data,
            'arr_content' => $arr_set_content,
            'pst_idx' => $pst_idx
        ]);
    }

    public function store()
    {
        $method = 'add';
        $idx = '';

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $rules = [
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'content_type', 'label' => '내용등록방식', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        //_addBoard, _modifyBoard
        $result = $this->predictModel->{$method . 'SubTitles'}($this->_reqP(null,false), $idx);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function storeDetail()
    {
        $rules = [
            ['field' => 'idx', 'label' => '자막관리식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'params_cnt', 'label' => '데이터수', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        //_addBoard, _modifyBoard
        $result = $this->predictModel->modifySubtitlesForDetail($this->_reqP(null,false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}