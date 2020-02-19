<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMember extends \app\controllers\BaseController
{
    protected $models = array('common/searchMember');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원 검색
     * @param array $params
     */
    public function index($params = [])
    {
        // 1번째 원소 리턴
        $view_postfix = array_shift($params);

        // 배열 원소를 2개씩 나누어 1번째는 키, 2번째는 값으로 구성된 파라미터 배열 생성
        $arr_param = array_pluck(array_chunk($params, 2), '1', '0');

        // 회원선택 후 반영되어야 할 target form
        $target_form_id = get_var($this->_reqG('target_form_id'), 'regi_form');

        $this->load->view('common/search_member_' . $view_postfix, [
            'arr_param' => $arr_param,
            'target_form_id' => $target_form_id
        ]);
    }

    /**
     * 회원 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $count = 0;
        $list = [];

        // 검색어가 있는 경우에만 조회
        if (empty($this->_reqP('search_value')) === false) {
            $arr_condition = [
                'EQ' => [
                    'M.IsStatus' => 'Y'
                ],
                'ORG' => [
                    'LKB' => [
                        'M.MemName' => $this->_reqP('search_value'),
                        'M.MemId' => $this->_reqP('search_value')
                    ],
                    'EQ' => [
                        'Phone3' => $this->_reqP('search_value'),
                        'PhoneEnc' => $this->searchMemberModel->getEncString($this->_reqP('search_value'))
                    ]
                ]
            ];

            $count = $this->searchMemberModel->listSearchMember(true, $arr_condition);

            if ($count > 0) {
                $list = $this->searchMemberModel->listSearchMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['M.MemIdx' => 'desc']);
            }            
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 텍스트 파일의 아이디 목록으로 회원 조회
     * @return mixed
     */
    public function inFile()
    {
        $rules = [['field' => 'search_mem_file', 'label' => '일괄등록파일', 'rules' => 'callback_validateFileRequired[search_mem_file]']];
        if ($this->validate($rules) === false) {
            return null;
        }

        // 첨부파일 읽기
        if (($file_content = file_get_contents($_FILES['search_mem_file']['tmp_name'], false)) === false) {
            return $this->json_error('업로드 파일 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // UTF-8 BOM 삭제
        $file_content = remove_utf8_bom($file_content);

        // 회원 아이디 배열
        $arr_mem_id = preg_split('/\n|\r\n?/', trim($file_content));
        if (is_array($arr_mem_id) === false || empty($arr_mem_id) === true) {
            return $this->json_error('업로드 파일 오류입니다.[2]', _HTTP_BAD_REQUEST);
        }

        // 회원 검색
        $arr_condition = [
            'IN' => ['M.MemId' => $arr_mem_id],
            'EQ' => ['M.IsStatus' => 'Y']
        ];
        $list = $this->searchMemberModel->listSearchMember('M.MemIdx, M.MemId, M.MemName', $arr_condition);

        return $this->json_result(true, '', null, $list);
    }
}
