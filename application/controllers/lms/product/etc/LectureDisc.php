<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureDisc extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'product/base/course', 'product/etc/lectureDisc');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 강좌할인율 관리 인덱스
     */
    public function index()
    {
        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        $this->load->view('product/etc/lecture_disc/index', [
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_course' => $this->courseModel->getCourseArray()
        ]);
    }

    /**
     * 강좌할인율 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'PDC.SiteCode' => $this->_reqP('search_site_code'),
                'PDC.CateCode' => $this->_reqP('search_md_cate_code'),
                'PDC.CourseIdx' => $this->_reqP('search_course_idx'),
                'PDC.IsUse' => $this->_reqP('search_is_use')
            ],
            'IN' => [
                'PDC.SiteCode' => get_auth_site_codes()  // 사이트 권한 추가
            ],
            'LKR' => [
                'PDC.CateCode' => $this->_reqP('search_lg_cate_code')
            ],
            'ORG1' => [
                'LKB' => [
                    'PDC.DiscIdx' => $this->_reqP('search_value'),
                    'PDC.DiscTitle' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->lectureDiscModel->listLectureDisc(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureDiscModel->listLectureDisc(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PDC.DiscIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강좌할인율 등록/수정 폼
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
            $data = $this->lectureDiscModel->findLectureDiscByDiscIdx($idx, true);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
            
            // 할인율 상세정보 조회
            $data['DiscInfo'] = $this->lectureDiscModel->findLectureDiscInfo(['EQ' => ['DiscIdx' => $data['DiscIdx']]]);
        }

        // 과정 조회
        $arr_course = $this->courseModel->getCourseArray();

        $this->load->view('product/etc/lecture_disc/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_course' => $arr_course
        ]);
    }

    /**
     * 강좌할인율 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'course_idx', 'label' => '과정식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'disc_title', 'label' => '할인제목', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
                ['field' => 'cate_code', 'label' => '카테고리', 'rules' => 'trim|required|integer']
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

        $result = $this->lectureDiscModel->{$method . 'LectureDisc'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}
