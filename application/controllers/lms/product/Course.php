<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 과정 관리 인덱스
     */
    public function index()
    {
        $this->load->view('product/course/index',[
            'data' => []
        ]);
    }

    /**
     * 과정 관리 등록/수정 폼
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
            $data = $this->publisherModel->findPublisherForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('product/course/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
        ]);
    }

    /**
     * 과정 관리 정렬변경
     */
    public function reorder()
    {

    }
}
