<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthGiveApplyModel extends WB_Model
{
    protected $_table = [
        'auth' => 'lms_auth_give',
        'auth_product' => 'lms_auth_give_r_product',
        'apply' => 'lms_auth_apply',
        'apply_product' => 'lms_auth_apply_product',
        'product' => 'lms_product',
        'lecture' => 'lms_product_lecture',
        'course' => 'lms_product_course',
        'subject' => 'lms_product_subject',
        'professor' => 'vw_product_r_professor_concat_repr',
        'member' => 'lms_member',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public $_pay_route_ccd = ['zero' => '670003', 'admin_pay' => '670007'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 신청목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param null $add_column
     * @return mixed
     */
    public function listAuthApply($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $add_column = null)
    {

        if ($is_count) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';

        } else {

            if(empty($add_column)) {
                $column = 'Straight_JOIN
                             A.AaIdx, A.AgIdx, A.MemIdx, A.Affiliation, A.`Position`, A.EtcContent1, A.EtcContent2, fn_dec(A.PhoneEnc) as Phone
                            ,A.AttachFileName, A.AttachFileReal, A.AttachFilePath
                            ,A.ApplyStatusCcd, A.OrderIdx, A.RegDatm, A.ApprovalDatm, A.CancelDatm
                            ,C.ProdCode
                            ,D.ProdName
                            ,G.SubjectName
                            ,F.CourseName
                            ,H.wProfName_String
                            ,J.MemId, J.MemName
                            ,K.wAdminName as ApprovalAdminName
                            ,L.wAdminName as CancelAdminName
                            ,M.CcdName as ApplyStatus_Name
            ';
            } else {
                $column = 'Straight_JOIN ' . $add_column;
            }

            $order_by = empty($order_by) ? ['A.AaIdx' => 'DESC', 'C.AapIdx' => 'ASC'] : [];
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        '. $this->_table['apply'] .' A
                        join '. $this->_table['auth'] .' B on A.AgIdx = B.AgIdx and B.IsStatus = \'Y\'
                        join '. $this->_table['apply_product'] .' C on A.AaIdx = C.AaIdx and C.IsStatus = \'Y\'
                        join '. $this->_table['product'] .' D on C.ProdCode = D.ProdCode and D.IsStatus = \'Y\'
                        join '. $this->_table['lecture'] .' E on D.ProdCode = E.ProdCode
                        left outer join '. $this->_table['course'] .' F on E.CourseIdx = F.CourseIdx and F.IsStatus = \'Y\'
                        left outer join '. $this->_table['subject'] .' G on E.SubjectIdx = G.SubjectIdx and G.IsStatus = \'Y\'
                        join '. $this->_table['professor'] .' H on D.ProdCode = H.ProdCode
                        join '. $this->_table['member'] .' J on A.MemIdx = J.MemIdx
                        left outer join '. $this->_table['admin'] .' K on A.ApprovalAdminIdx = K.wAdminIdx
                        left outer join '. $this->_table['admin'] .' L on A.CancelAdminIdx = L.wAdminIdx
                        left outer join '. $this->_table['code'] .' M on A.ApplyStatusCcd = M.Ccd and M.IsStatus = \'Y\'
                    where
                        A.IsStatus=\'Y\'
        ';

        $arr_condition = array_merge_recursive($arr_condition, [
            'IN' => [
                'B.SiteCode' => get_auth_site_codes()
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 신청 내역 처리 '승인/취소'
     * @param array $input
     * @return array|bool
     */
    public function changeAuthApply($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $process_type = element('process_type', $input);    //개별 , 다중 처리 구분
            $app_status = element('app_status', $input);

            $check_idx = element('check_idx', $input);

            //신청 및 세팅정보 추출
            $data = $this->findAuthApply(['EQ' => ['A.AaIdx' => $check_idx]]);

            if(empty($data)) {
                throw new \Exception('신청 정보가 존재하지 않습니다.');
            }
            if($data['ApplyStatusCcd'] === $app_status) {
                throw new \Exception('이미 처리된 신청정보입니다.');
            }

            switch ($app_status) {
                case '741002' :   //승인
                    $set_data = ['ApprovalAdminIdx', 'ApprovalDatm'];
                    break;
                case '741003':  //승인전취소
                case '741004':  //승인후취소
                    $set_data = ['CancelAdminIdx', 'CancelDatm'];
                    break;
            }

            $this->_conn->set($set_data[0], $this->session->userdata('admin_idx'))->set($set_data[1], 'now()', false)
                ->set('ApplyStatusCcd', $app_status)->where('AaIdx', $check_idx);

            if($this->_conn->update($this->_table['apply']) === false) {
                throw new \Exception('신청 정보 수정에 실패했습니다.');
            }

            $this->load->loadModels(['_lms/pay/order']);    //주문모델

            if($app_status === '741002') {   //승인일 경우 : 신청 강좌정보 결제처리

                $admin_reason_ccd = '705011';   // 강좌인증자동지급
                $admin_etc_reason = '강좌인증식별자=>'.$check_idx;

                //신청강좌 추출
                $apply_prod_data = $this->listAuthApply(false, ['EQ' => ['A.AaIdx' => $check_idx]], null, null, null, ' C.ProdCode, D.ProdTypeCcd, E.LearnPatternCcd');
                $apply_prod_code = [];
                foreach ($apply_prod_data as $row) {
                    $apply_prod_code[] = $row['ProdCode'].':'.$row['ProdTypeCcd'].':'.$row['LearnPatternCcd'];
                }

                /*  주문 처리 */
                $order_input = [
                    'site_code' => $data['SiteCode'],
                    'mem_idx' => array($data['MemIdx']),
                    'prod_code' => $apply_prod_code,
                    'admin_reason_ccd' => $admin_reason_ccd,
                    'admin_etc_reason' => $admin_etc_reason
                ];

                //결제루트
                $pay_route_name = (array_search($data['PayRouteCcd'], $this->_pay_route_ccd));

                $order_result = $this->orderModel->_procAdminOrder($pay_route_name, $order_input);
                if($order_result !== true) {
                    throw new \Exception($order_result);
                }

                //주문식별자 추출 : 회원식별자 + 결제루트 + 부여코드 + 부여사유
                $order_idx = $this->_findOrderInfoByApply(array('MemIdx' => $data['MemIdx'], 'PayRouteCcd' => $data['PayRouteCcd'] , 'AdminReasonCcd' => $admin_reason_ccd, 'AdminEtcReason' => $admin_etc_reason));

                if($this->_conn->set('OrderIdx', $order_idx)->where('AaIdx', $check_idx)->update($this->_table['apply']) === false) {
                    throw new \Exception('주문식별자 업데이트에 실패했습니다.');
                }
                /*  주문 처리 */

                /*  sms 발송  */
                if($data['IsUseSms'] === 'Y' && empty($data['SendTel']) === false ) {

                    $sms_input = [
                        'SendTel' => $data['SendTel'],
                        'SmsContent' => $data['SmsContent'],
                        'Phone' => $data['Phone'],
                    ];

                    if($this->_sendSms($sms_input) !== true) {
                        throw new \Exception('승인완료 문자 발송이 실패했습니다.');
                    }
                }
                /*  sms 발송  */

            } else if($app_status === '741004') {  //승인후 취소 : 해당 주문건 환불처리

                if(empty($data['OrderIdx']) === true) {
                    throw new \Exception('주문내역이 존재하지 않습니다.');
                }

                /*  환불 처리 */
                $order_prod_rows = $this->_conn->getJoinListResult($this->orderModel->_table['order'] . ' as O', 'inner'
                    , $this->orderModel->_table['order_product'] . ' as OP', 'O.OrderIdx = OP.OrderIdx', 'OP.OrderProdIdx', [
                        'EQ' => [
                            'O.OrderIdx' => $data['OrderIdx'],
                            'O.MemIdx' => $data['MemIdx'],
                        ]
                    ]
                );
                if (empty($order_prod_rows) === true) {
                    throw new \Exception('주문상품 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                // 환불요청 주문상품 파라미터 가공
                $params = [];
                foreach ($order_prod_rows as $row) {
                    $params[$row['OrderProdIdx']] = [
                        'card_refund_price' => 0,
                        'cash_refund_price' => 0,
                        'sub_refund_price' => '',
                        'is_coupon_refund' => 'N',
                        'is_point_refund' => 'N'
                    ];
                }

                $order_prod_param = base64_encode(json_encode($params));

                // 환불 데이터
                $refund_data = [
                    'order_idx' => $data['OrderIdx'],
                    'params' => $order_prod_param,
                    'refund_reason' => '강좌인증식별자=>'. $check_idx,
                    'refund_admin_idx' => $this->session->userdata('admin_idx')
                ];

                // 환불처리 실행
                $is_refund = $this->orderModel->refundOrderProduct($refund_data);

                if ($is_refund !== true) {
                    throw new \Exception('환불처리가 실패됐습니다. 주문내역을 확인해 주십시오.');
                }
                /*  환불 처리 */
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 신청 및 설정 기본 정보
     * @param $arr_condition
     * @return mixed
     */
    public function findAuthApply($arr_condition)
    {
        $column = '
                A.AaIdx, A.AgIdx, A.MemIdx, A.Affiliation, A.`Position`, A.EtcContent1, A.EtcContent2, fn_dec(A.PhoneEnc) as Phone
                ,A.AttachFileName, A.AttachFileReal, A.AttachFilePath
                ,A.ApplyStatusCcd, A.OrderIdx, A.RegDatm, A.ApprovalDatm, A.CancelDatm
                ,B.SiteCode, B.PayRouteCcd ,B.IsUseSms, B.SmsContent, B.SendTel
        ';

        $from = '
            from 
                 '. $this->_table['apply'] .' A
                join '. $this->_table['auth'] .' B on A.AgIdx = B.AgIdx and B.IsStatus = \'Y\'
            where A.IsStatus=\'Y\'
        ';

        $arr_condition = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        return $this->_conn->query('select ' . $column . $from . $arr_condition)->row_array();
    }


    /**
     * 인증정보를 통한 주문식별자 추출
     * @param $arr_condition
     * @return mixed
     */
    protected function _findOrderInfoByApply($arr_condition)
    {
        $order_idx = $this->_conn->select('Max(OrderIdx) as OrderIdx ')->where($arr_condition)->get($this->orderModel->_table['order'])->row(0)->OrderIdx;
        return $order_idx;
    }

    /**
     * 문자발송
     * @param array $input
     * @return array|bool
     */
    protected function _sendSms($input = [])
    {
        try {
            $this->load->loadModels(['_lms/crm/send/sms']);

            $SendTel = element('SendTel', $input);
            $SmsContent = empty(element('SmsContent', $input)) === false ? element('SmsContent', $input) : '인증이 완료되었습니다.';
            $Phone = element('Phone', $input);

            if($this->smsModel->addKakaoMsg($Phone, $SmsContent , $SendTel, null, 'KFT') === false) {
                throw new \Exception('SMS 발송에 실패했습니다.');
            }

        } catch (Exception $e) {
            return error_result($e);
        }
        return true;
    }
}
