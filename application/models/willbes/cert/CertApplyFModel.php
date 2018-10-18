<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApplyFModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function findCertByCertIdx($cert_idx, $arr_condition=[])
    {

        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['A.CertIdx' => $cert_idx, 'A.IsUse' => 'Y']]);

        $column = 'A.*
                        ,B.CateName
                        ,C.CcdName as CertTypeCcd_Name, C.CcdDesc as Sms_Content
                        ,D.CcdName as CertConditionCcd_Name
                        ,E.SiteName
                        ,G.ProdCode,H.ProdName
                        ,J.couponData
                        ,J.couponData_json
                        ,if( A.IsUse=\'Y\' and current_timestamp() between A.CertStartDate and A.CertEndDate,\'Y\', \'N\') as IsCertAble 
                        #,(select ApprovalStatus from lms_cert_apply aa where aa.CertIdx=A.CertIdx and aa.MemIdx=\''.$this->session->userdata('mem_idx').'\' and aa.IsStatus=\'Y\' and (ApprovalStatus=\'Y\' or ApprovalStatus=\'A\')) as
                        ,K.ApprovalStatus';
        $from = '
                    from 
                        lms_cert A
                        join lms_sys_category B on A.CateCode=B.CateCode and B.IsStatus=\'Y\'
                        join lms_sys_code C on A.CertTypeCcd = C.Ccd and C.IsStatus=\'Y\'
                        join lms_sys_code D on A.CertConditionCcd = D.Ccd and D.IsStatus=\'Y\'
                        join lms_site E on A.SiteCode=E.SiteCode and E.IsStatus=\'Y\'
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
                        left outer join lms_cert_apply K on A.CertIdx = K.CertIdx and K.IsStatus=\'Y\' and K.MemIdx = \''.$this->session->userdata('mem_idx').'\' 
                            and (ApprovalStatus=\'Y\' or ApprovalStatus=\'A\') 
                    where A.IsStatus=\'Y\'
                        ';
        $where  = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select '. $column .$from .$where)->row_array();
        //echo 'select '. $column .$from .$where .$order_by_offset_limit;
        //echo var_dump($query);
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
            $this->load->library('upload');

            $file_path = config_item('upload_prefix_dir').'/cert_apply/'.date('Ym');
            $file_name = element('CertTypeCcd', $input).'-'.date("YmdHis").rand(100,999);
            
            //첨부자료 등록
            $upload_result = $this->upload->uploadFile('file','attachfile',$file_name,$file_path,'overwrite:false');

            if(is_array($upload_result) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
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
              'CertIdx' => element('CertIdx', $input),
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


}