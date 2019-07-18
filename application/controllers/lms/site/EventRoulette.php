<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventRoulette extends \app\controllers\BaseController
{
    protected $models = array('site/roulette');
    protected $helpers = array('download');

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("site/event_roulette/index", []);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y',
                'a.RouletteCode' => $this->_reqP('search_roulette_code'),
                'a.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'a.Title' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->rouletteModel->listAllRoulette(true, $arr_condition);
        if ($count > 0) {
            $list = $this->rouletteModel->listAllRoulette(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.RouletteCode' => 'desc']);
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
        $roulette_code = null;
        $modify_type = '';

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $roulette_code = $params[0];
            $arr_condition = [
                'EQ'=>[
                    'a.RouletteCode' => $roulette_code,
                    'a.IsStatus' => 'Y'
                ]
            ];

            $data = $this->rouletteModel->findRouletteForModify($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
            $data['roulette_list_otherinfo'] = $this->rouletteModel->listRouletteOtherInfo($roulette_code);

            unset($arr_condition['EQ']['a.IsStatus']);
            if (empty($this->rouletteModel->listWinMember(true, $arr_condition, $roulette_code)) === false) {
                $modify_type = 'disabled="disabled"';
            }
        }

        $this->load->view("site/event_roulette/create", [
            'method' => $method,
            'code_modify_type' => (ENVIRONMENT === 'production') ? false : true,
            'data' => $data,
            'roulette_code' => $roulette_code,
            'modify_type' => $modify_type
        ]);
    }

    public function memberListModal($params = [])
    {
        if (empty($params) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $roulette_code = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'a.RouletteCode' => $roulette_code,
                'a.IsStatus' => 'Y'
            ]
        ]);

        $arr_base['roulette_data'] = $this->rouletteModel->findRouletteForModify($arr_condition);
        if (empty($arr_base['roulette_data']) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }
        $arr_base['roulette_other_data'] = $this->rouletteModel->listRouletteOtherInfo($roulette_code);

        $this->load->view("site/event_roulette/member_list_modal", [
            'roulette_code' => $roulette_code,
            'arr_base' => $arr_base,
        ]);
    }

    public function memberListModalAjax($params = [])
    {
        $list = [];
        $count = 0;

        if (empty($params[0]) === false) {
            $arr_condition = [
                'EQ' => [
                    'a.RouletteCode' => $params[0],
                    'a.IsUse' => $this->_reqP('search_is_use'),
                    'b.RroIdx' => $this->_reqP('search_rro_idx'),
                ],
                'ORG' => [
                    'LKB' => [
                        'm.MemId' => $this->_reqP('search_value'),
                        'm.MemName' => $this->_reqP('search_value'),
                        'm.Phone3' => $this->_reqP('search_value'),
                    ]
                ]
            ];

            if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
                $arr_condition = array_merge($arr_condition, [
                    'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                ]);
            }

            $count = $this->rouletteModel->listWinMember(true, $arr_condition, $params[0]);
            if ($count > 0) {
                $list = $this->rouletteModel->listWinMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.RmIdx' => 'DESC']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function storeIsUse()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->rouletteModel->storeIsUse(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function storeIsUseAll($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if (empty($params) === true) {
            $rules = array_merge($rules, [
                ['field' => 'params', 'label' => '룰렛식별자', 'rules' => 'trim|required']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->rouletteModel->storeIsUseAll($params[0]);
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    public function store()
    {
        $rules = [
            ['field' => 'roulette_title', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'new_member_join_type', 'label' => '신규회원가입대상 사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'new_member_join_start_date', 'label' => '신규회원가입 기간설정', 'rules' => 'callback_validateRequiredIf[new_member_join_type,Y]'],
            ['field' => 'new_member_join_end_date', 'label' => '신규회원가입 기간설정', 'rules' => 'callback_validateRequiredIf[new_member_join_type,Y]'],
            ['field' => 'roulette_start_datm', 'label' => '기간설정', 'rules' => 'trim|required'],
            ['field' => 'roulette_end_datm', 'label' => '기간설정', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('roulette_code')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'count_type', 'label' => '당첨 카운트 기준일', 'rules' => 'trim|required|in_list[D,T]'],
                ['field' => 'member_limit_count', 'label' => '아이디 기준 참여 횟수', 'rules' => 'trim|required'],
                ['field' => 'max_limit_count', 'label' => '전체 참여 횟수', 'rules' => 'trim|required'],
                ['field' => 'probability_type', 'label' => '확률타입', 'rules' => 'trim|required|in_list[1,2]'],
                ['field' => 'roulette_prod_name[]', 'label' => '룰렛상품명', 'rules' => 'trim|required'],
                ['field' => 'roulette_prod_qty[]', 'label' => '룰렛상품수량', 'rules' => 'trim|required'],
                ['field' => 'roulette_prod_win_turns[]', 'label' => '룰렛상품당첨순번', 'rules' => 'trim|required'],
                ['field' => 'roulette_prod_probability[]', 'label' => '룰렛상품확률', 'rules' => 'trim|required'],
                ['field' => 'roulette_order_num[]', 'label' => '룰렛상품정렬순서', 'rules' => 'trim|required']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'roulette_code', 'label' => '식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $code_modify_type = (ENVIRONMENT === 'production') ? false : true;
        $result = $this->rouletteModel->{$method . 'Roulette'}($this->_reqP(null, false), $code_modify_type);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 룰렛 부가정보 상태수정
     * @param array $params
     */
    public function updateOtherInfoIsUse($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'IsUse', 'label' => '사용유무', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $rro_idx = $params[0];
        $result = $this->rouletteModel->updateOtherInfoIsUse($rro_idx, $this->_reqP('IsUse'));
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    public function listMemberAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y',
                'a.RouletteCode' => $this->_reqP('search_roulette_code'),
                'a.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'a.Title' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->rouletteModel->listAllRoulette(true, $arr_condition);
        if ($count > 0) {
            $list = $this->rouletteModel->listAllRoulette(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.RouletteCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 당첨자 엑셀 다운로드
     * @param array $params
     */
    public function memberListExcel($params = [])
    {
        $file_name = '룰렛_당첨자_리스트_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $headers = ['상품명', '당첨일', '이름', '아이디', '연락처', '이메일', '가입일'];

        $arr_condition = [
            'EQ' => [
                'a.RouletteCode' => $params[0],
                'a.IsUse' => $this->_reqP('search_is_use'),
                'b.RroIdx' => $this->_reqP('search_rro_idx'),
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemId' => $this->_reqP('search_value'),
                    'm.MemName' => $this->_reqP('search_value'),
                    'm.Phone3' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = $this->rouletteModel->listWinMember('excel', $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.RmIdx' => 'DESC']);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->rouletteModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}