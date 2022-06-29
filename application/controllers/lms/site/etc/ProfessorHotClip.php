<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorHotClip extends \app\controllers\BaseController
{
    protected $models = array('site/etc/professorHotClip', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 핫클립 부모 리스트
     */
    public function index()
    {
        $this->load->view("site/etc/professor_hot_clip/index", []);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.IsStatus' => 'Y',
                'a.ViewType' => $this->_reqP('search_view_type')
            ]
        ];

        $list = $this->professorHotClipModel->list($arr_condition);
        return $this->response([
            'recordsTotal' => count($list),
            'recordsFiltered' => count($list),
            'data' => $list
        ]);
    }

    public function group()
    {
        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y'
            ]
        ];
        $list = $this->professorHotClipModel->listGroup($arr_condition);
        $this->load->view("site/etc/professor_hot_clip/group_index", [
            'list' => $list
        ]);
    }

    /**
     * 그룹 등록/수정
     * @param array $params
     */
    public function groupCreate($params = [])
    {
        $method = 'POST';
        $data = null;
        $idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'a.PhcgIdx' => $idx,
                    'a.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->professorHotClipModel->findProfessorHotClipGroup($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("site/etc/professor_hot_clip/group_create", [
            'method' => $method,
            'data' => $data,
            'idx' => $idx
        ]);
    }

    public function groupStore()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '그룹명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'promotion_code', 'label' => '프로모션코드', 'rules' => 'callback_validateRequiredIf[view_type,2]']
        ];

        $method = 'add';
        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->{$method . 'ProfessorHotClipGroup'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function storeGroupOrderNum()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->modifyGroupOrderNum(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function groupDelete($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->deleteProfessorHotClipGroup($params[0]);
        $this->json_result($result, '삭제 되었습니다.', $result);
    }

    /**
     * 핫클립 리스트
     */
    public function detail($params = [])
    {
        $arr_base['view_type'] = $params[0];
        $arr_base['promotion_code'] = element(1, $params, '');

        $this->load->view("site/etc/professor_hot_clip/detail", [
            'arr_base' => $arr_base
        ]);
    }

    public function detailAjax()
    {
        $arr_condition = [
            'EQ' => [
                'hc.SiteCode' => $this->_reqP('search_site_code'),
                'hc.IsStatus' => 'Y',
                'hcg.ViewType' => $this->_reqP('search_view_type'),
                'hcg.PromotionCode' => $this->_reqP('search_promotion_code')
            ]
        ];

        $list = $this->professorHotClipModel->detail($arr_condition);
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
        $list_product = null;
        $idx = null;
        $prod_item_ccd = $this->codeModel->getCcd('747');
        $arr_base['view_type'] = $this->_reqG('view_type');
        $arr_base['promotion_code'] = $this->_reqG('promotion_code');

        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y',
                'a.ViewType' => $arr_base['view_type'],
                'a.PromotionCode' => $arr_base['promotion_code'],
            ]
        ];
        $group_list = $this->professorHotClipModel->listGroup($arr_condition);

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
            $list_product = $this->professorHotClipModel->listProfessorHotClipProduct($idx);
        }

        $this->load->view("site/etc/professor_hot_clip/create", [
            'method' => $method,
            'arr_base' => $arr_base,
            'prod_item_ccd' => $prod_item_ccd,
            'group_list' => $group_list,
            'data' => $data,
            'list_thumbnail' => $list_thumbnail,
            'list_product' => $list_product,
            'idx' => $idx
        ]);
    }

    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'hotclip_group_idx', 'label' => '그룹식별자', 'rules' => 'trim|required'],
            ['field' => 'cate_code', 'label' => '카테고리', 'rules' => 'trim|required'],
            ['field' => 'prof_subject_idx[]', 'label' => '과목/교수', 'rules' => 'trim|required'],
            ['field' => 'temp_view_type', 'label' => '메인,이벤트 유형', 'rules' => 'trim|required|in_list[1,2]'],

            ['field' => 'prof_btn_isUse', 'label' => '교수홈버튼 노출여부', 'rules' => 'trim|required'],
            ['field' => 'curriculum_btn_is_use', 'label' => '커리큘럼버튼 노출여부', 'rules' => 'trim|required'],
            ['field' => 'studycomment_btn_is_use', 'label' => '수강후기버튼 노출여부', 'rules' => 'trim|required'],

            ['field' => 'prod_code[]', 'label' => '상품코드', 'rules' => 'callback_validateRequiredIf[temp_view_type,2]'],
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

    public function deleteProduct()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'pp_idx', 'label' => '강좌식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->professorHotClipModel->deleteProfessorHotClipProduct($this->_reqP('pp_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}