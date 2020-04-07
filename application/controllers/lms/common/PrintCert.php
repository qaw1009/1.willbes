<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintCert extends \app\controllers\BaseController
{
    protected $models = array('pay/orderList', 'mocktest/applyUser');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강증 출력 (상품구분 : off_lecture (학원) / off_sub_lecture (학원서브강좌) / mock_exam (모의고사))
     * @return object|string
     */
    public function index()
    {
        $prod_type = $this->_reqG('prod_type');
        $view_page = $prod_type;
        $data = [];

        switch ($prod_type) {
            case 'off_lecture' :
                $order_idx = $this->_reqG('order_idx');
                $order_prod_idx = $this->_reqG('order_prod_idx');
                $site_code = $this->_reqG('site_code');

                // 데이터 조회
                $data = $this->orderListModel->getPrintCertData($order_idx, $order_prod_idx, $site_code);

                // 수강증 출력 로그 저장
                $log_save = $this->orderListModel->addActivityLog('PrintCert', $order_idx, $order_prod_idx);
                if($log_save !== true) {
                    show_alert($log_save,'close');
                    break;
                }
                break;
            case 'off_sub_lecture' :
                $order_idx = $this->_reqG('order_idx');
                $order_prod_idx = $this->_reqG('order_prod_idx');
                $prod_code_sub = $this->_reqG('prod_code_sub');
                $site_code = $this->_reqG('site_code');
                $view_page = 'off_lecture';

                // 데이터 조회
                $data = $this->orderListModel->getPrintCertSubLectureData($order_idx, $order_prod_idx, $prod_code_sub, $site_code);

                // 수강증 출력 로그 저장
                $log_save = $this->orderListModel->addActivityLog('SubLecCert', $order_idx, $order_prod_idx, $prod_code_sub);
                if($log_save !== true) {
                    show_alert($log_save,'close');
                    break;
                }
                break;
            case 'reading_room' :
                $order_idx = $this->_reqG('order_idx');
                $order_prod_idx = $this->_reqG('order_prod_idx');
                $site_code = $this->_reqG('site_code');

                // 데이터 조회
                $data = $this->orderListModel->getPrintCertReadingRoomData($order_idx, $order_prod_idx, $site_code);

                // 수강증 출력 로그 저장
                $log_save = $this->orderListModel->addActivityLog('PrintCert', $order_idx, $order_prod_idx);
                if($log_save !== true) {
                    show_alert($log_save,'close');
                    break;
                }
                break;
            case 'mock_exam' :
                $mr_idx = $this->_reqG('mr_idx');

                // 데이터 조회
                $arr_condition = ['EQ' => ['MR.MrIdx' => $mr_idx]];
                $data = $this->applyUserModel->mockRegistList($arr_condition,'','','Y');

                // 출력 로그 저장
                $log_save = $this->applyUserModel->ticketPrint($mr_idx);
                if($log_save !== true) {
                    show_alert($log_save,'close');
                    break;
                }
                break;
            default :
                show_alert('필수 파라미터 오류입니다.', 'close');
                break;
        }

        // 데이터 없음
        if (is_array($data) === false) {
            show_alert($data, 'close');
        }

        return $this->load->view('common/print_cert/' . $view_page, [
            'data' => $data
        ]);
    }

    /**
     * 수강증 출력 로그 보기
     * @return CI_Output
     */
    protected function showPrintCertLog()
    {
        $act_type = $this->_reqG('act_type');   // 수강증 출력구분 (PrintCert, SubLecCert)
        $order_idx = $this->_reqG('order_idx');
        $order_prod_idx = $this->_reqG('order_prod_idx');
        $prod_code_sub = $this->_reqG('prod_code_sub');

        if (empty($act_type) === true || empty($order_idx) === true || empty($order_prod_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        if ($act_type == 'SubLecCert' && empty($prod_code_sub) === true) {
            return $this->json_error('필수 파라미터 오류입니다.[2]', _HTTP_BAD_REQUEST);
        }

        $data = $this->orderListModel->getActivityLogList($act_type, $order_idx, $order_prod_idx, $prod_code_sub);

        return $this->response($data);
    }    
}
