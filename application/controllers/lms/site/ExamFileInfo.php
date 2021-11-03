<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamFileInfo extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'site/examFileInfo');
    protected $helpers = array('download');

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_condition = [
            'EQ' => [
                'a.DataType' => '0'
                ,'a.IsStatus' => 'Y'
            ]
        ];
        $list = $this->examFileInfoModel->listGroupData($arr_condition);

        $this->load->view('site/exam_file_info/index',[
            /*'exam_area_ccd' => $codes*/
            'list' => $list
        ]);
    }

    public function storeIsUses()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->examFileInfoModel->modifyIsUse(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function create($params=[])
    {
        $method = 'POST';
        $data = null;
        $file_list = null;
        $idx = null;

        if(empty($params[0]) === false) {
            $method = "PUT";
            $idx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'a.ExamFileIdx' => $idx
                ],
            ];
            $data = $this->examFileInfoModel->findGroupData($arr_condition);
            if(empty($data)) {
                $this->json_result(true,'등록된 데이터가 존재하지 않습니다.'. true);
            }

            $arr_condition = [
                'EQ' => [
                    'DataType' => '1'
                    ,'GroupCode' => $data['GroupCode']
                    ,'IsStatus' => 'Y'
                ]
            ];
            $file_result = $this->examFileInfoModel->listFileinfo($arr_condition);
            if (empty($file_result) === false) {
                foreach ($file_result as $row) {
                    $file_list[$row['AreaCcd']][$row['FileType']]['ExamFileIdx'] = $row['ExamFileIdx'];
                    $file_list[$row['AreaCcd']][$row['FileType']]['FilePath'] = $row['FilePath'];
                    $file_list[$row['AreaCcd']][$row['FileType']]['FileName'] = $row['FileName'];
                    $file_list[$row['AreaCcd']][$row['FileType']]['FileRealName'] = $row['FileRealName'];
                    $file_list[$row['AreaCcd']][$row['FileType']]['IsUse'] = $row['IsUse'];
                }
            }
        }

        $codes = $this->codeModel->getCcd('734');
        unset($codes['734001']);    //전국제외

        $this->load->view('site/exam_file_info/create',[
            'method' => $method
            ,'exam_area_ccd' => $codes
            ,'data' => $data
            ,'file_list' => $file_list
            ,'idx' => $idx
        ]);
    }

    /**
     * 기본정보 등록
     * @return CI_Output|void
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['filed' => 'site_code', 'label' => '운영사이트',  'rules' => 'trim|required'],
            ['filed' => 'year_target', 'label' => '학년도',  'rules' => 'trim|required'],
            ['field' => 'data_type', 'label' => '데이터타입', 'rules' => 'trim|required|in_list[0]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('idx',false))===false) {
            $method = 'modify';
        }

        $result = $this->examFileInfoModel->{$method.'ExamFileInfo'}($this->_reqP(null));
        if($result['ret_cd'] === true) {
            return $this->json_result($result['ret_cd'], '', '', $result['ret_data']);
        } else {
            return $this->json_result($result['ret_cd'], '', $result);
        }
    }

    /**
     * 지역별 공고문 자료 등록
     */
    public function storeFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['filed' => 'group_code', 'label' => '기본정보코드',  'rules' => 'trim|required'],
            ['field' => 'data_type', 'label' => '데이터타입', 'rules' => 'trim|required|in_list[1]']
        ];
        if($this->validate($rules) === false) {
            return;
        }
        $result = $this->examFileInfoModel->storeExamFileData($this->_reqP(null));
        $this->json_result($result,'저장 되었습니다.',$result);
    }

    public function storeIsuse()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[UPDATE]'],
            ['filed' => 'exam_file_idx', 'label' => '식별자',  'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if($this->validate($rules) === false) {
            return;
        }
        $result = $this->examFileInfoModel->storeIsuse($this->_reqP(null));
        $this->json_result($result,'저장 되었습니다.',$result);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        public_download($file_path, $file_name);
    }
}