<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorHotClip extends \app\controllers\BaseController
{
    protected $models = array('site/etc/professorHotClip');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("site/etc/professor_hot_clip/index", []);
    }

    public function listAjax()
    {
        $list = $this->professorHotClipModel->list();
        return $this->response([
            'recordsTotal' => count($list),
            'recordsFiltered' => count($list),
            'data' => $list
        ]);
    }

    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $list_thumbnail = null;
        $idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'hc.PhcIdx' => $idx,
                    'hc.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->professorHotClipModel->findProfessorHotClip($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
            $list_thumbnail = $this->professorHotClipModel->listProfessorHotClipThumbnail($idx);
        }

        $this->load->view("site/etc/professor_hot_clip/create", [
            'method' => $method,
            'data' => $data,
            'list_thumbnail' => $list_thumbnail,
            'idx' => $idx
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'cate_code', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'prof_subject_idx[]', 'label' => '과목/교수', 'rules' => 'trim|required'],
            ['field' => 'prof_btn_isUse', 'label' => '교수홈버튼 노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'curriculum_btn_is_use', 'label' => '커리큘럼버튼 노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'studycomment_btn_is_use', 'label' => '수강후기버튼 노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'link_type[]', 'label' => '배너BOX정보', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'professor_bg_image', 'label' => '교수배경이미지', 'rules' => 'callback_validateFileRequired[professor_bg_image]'],
            ]);
        } else {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->{$method . 'ProfessorHotClip'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 정렬순서 적용
     */
    public function storeOrderNum()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->modifyOrderNum(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function delete($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if (empty($params[0]) === true) {
            $_POST['del_phc_idx'] = null;
            $rules = array_merge($rules, [
                ['field' => 'del_phc_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->deleteProfessorHotClip($params[0]);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    public function deleteThumbnail($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if (empty($params[0]) === true) {
            $_POST['del_thumbnail_idx'] = null;
            $rules = array_merge($rules, [
                ['field' => 'del_thumbnail_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->deleteProfessorHotClipThumbnail($params[0]);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}