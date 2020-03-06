<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'hooks/LogQueryHook.php';

class Events extends \app\controllers\BaseController
{
    protected $models = array('event/eventA');
    protected $helpers = array();

    private $_content_type = 'application/json';
    private $_allow_ip = [];    //TODO

    private $_arr_result_msg = [
        '0000' => ['성공', 200],
        '0001' => ['수강인증 되었습니다.', 200],
        '1001' => ['필수 파리미터가 누락 되었습니다.',400],
        '1002' => ['수강인증 정보가 없습니다.', 400],
        '1003' => ['수강기간이 아닙니다.', 400],
        '9999' => ['시스템 오류입니다.', 500]
    ];

    public function __construct()
    {
        parent::__construct();

        // 접근 아이피 체크
//        $is_allow = $this->_checkAllowIp();
//        if ($is_allow !== true) {
//            exit($is_allow);
//        }
        $this->load->library('format');
    }

    public function __destruct()
    {
        $query_log = new \LogQueryHook();
        $query_log->logQueries();
    }

    /**
     * 도매꾹 쇼핑몰 <-> 엔잡 상품주문 주문여부 검증
     * @example https://api.local.willbes.net/event/events/certDomeggookNjob?code=1813850
     * @return CI_Output|null
     */
    public function certDomeggookNjob()
    {
        try {
            $cert_code = $this->_req('code');

            // 이벤트 상품코드
            if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development') {
                $arr_prod_code = ['158360', '158975', '158751'];  //로컬, 데브
            } else {
                $arr_prod_code = ['162745', '162746', '162747', '162748', '162787'];  // 스테이지, 실서버
            }

            if (empty($cert_code) === true) {
                throw new \Exception(null, '1001');
            }

            $arr_condition = [
                'EQ' => ['OP.PayStatusCcd' => '676001']     //결제 완료
            ];

            $data = $this->eventAModel->findOrderByCertCode($arr_prod_code, $cert_code, $arr_condition);
            if(empty($data) === false) {
                $now = date('Y-m-d');
                if($data['LecStartDate'] > $now || $data['RealLecEndDate'] < $now) {
                    throw new \Exception(null, '1003');
                }
            } else {
                throw new \Exception(null, '1002');
            }

            return $this->_message('0001'); //인증 성공

        } catch (\Exception $e) {
            return $this->_message((string) $e->getCode());
        }

    }

    /**
     * json response
     * @param string $code
     * @return CI_Output
     */

    private function _message($code)
    {
        return $this->_response([
            'result_code' => $code,
            'result_msg' => $this->_arr_result_msg[$code][0]
        ], $this->_arr_result_msg[$code][1]);
    }

    /**
     * json response
     * @param array $data
     * @param int $http_code
     * @return CI_Output
     */
    private function _response($data, $http_code = _HTTP_OK)
    {
        $output = $this->format->to_json($data);
        return $this->output
            ->set_content_type($this->_content_type)
            ->set_status_header($http_code)
            ->set_output($output);
    }

    /**
     * 접근 아이피 체크
     * @return bool|string
     */
    private function _checkAllowIp()
    {
        if (ENVIRONMENT != 'local') {
            $access_ip = $this->input->ip_address();

            $is_allow = starts_with($access_ip, $this->_allow_ip);
            if ($is_allow !== true) {
                return 'NOT_ALLOW_IP';
            }
        }
        return true;
    }

}
