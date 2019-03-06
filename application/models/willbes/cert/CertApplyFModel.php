<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApplyFModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 인증코드로 인증설정 정보 추출
     * @param $cert_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function findCertByCertIdx($cert_idx, $arr_condition=[])
    {

        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['A.CertIdx' => $cert_idx, 'A.IsUse' => 'Y']]);

        $column = 'A.*
                        ,B.CateName
                        ,C.CcdName as CertTypeCcd_Name, C.CcdDesc as Sms_Content
                        ,D.CcdName as CertConditionCcd_Name
                        ,E.SiteName
                        ,G.productData,G.productData_json
                        ,J.couponData,J.couponData_json
                        ,if( A.IsUse=\'Y\' and current_timestamp() between A.CertStartDate and A.CertEndDate,\'Y\', \'N\') as IsCertAble 
                        ,K.ApprovalStatus';
        $from = '
                    from 
                        lms_cert A
                        join lms_sys_category B on A.CateCode=B.CateCode and B.IsStatus=\'Y\'
                        join lms_sys_code C on A.CertTypeCcd = C.Ccd and C.IsStatus=\'Y\'
                        join lms_sys_code D on A.CertConditionCcd = D.Ccd and D.IsStatus=\'Y\'
                        join lms_site E on A.SiteCode=E.SiteCode and E.IsStatus=\'Y\'
                        left outer join
                            (
                                select 
                                cc.CertIdx,
                                CONCAT(\'[\', GROUP_CONCAT(
                                  JSON_OBJECT(
                                    \'ProdCode\', dd.ProdCode,
                                    \'ProdName\', dd.ProdName
                                  )
                                ) , \']\') AS productData_json
                                ,group_concat(CONCAT(\'[\',dd.ProdCode,\']\',dd.ProdName) separator \'<BR>\') as productData
                                from
                                    lms_cert_r_product cc
                                    join lms_product dd on cc.ProdCode = dd.ProdCode and dd.IsStatus=\'Y\'
                                where cc.IsStatus=\'Y\'
                                group by CertIdx
                            ) as G on A.CertIdx = G.CertIdx 
                        
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
                        left outer join lms_cert_apply K on A.CertIdx = K.CertIdx and K.IsStatus=\'Y\' and K.MemIdx = \''.$this->session->userdata('mem_idx').'\' 
                            and (ApprovalStatus=\'Y\' or ApprovalStatus=\'A\') 
                    where A.IsStatus=\'Y\'
                        ';
        $where  = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column .$from .$where)->row_array();
        //echo 'select '. $column .$from .$where;
        //echo var_dump($query);
        return $query;
    }

    /**
     * 인증에 엮인 상품목록 추출
     * @param $cert_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function listProductByCertIdx($cert_idx, $arr_condition=[])
    {

        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['A.CertIdx' => $cert_idx, 'A.IsUse' => 'Y']]);

        $column = 'straight_join
                        A.CertTypeCcd, A.CertConditionCcd
                        ,C.ProdCode,C.ProdName
                        ,D.LearnPatternCcd,D.PackTypeCcd
                        ,D1.CcdName,D2.CcdName
                        ,F.CateCode,F.CateName
                        ,ifnull( fn_product_saleprice_data(C.ProdCode),\'N\') as ProdPriceData';

        $from = ' from 
                        lms_cert A
                        join lms_cert_r_product B on A.CertIdx = B.CertIdx and B.IsStatus=\'Y\'
                        join lms_product C on B.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                        join lms_product_lecture D on C.ProdCode = D.ProdCode
                        join lms_sys_code D1 on D.LearnPatternCcd = D1.Ccd
                        join lms_sys_code D2 on D.PackTypeCcd = D2.Ccd
                        left outer join lms_product_r_category E on C.ProdCode = E.ProdCode and E.IsStatus=\'Y\'
                        left outer join lms_sys_category F on E.CateCode = F.CateCode and F.IsStatus=\'Y\'
                    where  A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' and D1.IsStatus=\'Y\' and D2.IsStatus=\'Y\' ';
        $where  = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select '. $column .$from .$where)->result_array();
        return $query;
    }

    
    /**
     * 신청 처리 함수
     * @param array $input
     * @return array|bool
     */
    public function addApply($input=[])
    {
        $this->_conn->trans_begin();

        try {

            $cert_idx = element('CertIdx', $input);
            $certtypeccd = element('CertTypeCcd', $input);

            $add_condition = [
                'IN' => [
                    'ApprovalStatus' => ['A','Y']
                ]
            ];

            if(empty($this->findApplyByCertIdx($cert_idx, $add_condition)) !== true) {
                throw new \Exception('이미 신청하신 인증내역이 존재합니다.');
            }

            $this->load->library('upload');
            $file_path = config_item('upload_prefix_dir').'/cert_apply/'.date('Ym');
            $file_name = $certtypeccd.'-'.date("YmdHis").rand(100,999);
            
            //첨부자료 등록
            $upload_result = $this->upload->uploadFile('file','attachfile',$file_name,$file_path,'overwrite:false');

            if(is_array($upload_result) === false) {
                //throw new \Exception('파일 등록에 실패했습니다.');
                throw new \Exception($upload_result);
            }

            $AttachFilePath = $this->upload->_upload_url.$file_path.'/';
            $AttachFileReal= $upload_result[0]['client_name'];
            $AttachFileName= $upload_result[0]['file_name'];
                
            /*
            echo $file_path."<BR>";
            echo $AttachFileName."<BR>";
            echo $AttachFilePath."<BR>";
            echo $AttachFileReal."<BR>";
            exit;
            */

            $data = [
              'CertIdx' => $cert_idx,
                'MemIdx' => $this->session->userdata('mem_idx'),
                'WorkType' => element('WorkType', $input,null),
                'Affiliation' => element('Affiliation', $input,null),
                'Position' => element('Position', $input,null),
                'EtcContent' => element('EtcContent', $input,null),
                'TakeNo' => element('TakeNo', $input,null),
                'TakeYear' => element('TakeYear', $input,null),
                'TakeArea' => element('TakeArea', $input,null),
                'TakeKind' => element('TakeKind', $input,null),
                'AttachFileName' => empty($AttachFileName) ? null :$AttachFileName,
                'AttachFileReal' => empty($AttachFileName) ? null :$AttachFileReal,
                'AttachFilePath' => empty($AttachFileName) ? null : $AttachFilePath,
                'RegIp' => $this->input->ip_address()
            ];

            if($certtypeccd === '684002') { //제대군인인증일 경우 자동 승인 처리
                $data = array_merge($data,[
                    'ApprovalStatus' => 'Y'
                ]);
            }
            //echo var_dump($data);exit;

            if($this->_conn->insert('lms_cert_apply',$data) === false) {
                throw new \Exception('인증 신청에 실패했습니다.');
            }
            //echo $this->_conn->last_query();
            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 상품코드로 해당 상품이 인증에 엮인 상품인지 파악
     * @param $prod_code
     */
    public function findCertByProduct($input=[])
    {
        $prod_code = element('prod_code', $input);

            $column = " C.CertIdx ";
            $from = "from
                            lms_product A 
                            join lms_cert_r_product B on A.ProdCode = B.ProdCode
                            join lms_cert C on B.CertIdx = C.CertIdx
                        Where A.IsStatus='Y' and B.IsStatus='Y' and C.IsStatus='Y' and C.IsUse='Y' and (now() between C.CertStartDate and C.CertEndDate) ";

            $where = $this->_conn->makeWhere(['EQ'=>['B.ProdCode'=>$prod_code]])->getMakeWhere(true);
            $order_by = "order by C.CertIdx desc limit 1";
            //echo var_dump('select ' . $column . $from . $where . $order_by);
            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by)->row_array();
            return $query;
    }

    /**
     * 인증설정코드로 인증여부 추출
     * @param $cert_idx
     * @return mixed
     */
    public function findApplyByCertIdx($cert_idx,$add_condition=[])
    {

        if(empty($add_condition)) {
            $add_condition = [
                'EQ' => ['ApprovalStatus'=>'Y']
            ];
        }

        $arr_condition = array_merge_recursive($add_condition, [
            'EQ'=>['CertIdx'=>$cert_idx , 'MemIdx'=>$this->session->userdata('mem_idx')]
        ]);

        //echo var_dump($arr_condition);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query("select CaIdx from lms_cert_apply where IsStatus='Y' ".$where ." limit 1") -> row_array();
        //echo $this->_conn->last_query();
        return $query;
    }

}