<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function addCert($input = [])
    {
        $this->_conn->trans_begin();

        try {

            $common_data = $this->inputCommon($input);

            $input_data = array_merge($common_data, [
                'SiteCode'=>element('site_code',$input),
                'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($input_data)->insert('lms_cert') === false) {
                //echo var_dump($this->_conn->last_query());
                throw new \Exception('인증 등록에 실패했습니다.');
            }

            $CertIdx = $this->_conn->insert_id();

            if($this->_setProduct($input,$CertIdx) !== true) {
                throw new \Exception('무한패스 등록에 실패했습니다.');
            }

            if($this->_setCoupon($input,$CertIdx) !== true) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }


            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function modifyCert($input = [])
    {
        $this->_conn->trans_begin();

        try {

            $CertIdx = element('CertIdx',$input);

            $common_data = $this->inputCommon($input);

            $input_data = array_merge($common_data, [
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($input_data)->where('CertIdx', $CertIdx)->update('lms_cert') === false) {
                throw new \Exception('인증 정보 수정에 실패했습니다.');
            }

            if($this->_setProduct($input,$CertIdx) !== true) {
                throw new \Exception('무한패스 등록에 실패했습니다.');
            }

            if($this->_setCoupon($input,$CertIdx) !== true) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    public function inputCommon($input=[])
    {
        $input_data = [
            'CateCode'=>element('CateCode',$input)
            ,'CertTypeCcd'=>element('CertTypeCcd',$input)
            ,'CertConditionCcd'=>element('CertConditionCcd',$input)
            ,'No'=>element('No',$input)
            ,'CertStartDate'=>element('CertStartDate',$input)
            ,'CertEndDate'=>element('CertEndDate',$input)
            ,'IsUse'=>element('IsUse',$input)
        ];
        return $input_data;
    }

    /**
     * 무한패스 상품 등록
     * @param array $input
     * @param $CertIdx
     * @return bool|string
     */
    public function _setProduct($input=[],$CertIdx)
    {
        try {
            /*  무한패스 상품 정보 상태값 변경 */
            if($this->_setDataDelete($CertIdx,'lms_cert_r_product','무한패스') !== true) {
                throw new \Exception('무한패스 수정에 실패했습니다.');
            }

            if(empty(element('ProdCode', $input,'')) === false) {
                /*  무한패스 등록 */
                $data = [
                    'CertIdx' => $CertIdx
                    , 'ProdCode' => element('ProdCode', $input)
                    , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                ];

                if ($this->_conn->set($data)->insert('lms_cert_r_product') === false) {
                    //echo $this->_conn->last_query();
                    throw new \Exception('무한패스 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }


    public function _setCoupon($input=[],$CertIdx)
    {
        try {
            /*  기존 쿠폰 정보 상태값 변경 */
            if($this->_setDataDelete($CertIdx,'lms_cert_r_coupon','쿠폰') !== true) {
                throw new \Exception('쿠폰 수정에 실패했습니다.');
            }

            $CouponIdx = element('CouponIdx',$input);
            if(empty($CouponIdx) === false) {
                for($i=0;$i<count($CouponIdx);$i++) {
                    $data = [
                        'CertIdx' => $CertIdx
                        ,'CouponIdx' => $CouponIdx[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];

                    if($this->_conn->set($data)->insert('lms_cert_r_coupon') === false) {
                        echo $this->_conn->last_query();
                        throw new \Exception('쿠폰 등록에 실패했습니다.');
                    }

                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
    public function _setDataDelete($CertIdx,$tablename,$msg,$whereType=null,$whereKey=null,$whereVal=null)
    {
        try {
            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('CertIdx', $CertIdx)->where('IsStatus', 'Y');

            if(empty($whereType) === false) {
                $this->_conn->{$whereType}($whereKey, $whereVal);
            }

            if ($this->_conn->update($tablename) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('이전 ' . $msg . ' 정보 수정에 실패했습니다.');
            }

            /*  기존 정보 상태값 변경 */
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }


    public function listCert($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = ' STRAIGHT_JOIN
                            A.*
                            ,B.CateName
                            ,C.CcdName as CertTypeCcd_Name
                            ,D.CcdName as CertConditionCcd_Name
                            ,E.SiteName
                            ,F.wAdminName  as RegAdminName
                            ,F2.wAdminName as  UpdAdminName
                            ,G.ProdCode,H.ProdName
                            ,J.couponData,J.couponData_json
                            
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_cert A
                            join lms_sys_category B on A.CateCode=B.CateCode and B.IsStatus=\'Y\'
                            join lms_sys_code C on A.CertTypeCcd = C.Ccd and C.IsStatus=\'Y\'
                            join lms_sys_code D on A.CertConditionCcd = D.Ccd and D.IsStatus=\'Y\'
                            join lms_site E on A.SiteCode=E.SiteCode and E.IsStatus=\'Y\'
                            left outer join wbs_sys_admin F on A.RegAdminIdx = F.wRegAdminIdx
                            left outer join wbs_sys_admin F2 on A.UpdAdminIdx = F2.wRegAdminIdx
                            left outer join lms_cert_r_product G on A.CertIdx = G.CertIdx and G.IsStatus=\'Y\'
                            left outer join lms_product H on G.ProdCode=H.ProdCode
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
                                ,group_concat(CONCAT(\'[\',bb.CouponIdx,\']\',bb.CouponName) separator \'<BR>\') as couponData
                                from
                                    lms_cert_r_coupon aa
                                    join lms_coupon bb on aa.CouponIdx = bb.CouponIdx and bb.IsIssue=\'Y\'
                                where aa.IsStatus=\'Y\'
                                group by CertIdx
                            ) as J on A.CertIdx = J.CertIdx 
                     where A.IsStatus=\'Y\'
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

}