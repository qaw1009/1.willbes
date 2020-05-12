<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'predict/predict2');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $def_site_code = '2001';
        $arr_base['cateD1'] = $this->_getCategoryArray();
        $arr_base['cateD2'] = $this->_getTakeMockPart(false);

        $this->load->view('predict2/reg/goods/index', [
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
        ]);
    }

    public function listAjax()
    {
        $data = [];
        $arr_condition = [
            'EQ' => [
                'PP.IsStatus' => 'Y',
                'PP.SiteCode' => $this->_reqP('search_site_code'),
                'PP.TakePart' => $this->_reqP('search_cateD1'),
                'PP.IsUse' => $this->_reqP('search_use'),
            ],
            'LKB' => [
                'PP.MockPart' => $this->_reqP('search_cateD2'),
            ],
            'ORG' => [
                'LKB' => [
                    'PP.PredictIdx2' => $this->_reqP('search_fi'),
                    'PP.Predict2Name' => $this->_reqP('search_fi')
                ]
            ],
        ];

        $count = $this->predict2Model->goodsMainList(true, $arr_condition);
        if ($count > 0) {
            $data = $this->predict2Model->goodsMainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

            // 데이터 가공
            $mockKindCode = $this->predict2Model->_groupCcd['sysCode_kind'];    //직렬 운영코드값
            $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

            foreach ($data as &$it) {
                $mockPart = explode(',', $it['MockPart']);
                foreach ($mockPart as $mp) {
                    if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
                }
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    public function create($params = [])
    {
        $arr_base['cateD1'] = $this->_getCategoryArray();
        $arr_base['cateD2'] = $this->_getTakeMockPart(false);

        $data = $sData = $PredictIdx2 = null;

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            $PredictIdx2 = $params[0];

            $arr_condition = ([
                'EQ'=>[
                    'MP.PredictIdx2' => $PredictIdx2,
                ]
            ]);
            $data = $this->predict2Model->findGoods($arr_condition);
            $sData = $this->predict2Model->listGoodsForSubject($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('predict2/reg/goods/create', [
            'method' => $method,
            'arr_base' => $arr_base,
            'PredictIdx2' => $PredictIdx2,
            'data' => $data,
            'sData' => $sData,
        ]);
    }

    public function store()
    {
        $Info = @json_decode($this->_reqP('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        } else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'predict2_name', 'label' => '서비스명', 'rules' => 'trim|required'],

            ['field' => 'Research1StartDatm_d', 'label' => 'Research1일', 'rules' => 'trim|required'],
            ['field' => 'Research1StartDatm_h', 'label' => 'Research1(시)', 'rules' => 'trim|required|numeric'],
            ['field' => 'Research1StartDatm_m', 'label' => 'Research1(분)', 'rules' => 'trim|required|numeric'],
            ['field' => 'Research1EndDatm_d', 'label' => 'Research1일', 'rules' => 'trim|required'],
            ['field' => 'Research1EndDatm_h', 'label' => 'Research1(시)', 'rules' => 'trim|required|numeric'],
            ['field' => 'Research1EndDatm_m', 'label' => 'Research1(분)', 'rules' => 'trim|required|numeric'],

            ['field' => 'Research2StartDatm_d', 'label' => 'Research2일', 'rules' => 'trim'],
            ['field' => 'Research2StartDatm_h', 'label' => 'Research2(시)', 'rules' => 'trim|numeric'],
            ['field' => 'Research2StartDatm_m', 'label' => 'Research2(분)', 'rules' => 'trim|numeric'],
            ['field' => 'Research2EndDatm_d', 'label' => 'Research2일', 'rules' => 'trim'],
            ['field' => 'Research2EndDatm_h', 'label' => 'Research2(시)', 'rules' => 'trim|numeric'],
            ['field' => 'Research2EndDatm_m', 'label' => 'Research2(분)', 'rules' => 'trim|numeric'],

            ['field' => 'PpIdx[]', 'label' => '과목선택', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MockType[]', 'label' => '과목선택', 'rules' => 'trim|required|in_list[E,S]'],
            ['field' => 'OrderNum[]', 'label' => '과목정렬', 'rules' => 'trim|required|is_natural_no_zero'],

            ['field' => 'grade_open_is_use', 'label' => '성적오픈일여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'GradeOpenDatm_d', 'label' => '성적조회오픈일', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'GradeOpenDatm_h', 'label' => '성적조회오픈일(시)', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'GradeOpenDatm_m', 'label' => '성적조회오픈일(분)', 'rules' => 'callback_validateRequiredIf[grade_open_is_use,Y]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],

            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero']
        ];

        if ($this->validate($rules) === false) return;

        if ($this->_reqP('_method') == 'POST') {
            $method = 'add';
            $rules = [
                ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'cate_code', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'mock_part[]', 'label' => '직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ];
        } else {
            $method = 'modify';
            $rules = [
                ['field' => 'predict_idx2', 'label' => '서비스상품코드', 'rules' => 'trim|required|is_natural_no_zero']
            ];
        }
        if ($this->validate($rules) === false) return;

        $validate_result = $this->_validateForStore($this->_reqP(null));
        if ($validate_result !== true) {
            $this->json_error($validate_result);
            return;
        }

        $result = $this->predict2Model->{$method . 'Goods'}($this->_reqP(null, false));
        /*$result = true;*/
        $this->json_result($result, '저장되었습니다.', $result);
    }



    /**
     * 모의고사 데이터 검수
     * @param $form_data
     * @return bool|string
     */
    private function _validateForStore($form_data)
    {
        try {
            // 날짜체크
            $Research1StartDatm = element('Research1StartDatm_d', $form_data) .' '. element('Research1StartDatm_h', $form_data) .':'. element('Research1StartDatm_m', $form_data) .':00';
            $Research1EndDatm = element('Research1EndDatm_d', $form_data) .' '. element('Research1EndDatm_h', $form_data) .':'. element('Research1EndDatm_m', $form_data) .':59';
            $Research2StartDatm = element('Research2StartDatm_d', $form_data) .' '. element('Research2StartDatm_h', $form_data) .':'. element('Research2StartDatm_m', $form_data) .':00';
            $Research2EndDatm = element('Research2EndDatm_d', $form_data) .' '. element('Research2EndDatm_h', $form_data) .':'. element('Research2EndDatm_m', $form_data) .':59';

            if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('Research1StartDatm_d', $form_data)) ) {
                throw new \Exception('Research1 시작시간이 잘못되었습니다.');
            }
            if( !preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('Research1EndDatm_d', $form_data)) ) {
                throw new \Exception('Research1 종료시간이 잘못되었습니다.');
            }
            if( (strtotime($Research1EndDatm) - strtotime($Research1StartDatm)) <= 0 ) {
                throw new \Exception('Research1 종료일이 Research1 시작일보다 빠릅니다.');
            }

            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('Research2StartDatm_d', $form_data)) || empty(element('Research2StartDatm_h', $form_data)) || empty(element('Research2StartDatm_m', $form_data))) {
                throw new \Exception('Research2 시작시간이 잘못되었습니다.');
            }
            if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', element('Research2EndDatm_d', $form_data)) || empty(element('Research2EndDatm_h', $form_data)) || empty(element('Research2EndDatm_m', $form_data))) {
                throw new \Exception('Research2 종료시간이 잘못되었습니다.');
            }
            if( (strtotime($Research2EndDatm) - strtotime($Research2StartDatm)) <= 0 ) {
                throw new \Exception('Research2 종료일이 Research2 시작일보다 빠릅니다.');
            }

            // 정렬번호 체크
            $orderE = $orderS = [];
            foreach (element('MockType', $form_data) as $k => $v) {
                if($v == 'E') $orderE[] = element('OrderNum', $form_data)[$k];
                else if($v == 'S') $orderS[] = element('OrderNum', $form_data)[$k];
            }

            if( count($orderE) == 0 ) {     //필수과목만 적용 (선택과목 없을 수 있음)
                throw new \Exception('과목을 선택해 주세요.');
            }

            if( count($orderE) != count(array_unique($orderE)) || count($orderE) != count(array_unique($orderE)) ) {
                throw new \Exception('과목 정렬번호가 중복되어 있습니다.');
            }
            if( count(element('PpIdx', $form_data)) != count(array_unique(element('PpIdx', $form_data))) ) {
                throw new \Exception('선택한 과목이 중복되어 있습니다.');
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 카테고리 조회
     * @param string $site_code
     * @return array
     */
    private function _getCategoryArray($site_code = '')
    {
        return $this->categoryModel->getCategoryArray($site_code, '', '', 1);
    }

    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    private function _getTakeMockPart($isUseChk = true)
    {
        return $this->predict2Model->getTakeMockPart($isUseChk);
    }
}