<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApplyModel extends WB_Model
{
    private $_lec_type_ccd = '647002';  // 쿠폰발급구분 > 수동발급
    private $_cert_cancel_sms_content = '인증이 보류되었습니다. 자세한 사항은 고객센터로 문의해 주세요.';          //승인취소 공통 문자 내용

    public function __construct()
    {
        parent::__construct('lms');
    }


    /**
     * todo - 기간연장 정보 추출 필요 (19.02.15)
     * 신청현황 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listApply($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_condition_add = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = ' STRAIGHT_JOIN
                            SA.*
                            ,A.SiteCode,A.CateCode,A.CertTypeCcd,A.CertConditionCcd,A.`No`,A.CertStartDate,A.CertEndDate,A.CertTitle
                            ,B.CateName
                            ,C.CcdName as CertTypeCcd_Name
                            ,D.CcdName as CertConditionCcd_Name
                            ,E.SiteName
                            ,F.MemId,F.MemName, concat(F.Phone1,\'-\', fn_dec(F.Phone2Enc),\'-\', F.Phone3) as Phone
                            ,Ifnull(F2.SmsRcvStatus,\'\') as SmsRcvStatus
                            ,G.wAdminName as ApprovalAdmin_Name
                            ,H.wAdminName as CancelAdmin_Name
                            /*
                            ,(select o.CompleteDatm 
                                from lms_order o 
                                    join lms_order_product op on o.OrderIdx = op.OrderIdx
                            where op.CaIdx is not null and op.CaIdx = SA.CaIdx and op.PayStatusCcd=\'676001\' order by o.OrderIdx desc limit 1
                            ) as CompleteDatm
                            */
                            ,\'\' as ExtendStatus
                            ,\'\' as ExtendDatm
                            ,sc1.CcdName as TakeArea_Name
            				,sc2.CcdName as TakeKind_Name
            				,IFNULL(o.orderCount,0) AS orderCount
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_cert_apply SA
                        join lms_cert A on SA.CertIdx = A.CertIdx
                        join lms_sys_category B on A.CateCode=B.CateCode and B.IsStatus=\'Y\'
                        join lms_sys_code C on A.CertTypeCcd = C.Ccd and C.IsStatus=\'Y\'
                        join lms_sys_code D on A.CertConditionCcd = D.Ccd and D.IsStatus=\'Y\'
                        join lms_site E on A.SiteCode=E.SiteCode and E.IsStatus=\'Y\'
                        join lms_member F on SA.MemIdx = F.MemIdx
                        join lms_member_otherinfo F2 on F.MemIdx = F2.MemIdx
                        left outer join wbs_sys_admin G on SA.ApprovalAdminIdx = G.wAdminIdx
	                    left outer join wbs_sys_admin H on SA.CancelAdminIdx = H.wAdminIdx
	                    left outer join lms_sys_code sc1 on sc1.Ccd = SA.TakeArea 
	                    left outer join lms_sys_code sc2 on sc2.Ccd = SA.TakeKind

	                    LEFT OUTER JOIN 
                        (
                            SELECT op.CaIdx, COUNT(*) AS orderCount
                            FROM lms_order o 
                                JOIN lms_order_product op ON o.OrderIdx = op.OrderIdx
                            WHERE op.CaIdx IS NOT NULL AND op.PayStatusCcd=\'676001\' 
                            GROUP BY op.CaIdx
                        ) o ON o.CaIdx = Sa.CaIdx
	                    
                    where SA.IsStatus=\'Y\' and A.IsStatus=\'Y\'
        ';

       //echo var_dump($arr_condition);

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        if(empty($arr_condition_add) === false) {
            $where .= ' and '.$arr_condition_add;
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 신청현황 목록 - 엑셀출력
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listApplyExcel($arr_condition = [], $order_by = [], $arr_condition_add = null)
    {

            $column = ' E.SiteName
                            ,B.CateName
                            ,A.CertIdx
                            ,C.CcdName AS CertTypeCcd_Name
                            ,A.`No`
                            ,A.CertTitle
                            ,F.MemId,F.MemName,fn_dec(F.PhoneEnc) AS phone
                            ,SA.RegDatm
                            ,IFNULL(SA.Affiliation,\'\') AS Affiliation
                            ,IFNULL(SA.Position,\'\') AS POSITION
                            ,IFNULL(SA.WorkType,\'\') AS WorkType
                            ,IFNULL(SA.EtcContent,\'\') AS EtcContent
                            ,IFNULL(sc1.CcdName,\'\') AS TakeArea_Name
                            ,IFNULL(sc2.CcdName,\'\') AS TakeKind_Name
                            ,IFNULL(SA.TakeNo,\'\') AS TakeNo
                            ,IFNULL(G.wAdminName,\'\') AS ApprovalAdmin_Name
                            ,IFNULL(SA.ApprovalDatm,\'\') AS ApprovalDatm
                            ,IFNULL(H.wAdminName,\'\') AS CancelAdmin_Name
                            ,IFNULL(SA.CancelDatm,\'\') AS CancelDatm
                            ,SA.ApprovalStatus
                            ,IFNULL(SA.AddContent1,\'\') AS AddContent1
                            ,IFNULL(SA.AddContent2,\'\') AS AddContent2
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

        $from = '
                    from
                        lms_cert_apply SA
                        join lms_cert A on SA.CertIdx = A.CertIdx
                        join lms_sys_category B on A.CateCode=B.CateCode and B.IsStatus=\'Y\'
                        join lms_sys_code C on A.CertTypeCcd = C.Ccd and C.IsStatus=\'Y\'
                        join lms_sys_code D on A.CertConditionCcd = D.Ccd and D.IsStatus=\'Y\'
                        join lms_site E on A.SiteCode=E.SiteCode and E.IsStatus=\'Y\'
                        join lms_member F on SA.MemIdx = F.MemIdx
                        join lms_member_otherinfo F2 on F.MemIdx = F2.MemIdx
                        left outer join wbs_sys_admin G on SA.ApprovalAdminIdx = G.wAdminIdx
	                    left outer join wbs_sys_admin H on SA.CancelAdminIdx = H.wAdminIdx
	                    left outer join lms_sys_code sc1 on sc1.Ccd = SA.TakeArea 
	                    left outer join lms_sys_code sc2 on sc2.Ccd = SA.TakeKind

	                    LEFT OUTER JOIN 
                        (
                            SELECT op.CaIdx, COUNT(*) AS orderCount
                            FROM lms_order o 
                                JOIN lms_order_product op ON o.OrderIdx = op.OrderIdx
                            WHERE op.CaIdx IS NOT NULL AND op.PayStatusCcd=\'676001\' 
                            GROUP BY op.CaIdx
                        ) o ON o.CaIdx = Sa.CaIdx
	                    
                    where SA.IsStatus=\'Y\' and A.IsStatus=\'Y\'
        ';

        //echo var_dump($arr_condition);

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        if(empty($arr_condition_add) === false) {
            $where .= ' and '.$arr_condition_add;
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;exit;
        return $query->result_array();
    }




    /**
     * 신청현황 수정 - 승인 / 취소
     * @param array $input
     * @return array|bool
     */
    public function changeApply($input=[])
    {
        $this->_conn->trans_begin();

        try {

            // 쿠폰등록 / 회원발급 모델 로드
            $this->load->loadModels(['service/couponRegist']);
            $this->load->loadModels(['service/couponIssue']);

            $app_status = element('app_status',$input);
            $process_type = element('process_type',$input);

            if($process_type === 'all') {
                $_checkidx = element('checkIdx',$input);
            } else {
                $_checkidx = element('checkIdx_each',$input);
            }

            // 인증정보 가져오기 - 쿠폰 할당/회수를 위함
            if(is_array($_checkidx)) {
                $arr_condition = [
                    'IN' => ['SA.CaIdx' => $_checkidx]
                ];
            } else {
                $arr_condition = [
                    'EQ' => ['SA.CaIdx' => $_checkidx]
                ];
            }

            if($app_status === 'Y') {       //승인할 경우 신청조건이 미승인 만 추출
                $arr_condition = array_merge_recursive($arr_condition,[
                    'EQ' => ['ApprovalStatus' => 'A']
                ]);
            } else if($app_status === 'N') {    //취소할 경우 신청조건이 미승인, 승인 만 추출
                $arr_condition = array_merge_recursive($arr_condition,[
                    'IN' => ['ApprovalStatus'  => ['A','Y']]
                ]);
            }

            $column = ' STRAIGHT_JOIN 
                SA.*
                ,A.CertTypeCcd,A.CertConditionCcd,A.SiteCode
                ,F.MemId,F.MemName, concat(F.Phone1, fn_dec(F.Phone2Enc), F.Phone3) as Phone
                ,G.SiteName, G.CsTel
                ,H.CcdDesc As SmsContent
                ,J.couponData_json ';
            $from = '
                from
                    lms_cert_apply SA
                    join lms_cert A on SA.CertIdx = A.CertIdx
                    join lms_member F on SA.MemIdx = F.MemIdx
                    join lms_site G on A.SiteCode = G.SiteCode
                    join lms_sys_code H on A.CertTypeCcd = H.Ccd
                    left outer join
                        (
                        select
                        aa.CertIdx,
                        CONCAT(\'[\', GROUP_CONCAT(
                            JSON_OBJECT(
                                \'CouponIdx\', bb.CouponIdx,
                                \'CouponName\', bb.CouponName
                            )
                        ) , \']\') AS couponData_json
                        from
                            lms_cert_r_coupon aa
                            join lms_coupon bb on aa.CouponIdx = bb.CouponIdx and bb.IsIssue=\'Y\'
                        where aa.IsStatus=\'Y\'
                        group by CertIdx
                    ) as J on A.CertIdx = J.CertIdx
                where SA.IsStatus=\'Y\'
            ';
            $order_by_offset_limit = '';

            $where = $this->_conn->makeWhere($arr_condition);
            $where = $where->getMakeWhere(true);

            // 신청정보 추출
            $applyList = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit )->result_array();

            if(empty($applyList)) {
                throw new \Exception('선택된 신청 정보가 없습니다.');
            }

            if($app_status === 'Y') {   //승인 : 쿠폰삽입

                foreach ($applyList as $idx) {
                    
                    $mem_idx = $idx['MemIdx'];

                    //쿠폰발급 이면서 쿠폰정보가 있는경우
                    if( $idx['CertConditionCcd'] ==='685002' && !empty($idx['couponData_json']) ) {

                        $coupon_info = json_decode($idx['couponData_json'], true);

                        //연결된 쿠폰 정보 등록
                        foreach ($coupon_info as $c_idx){

                            $coupon_idx =  $c_idx['CouponIdx'];

                            //***************************       쿠폰 지급 여부    ********************************//
                            $coupon_add_arr_condition['EQ'] = ['MemIdx'=>$mem_idx, 'CouponIdx' => $coupon_idx,'ValidStatus' => 'Y'];

                            // 받은 쿠폰 존재 여부
                            if($this->_conn->getFindResult('lms_coupon_detail', true,$coupon_add_arr_condition) > 0) {
                                throw new \Exception('이미 받은 쿠폰이 존재합니다.', _HTTP_NO_PERMISSION);
                            }
                            //***************************       쿠폰 지급 여부    ********************************//

                            //***************************       couponissuemodel        ****************************//
                            // 사용자 쿠폰 발급전 쿠폰 유효성 체크
                            $coupon_data = $this->couponIssueModel->checkAddCouponDetail($coupon_idx);
                            if (is_array($coupon_data) === false) {
                                throw new \Exception($coupon_data, _HTTP_NO_PERMISSION);
                            }

                            // 배포루트, 쿠폰핀타입에 따라 발급 처리
                            $is_issue = $this->couponIssueModel->_addCouponDetail($coupon_idx, $coupon_data, explode(',',$idx['MemIdx']));
                            if ($is_issue !== true) {
                                throw new \Exception($is_issue, _HTTP_NO_PERMISSION);
                            }

                            //***************************       couponissuemodel        ****************************//
                        }
                    }
                    
                    /*
                    //sms 발송하기
                    $smsData = [];
                    $smsData['SiteCode'] = $idx['SiteCode'];
                    $smsData['SiteName'] = $idx['SiteName'];
                    $smsData['CsTel'] = $idx['CsTel'];
                    $smsData['SmsContent'] = $idx['SmsContent'];
                    $smsData['MemIdx'] = $idx['MemIdx'];
                    $smsData['MemName'] = $idx['MemName'];
                    $smsData['Phone'] = $idx['Phone'];

                    $is_sms = $this->addSms($smsData);
                    if($is_sms !== true) {
                        throw new \Exception($is_sms, _HTTP_NO_PERMISSION);
                    }
                    */
                    if(empty($idx['SmsContent'] == false)) {
                        $smsData = [];
                        $smsData['CsTel'] = $idx['CsTel'];
                        $smsData['SmsContent'] = $idx['SmsContent'];
                        $smsData['Phone'] = $idx['Phone'];
                        $is_sms = $this->addSms($smsData);
                        if ($is_sms !== true) {
                            throw new \Exception('SMS발송 실패입니다.');
                        }
                    }
                    
                }

            } else if($app_status === 'N') {   //취소

                foreach ($applyList as $idx) {

                    //쿠폰발급 이면서 쿠폰정보가 있는경우
                    if( $idx['CertConditionCcd'] ==='685002' && !empty($idx['couponData_json']) ) {

                        $mem_idx = $idx['MemIdx'];
                        $coupon_info = json_decode($idx['couponData_json'], true);

                        foreach ($coupon_info as $c_idx){

                            $coupon_idx =  $c_idx['CouponIdx'];

                            //***************************       지급된 쿠폰 사용 여부    ********************************//
                            $coupon_add_arr_condition['EQ'] = ['MemIdx'=>$mem_idx, 'CouponIdx' => $coupon_idx,'ValidStatus' => 'Y', 'IsUse' => 'N'];

                            // 미사용 쿠폰이 존재 할 경우 : 쿠폰 회수
                            if($this->_conn->getFindResult('lms_coupon_detail', true,$coupon_add_arr_condition) > 0) {

                                $admin_idx = $this->session->userdata('admin_idx');
                                $reg_ip = $this->input->ip_address();

                                //$result = $this->couponIssueModel->modifyRetireCouponDetail(json_decode($this->_reqP('params'), true));
                                $this->_conn->set('RetireDatm', 'now()', false);
                                $this->_conn->set(['ValidStatus' => 'R', 'RetireUserType' => 'A', 'RetireUserIdx' => $admin_idx, 'RetireIp' => $reg_ip]);
                                $this->_conn->where(['MemIdx' => $mem_idx, 'CouponIdx' => $coupon_idx, 'IsUse' => 'N']);

                                if ($this->_conn->update('lms_coupon_detail') === false) {
                                    throw new \Exception('사용자 쿠폰 회수에 실패했습니다.');
                                }

                            }
                            //***************************       쿠폰 지급 여부    ********************************//

                        }
                    }

                    /*
                    //sms 발송하기
                    $smsData = [];
                    $smsData['SiteCode'] = $idx['SiteCode'];
                    $smsData['SiteName'] = $idx['SiteName'];
                    $smsData['CsTel'] = $idx['CsTel'];
                    $smsData['SmsContent'] = $this->_cert_cancel_sms_content;
                    $smsData['MemIdx'] = $idx['MemIdx'];
                    $smsData['MemName'] = $idx['MemName'];
                    $smsData['Phone'] = $idx['Phone'];

                    $is_sms = $this->addSms($smsData);
                    if($is_sms !== true) {
                        throw new \Exception($is_sms, _HTTP_NO_PERMISSION);
                    }
                    */
                    $smsData = [];
                    $smsData['CsTel'] = $idx['CsTel'];
                    $smsData['SmsContent'] = $this->_cert_cancel_sms_content;       //주의 : 취소시 공통 내용 발송
                    $smsData['Phone'] = $idx['Phone'];
                    $is_sms = $this->addSms($smsData);
                    if($is_sms !== true) {
                        throw new \Exception('SMS발송 실패입니다.');
                    }

                }

            }

            /***************************        신청현황 수정     ****************************/
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'ApprovalStatus' => $app_status
            ];

            if($app_status === 'Y') {   //승인
                $data = array_merge($data, [
                    'ApprovalAdminIdx' => $admin_idx,
                ]);

                $this->_conn->set('ApprovalDatm', 'NOW()', false);

            }else if($app_status === 'N') {   //취소
                $data = array_merge($data, [
                    'CancelAdminIdx' => $admin_idx,
                ]);
                $this->_conn->set('CancelDatm', 'NOW()', false);
            }

            if(is_array($_checkidx)) {
                $this->_conn->set($data)->where_in('CaIdx', $_checkidx);
            } else {
                $this->_conn->set($data)->where('CaIdx', $_checkidx);
            }

            $this->_conn->update('lms_cert_apply');

            $this->_conn->trans_commit();
            //$this->_conn->trans_rollback();
            /***************************        신청현황 수정     ****************************/

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;

    }

    /**
     * SMS 발송 메소드
     * @param array $data
     * @return bool|string
     */
    public function addSms($data=[])
    {
        try {
            /* 기존 : 자체 로그를 위한 로직
            $inputData = [
                'SendGroupTypeCcd' => '641001',
                'SiteCode' => $data['SiteCode'],
                'SendPatternCcd' => '637002',       //메세지성격
                'SendTypeCcd' => '638001',          //SMS메세지종류
                'SendOptionCcd' => '640001',        //메세지 발송옵션
                'SendStatusCcd' => '639001',        //메세지 발송상태
                'CsTel' => $data['CsTel'],
                'Content' => $data['SiteName'].'-'. $data['SmsContent'],
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            $this->_conn->set($inputData)->set('SendDatm', 'NOW()', false);

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert('lms_crm_send') === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $send_idx = $this->_conn->insert_id();

            $inputData_sms = [
                'SendIdx' => $send_idx,
                'MemIdx' => $data['MemIdx'],
                //'Receive_PhoneEnc' => $data['Phone'],
                'Receive_Name' => $data['MemName'],
            ];
            $this->_conn->set($inputData_sms)->set('Receive_PhoneEnc',  'fn_enc("' . $data['Phone'] . '")',false);

            // SMS 개별등록 등록
            if ($this->_conn->set($inputData_sms)->insert('lms_crm_send_r_receive_sms') === false) {
                throw new \Exception('세부 발송 등록에 실패했습니다.');
            }
            */
            $this->load->library('sendSms');
            if($this->sendsms->send($data['Phone'], $data['SmsContent'], $data['CsTel']) !== true) {
                throw new \Exception('SMS 발송에 실패했습니다.');
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}