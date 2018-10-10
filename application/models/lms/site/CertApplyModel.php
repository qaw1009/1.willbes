<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApplyModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listApply($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = ' STRAIGHT_JOIN
                            SA.*
                            ,A.SiteCode,A.CateCode,A.CertTypeCcd,A.CertConditionCcd,A.`No`,A.CertStartDate,A.CertEndDate
                            ,B.CateName
                            ,C.CcdName as CertTypeCcd_Name
                            ,D.CcdName as CertConditionCcd_Name
                            ,E.SiteName
                            ,F.MemId,F.MemName, concat(F.Phone1,\'-\', fn_dec(F.Phone2Enc),\'-\', F.Phone3) as Phone
                            ,Ifnull(F2.SmsRcvStatus,\'\') as SmsRcvStatus
                            ,G.wAdminName as ApprovalAdmin_Name
                            ,H.wAdminName as CancelAdmin_Name
                            ,\'\' as OrderStatus
                            ,\'\' as OrderDatm
                            ,\'\' as ExtendStatus
                            ,\'\' as ExtendDatm
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
                    where SA.IsStatus=\'Y\' and A.IsStatus=\'Y\'
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();

    }

    public function changeApply($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $app_status = element('app_status',$input);

            /*
            echo (is_array(element('checkIdx',$input)));
            echo var_dump(element('checkIdx',$input));
            exit;
            */

            if(is_array(element('checkIdx',$input))) {
                $_checkidx = element('checkIdx',$input);
            } else {
                $_checkidx = explode(element('checkIdx',$input));
            }

            $admin_idx = $this->session->userdata('admin_idx');

            /*
            $arr_condition = [
                'IN' => [
                    'CaIdx' => $_checkidx
                ]
            ];
            */

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


            $this->_conn->set($data)->where_in('CaIdx', $_checkidx);
            $this->_conn->update('lms_cert_apply');

            echo $this->_conn->last_query();


            //$this->_conn->trans_commit();
            $this->_conn->trans_rollback();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;

    }


}