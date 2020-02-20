<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Register extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/regGoods', 'mocktestNew/regGrade');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);
        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $codes = $this->codeModel->getCcdInArray([$this->mockCommonModel->_groupCcd['applyType'], $this->mockCommonModel->_groupCcd['acceptStatus']]);

        $this->load->view('mocktestNew/off/register/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'applyType' => $codes[$this->mockCommonModel->_groupCcd['applyType']],
            'accept_ccd' => $codes[$this->mockCommonModel->_groupCcd['acceptStatus']],
        ]);
    }

    public function listAjax()
    {
        $accept_status_where = '';
        if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_expected']){
            $search_date1 = '(PD.SaleStartDatm > "';
            $search_date2 = date('Y-m-d H:i:s') . '")';
        } else if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_available']) {
            $search_date1 = '(PD.SaleStartDatm <= "';
            $search_date2 = date('Y-m-d H:i:s') . '" AND PD.SaleEndDatm > "' . date('Y-m-d H:i:s') . '")';
            $accept_status_where = '>';
        } else if($this->_reqP('search_AcceptStatus') == $this->mockCommonModel->_ccd['acceptStatus_end']) {
            $search_date1 = '(PD.SaleEndDatm <= "';
            $search_date2 = date('Y-m-d H:i:s') . '")';
            $accept_status_where = '<=';
        } else {
            $search_date1 = '';
            $search_date2 = '';
        }

        $arr_condition = [
            'EQ' => [
                'PD.IsStatus' => 'Y',
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'PC.CateCode' => $this->_reqP('search_cateD1'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                'PD.IsUse' => $this->_reqP('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->_reqP('search_cateD2'),
                'MP.TakeFormsCcd' => $this->_reqP('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdCode' => $this->_reqP('search_fi'),
                    'PD.ProdName' => $this->_reqP('search_fi'),
                    'A.wAdminName' => $this->_reqP('search_fi'),
                    'PD.SaleStartDatm' => $this->_reqP('search_fi'),
                    'PD.SaleEndDatm' => $this->_reqP('search_fi'),
                    'PS.RealSalePrice' => $this->_reqP('search_fi'),
                ]
            ],
            'RAW' => [
                $search_date1 => $search_date2
            ]
        ];

        if (empty($this->_reqP('grade_use')) === false) {
            if ($this->_reqP('grade_use') == 'Y') {
                $arr_condition['RAW'] = array_merge($arr_condition['RAW'], ['0 < ' => '(SELECT COUNT(*) FROM lms_mock_grades WHERE ProdCode = PD.ProdCode)']);
            } else {
                $arr_condition['RAW'] = array_merge($arr_condition['RAW'], ['0 = ' => '(SELECT COUNT(*) FROM lms_mock_grades WHERE ProdCode = PD.ProdCode)']);
            }

        }

        //응시형태(오프라인) + 접수진행중, 접수마감 조건
        if ($this->_reqP('search_TakeFormsCcd') == $this->mockCommonModel->_ccd['applyType_off'] && empty($accept_status_where) === false) {
            $arr_condition['ORG2']['RAW'] = [
                "select COUNT(mr4.MemIdx) FROM lms_mock_register mr4
                    OIN lms_order_product op4 ON mr4.OrderProdIdx = op4.OrderProdIdx
                    JOIN lms_order o4 ON op4.OrderIdx = o4.OrderIdx 
                    JOIN lms_sys_code sc4 ON mr4.TakeForm = sc4.Ccd
                    WHERE mr4.IsStatus = 'Y' AND mr4.ProdCode = MP.ProdCode AND mr4.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' AND op4.PayStatusCcd = '{$this->mockCommonModel->_ccd['paid_pay_status']}'
                )" => " {$accept_status_where}
                 ( select
                    COUNT(mr2.MemIdx) FROM lms_mock_register mr2
                    JOIN lms_order_product op2 ON mr2.OrderProdIdx = op2.OrderProdIdx
                    JOIN lms_order o2 ON op2.OrderIdx = o2.OrderIdx 
                    JOIN lms_sys_code sc2 ON mr2.TakeForm = sc2.Ccd
                    WHERE mr2.IsStatus = 'Y' AND mr2.IsTake = 'Y' AND mr2.ProdCode = MP.ProdCode AND mr2.TakeForm = '{$this->mockCommonModel->_ccd['applyType_off']}' AND op2.PayStatusCcd = '{$this->mockCommonModel->_ccd['paid_pay_status']}'
                "
            ];
        }

        $data = [];
        $count = $this->regGoodsModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $data = $this->regGoodsModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

            // 데이터 가공
            $mockKindCode = $this->mockCommonModel->_groupCcd['sysCode_kind'];    //직렬 운영코드값
            $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

            $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
            $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];

            foreach ($data as &$it) {
                $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
                $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
                $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

                if($it['SaleStartDatm'] > date('Y-m-d H:i:s')){
                    $dres = "접수예정";
                } else if($it['SaleStartDatm'] <= date('Y-m-d H:i:s') && $it['SaleEndDatm'] > date('Y-m-d H:i:s')) {
                    $dres = "접수중";
                } else if($it['SaleEndDatm'] <= date('Y-m-d H:i:s')) {
                    $dres = "접수마감";
                } else {
                    $dres = "접수기간 미설정";
                }
                $it['AcceptStatusCcd_Name'] = $dres;
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

    /**
     * 성적등록
     * @param array $params
     */
    public function createScore($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $prod_code = $params[0];
        $product_info = $this->regGradeModel->productInfo($prod_code);
        if (empty($product_info) === true) {
            show_error('조회된 상품이 없습니다.');
        }

        //기본정보 가공
        $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
        $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];
        $arr_mock_kind_code = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['sysCode_kind']);
        $arr_mock_part = explode(',', $product_info['MockPart']);
        foreach ($arr_mock_part as $key => $val) {
            $product_info['MockPartName'][] = $arr_mock_kind_code[$val];
        }
        $takeFormsCcds = explode(',', $product_info['TakeFormsCcd']);
        $product_info['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
        $product_info['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

        $this->load->view('mocktestNew/off/register/create_score', [
            'product_info' => $product_info,
            'prod_code' => $prod_code,
        ]);
    }

    public function memberPrivateDetailListAjax()
    {
        $arr_condition = [
            'EQ' => [
                'MR.IsStatus' => 'Y',
                'MR.ProdCode' => $this->_reqP('prod_code')
            ]
        ];

        $data = [];
        $count = $this->regGradeModel->questionAnswerList(true, $arr_condition);
        if ($count > 0) {
            $data = $this->regGradeModel->questionAnswerList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 엑셀 업로드
     */
    public function reDataExcel()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '모의고사코드', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) return;

        $params = $this->_getInvoiceExcelData();
        $result = $this->regGradeModel->gradeExcelDataUpload($this->_req('prod_code'), $params);
        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 엑셀변환
     */
    public function excel()
    {
        $headers = ['모의고사명 [코드]', '회원아이디', '회원명', '응시번호', '과목명', '과목코드', '문항번호', '답변', '정답여부'];
        $arr_condition = [
            'EQ' => [
                'MR.IsStatus' => 'Y',
                'MR.ProdCode' => $this->_reqP('prod_code')
            ]
        ];
        $list = $this->regGradeModel->questionAnswerList('excel', $arr_condition, $this->_reqP('length'), $this->_reqP('start'));

        // export excel
        $file_name = 'OFF응시자성적_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
        $download_query = $this->regGradeModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    /**
     * 샘플엑셀파일 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_qa_v2.xlsx';
        force_download($file_path, null);
    }

    /**
     * 엑셀데이터 파일 정보 추출
     * @return array|bool
     */
    private function _getInvoiceExcelData()
    {
        try {
            $this->load->library('excel');
            $data = $this->excel->readExcel($_FILES['attach_file']['tmp_name']);

        } catch (\Exception $e) {
            return false;
        }

        return $data;
    }
}