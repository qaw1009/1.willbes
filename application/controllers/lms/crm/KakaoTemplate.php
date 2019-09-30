<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KakaoTemplate extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/kakaoTemplate');
    protected $helpers = array();

    // 등록,수정,삭제 허용 권한
    private $_allow_role_idx = [
        '1030'  //시스템 관리자
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 알림톡템플릿관리 인덱스 (리스트페이지)
     * @return mixed
     */
    public function index()
    {
        $this->load->view("crm/kakaoTemplate/index", [
            'is_allow_modify' => $this->checkAllowRoleIdx()
        ]);
    }

    /**
     * 알림톡템플릿관리 목록 조회
     * @return mixed
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'KT.IsStatus' => 'Y',
                'KT.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'KT.TmplCd' => $this->_reqP('search_value'),
                    'KT.TmplName' => $this->_reqP('search_value'),
                    'KT.Msg' => $this->_reqP('search_value')
                ]
            ]
        ];
        $list = [];
        $count = $this->kakaoTemplateModel->listKakaoTemplate(true, $arr_condition, null, null, []);
        if ($count > 0) {
            $list = $this->kakaoTemplateModel->listKakaoTemplate(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['KT.CktIdx' => 'DESC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'is_allow_modify' => $this->checkAllowRoleIdx()
        ]);
    }

    /**
     * 알림톡템플릿관리 등록/수정 폼
     * @param array
     * @return mixed
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = $idx = null;

        if (empty($params[0]) === false) {
            $idx  = $params[0];
            $method = 'PUT';

            $data = $this->kakaoTemplateModel->findKakaoTemplate($idx);
            if (empty($data) === true) show_error('데이터 조회에 실패했습니다.');

            if(empty($data['IsApproval']) === false && $data['IsApproval'] == 'Y'){
                show_alert('승인된 템플릿은 수정이 불가능합니다.', 'back');
            }
        }

        if($this->checkAllowRoleIdx() === 'N'){
            show_alert('허용된 관리자만 템플릿 등록/수정이 가능합니다.', 'back');
        }

        $this->load->view("crm/kakaoTemplate/create", [
            'data' => $data,
            'idx' => $idx,
            'method' => $method
        ]);
    }

    /**
     * 알림톡템플릿관리 글 등록
     * @return mixed
     */
    public function store()
    {
        $method = 'add';
        $idx = null;
        $rules = [
            ['field' => 'send_kind', 'label' => '메세지성격', 'rules' => 'trim|required'],
            ['field' => 'tmpl_cd', 'label' => '템플릿코드', 'rules' => 'trim|required|max_length[30]'],
            ['field' => 'tmpl_name', 'label' => '템플릿명', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'msg', 'label' => '템플릿내용', 'rules' => 'trim|required|max_length[1000]'],
            ['field' => 'image_url', 'label' => '이미지 URL', 'rules' => 'trim|max_length[100]'],
            ['field' => 'image_link', 'label' => '링크 URL', 'rules' => 'trim|max_length[100]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'is_approval', 'label' => '승인여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];
        if ($this->validate($rules) === false) return;

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }
        $input_data = $this->_setInputData($this->_reqP(null, false));
        $result = $this->kakaoTemplateModel->{$method.'KakaoTemplate'}($input_data, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 알림톡템플릿관리 상세 페이지
     * @param array
     * @return mixed
     */
    public function read($params = [])
    {
        $idx = $params[0];
        if (empty($idx) === true) show_error('잘못된 접근 입니다.');

        $data = $this->kakaoTemplateModel->findKakaoTemplate($idx);
        if (empty($data) === true) show_error('데이터 조회에 실패했습니다.');

        return $this->load->view('crm/kakaoTemplate/read', [
            'idx' => $idx,
            'data' => $data,
            'is_allow_modify' => $this->checkAllowRoleIdx()
        ]);
    }

    /**
     * 화면 파라미터 설정
     * @param $input
     * @return array
     */
    private function _setInputData($input){

        //챗버블 JSON 변환
        $chat_bubble_button1 = null; $chat_bubble_button2 = null; $chat_bubble_button3 = null; $chat_bubble_button4 = null; $chat_bubble_button5 = null;
        $chat_bubble_button_type = element('chat_bubble_button_type', $input);

        if(empty($chat_bubble_button_type) === false){
            foreach($chat_bubble_button_type as $i => $val) {
                $arr_bubble_temp = [];
                $arr_bubble_temp['type'] = $val;
                $arr_bubble_temp['name'] = element('chat_bubble_button_name', $input)[$i];

                switch ($val) {
                    case 'WL':
                        $arr_bubble_temp['url_mobile'] = element('chat_bubble_button_link1', $input)[$i];
                        $arr_bubble_temp['url_pc'] = element('chat_bubble_button_link2', $input)[$i];
                        break;
                    case 'AL':
                        $arr_bubble_temp['scheme_ios'] = element('chat_bubble_button_link1', $input)[$i];
                        $arr_bubble_temp['scheme_android'] = element('chat_bubble_button_link2', $input)[$i];
                        break;
                    default: break;
                }
                ${'chat_bubble_button'.($i+1)} = json_encode($arr_bubble_temp);
            }
        }

        return [
            'TmplCd' => element('tmpl_cd', $input),
            'TmplName' => element('tmpl_name', $input),
            'Msg' => element('msg', $input),
            'SendKind' => element('send_kind', $input),
            'ChatBubbleButton1' => $chat_bubble_button1,
            'ChatBubbleButton2' => $chat_bubble_button2,
            'ChatBubbleButton3' => $chat_bubble_button3,
            'ChatBubbleButton4' => $chat_bubble_button4,
            'ChatBubbleButton5' => $chat_bubble_button5,
            'ImageUrl' => element('image_url', $input),
            'ImageLink' => element('image_link', $input),
            'IsApproval' => element('is_approval', $input),
            'IsUse' => element('is_use', $input)
        ];
    }

    /**
     * 등록,수정,삭제 허용 권한 체크
     * @return mixed
     */
    public function checkAllowRoleIdx()
    {
        $curr_role_idx = $_SESSION['admin_auth_data']['Role']['RoleIdx'];
        if(empty($curr_role_idx) === false){
            foreach($this->_allow_role_idx as $key => $val) {
                if($curr_role_idx == $val) return 'Y';
            }
        }
        return 'N';
    }
}