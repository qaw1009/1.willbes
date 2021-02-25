<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthGiveFModel extends WB_Model
{
    protected $_table = [
        'auth' => 'lms_auth_give',
        'apply' => 'lms_auth_apply',
        'apply_product' => 'lms_auth_apply_product',
        'code' => 'lms_site_code',
        'product' => 'lms_product',
        'lecture' => 'lms_product_lecture',
        'member' => 'lms_member',
        'order' => 'lms_order',
    ];

    //승인코드
    protected $_apply_ccd = [
        'ing' => '741001',        //미승인
        'approval' => '741002'           //승인완료
    ];

    //결제루트
    public $_pay_route_ccd = ['zero' => '670003', 'admin_pay' => '670007'];

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->loadModels(['crm/smsF']);
    }

    /**
     * 인증코드로 강좌지급 인증정보 추출
     * @param $ag_code
     * @param array $arr_condition
     * @return mixed
     */
    public function findAuthGive($ag_code, $ag_idx, $arr_condition = [])
    {
        $column = 'A.*
                        ,if(A.IsAutoApproval =\'Y\', \'자동승인\' , \'수동승인\') as IsAutoApprovalName
                        ,if(A.StudyPeriodType =\'P\', \'상품 수강기간\' , \'별도 수강기간\') as IsAutoApprovalName
                        ,B.SiteName
                        ,C.CcdName as PayRouteCcd_Name
        ';
        $from = '
                    from
                        lms_auth_give A
                        join lms_site B on A.SiteCode = B.SiteCode and B.IsStatus=\'Y\'
                        left join lms_sys_code C on A.PayRouteCcd = C.Ccd and C.IsStatus=\'Y\'
                    where A.IsStatus=\'Y\' 
        ';

        $condition =  empty($ag_idx) === true ? ['EQ' => ['A.AgCode' => $ag_code]] : ['EQ' => [ 'A.AgIdx' => $ag_idx]];
        $arr_condition = array_merge_recursive($arr_condition, $condition);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' . $column . $from . $where )->row_array();
        return $query;
    }

    /**
     * 인증식별자로 설정 강좌 추출
     * @param $ag_idx
     * @param array $arr_condition
     * @return mixed
     */
    public function listAuthGiveProductByIdx($ag_idx, $arr_condition = [])
    {
        $column = '
                        straight_join
                        B.*
                        ,C.ProdCateName, C.ProdName, C.SaleStatusCcd
                        ,C.SubjectIdx, C.SubjectName, C.CourseIdx, C.CourseName
                        ,C.ProfIdx, C.wProfName, C.ProfNickName, C.ProfNickNameAppellation, C.ProfSlogan
                        ,C.wUnitLectureCnt, C.wScheduleCount
                        ,C.StudyStartDate,C.wLectureProgressCcd, C.wLectureProgressCcdName
                        ,C.StudyPeriod, C.MultipleApply
                        ,C.ProdBookData,C.ProfReferData
        ';

        $from = '
                    from
                        lms_auth_give A
                        join lms_auth_give_r_product B on A.AgIdx = B.AgIdx and B.IsStatus=\'Y\'
                        join vw_product_on_lecture C on B.ProdCode = C.ProdCode #and C.IsUse = \'Y\'
                    where A.IsStatus=\'Y\'
        ';
        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['A.AgIdx' => $ag_idx]]);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy(['B.GroupNum' => 'asc', 'B.OrderNum' => 'asc'])->getMakeOrderBy();
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
        return $query;
    }

    public function addAuthApply($input = [])
    {
        $this->_conn->trans_begin();

        try {

            $mem_idx = $this->session->userdata('mem_idx');
            $ag_idx = element('ag_idx', $input);

            $apply_data = $this->findAuthApplyInfo(['EQ' => ['AgIdx'=>$ag_idx]]);

            if(empty($apply_data) !== true) {
                if($apply_data['ApplyStatusCcd'] === $this->_apply_ccd['ing']) {
                    $msg = '이미 신청하신 내역이 존재합니다. 현재 승인 진행중에 있습니다.';
                } else {
                    $msg = '승인이 완료된 인증입니다.';
                }
                throw new \Exception($msg);
            }

            $auth_data = $this->findAuthGive(null, $ag_idx);
            $apply_code = ($auth_data['IsAutoApproval'] === 'N' ? $this->_apply_ccd['ing'] : $this->_apply_ccd['approval']);

            $this->load->library('upload');
            $file_path = config_item('upload_prefix_dir').'/auth_give_apply/'.date('Ym');
            $file_name = $ag_idx.'-'.date("YmdHis").rand(100,999);

            //첨부자료 등록
            $upload_result = $this->upload->uploadFile('file','attach_file' ,$file_name, $file_path,'overwrite:false');

            $input_data = [
                'AgIdx' => $ag_idx,
                'MemIdx' => $mem_idx,
                'Affiliation' => element('affiliation', $input),
                'Position' => element('position', $input),                  //현 미사용
                'EtcContent1' => element('etc_content1', $input),   //현 미사용
                'EtcContent2' => element('etc_content2', $input),   //현 미사용
                'AttachFileReal' => $upload_result[0]['client_name'],
                'AttachFileName' => $upload_result[0]['file_name'],
                'AttachFilePath' => $this->upload->_upload_url.$file_path.'/',
                'ApplyProducts' => implode(',', element('app_prod_code', $input)),
                'ApplyStatusCcd' => $apply_code,
                'RegIp' => $this->input->ip_address()
            ];
            // 인증 신청정보 등록
            if($this->_conn->set($input_data)->set('PhoneEnc', 'fn_enc("'. element('phone', $input).'")',false)->insert($this->_table['apply']) === false) {
                throw new \Exception('인증 신청에 실패했습니다.');
            }

            // 신청식별자
            $aa_idx = $this->_conn->insert_id();

            // 신청강좌 등록
            foreach (element('app_prod_code', $input) as $key => $val) {
                $input_prod = [
                    'AaIdx' => $aa_idx,
                    'ProdCode'=> $val,
                    'MemIdx' => $mem_idx
                ];
                if($this->_conn->set($input_prod)->insert($this->_table['apply_product']) === false) {
                    throw new \Exception('인증 신청에 실패했습니다.');
                }
            }

            /**
             * 자동승인일 경우 : 주문처리
             */
            if($auth_data['IsAutoApproval'] === 'Y') {

                $this->load->loadModels(['order/orderF', 'crm/smsF']);    //주문, SMS 모델

                //선택 강좌 주문 처리
                if(empty(element('app_prod_code', $input)) === false) {

                    $order_result = $this->orderFModel->procAutoOrder('agive', $aa_idx, element('app_prod_code', $input), $auth_data['PayRouteCcd']);
                    if($order_result !== true) {
                        throw new \Exception('강좌 지급에 실패했습니다.');
                    }
                    //주문식별자 추출
                    $order_condition = array('MemIdx' => $mem_idx, 'PayRouteCcd' => $auth_data['PayRouteCcd'], 'AdminReasonCcd' => '705011', 'AdminEtcReason' =>  '강좌인증식별자=>' . $aa_idx);
                    $order_idx = $this->_conn->select('Max(OrderIdx) as OrderIdx ')->where($order_condition)->get($this->_table['order'])->row(0)->OrderIdx;

                    if($this->_conn->set('OrderIdx', $order_idx)->where('AaIdx', $aa_idx)->update($this->_table['apply']) === false) {
                        throw new \Exception('강좌 지급에 실패했습니다.[주문]');
                    }
                    
                }

                // 문자 발송
                if($auth_data['IsUseSms'] === 'Y' && empty($auth_data['SendTel']) === false && empty($auth_data['SmsContent']) === false ) {
                    if($this->smsFModel->addKakaoMsg(element('phone', $input), $auth_data['SmsContent'], $auth_data['SendTel'], null, 'KFT') === false) {
                        //throw new \Exception('SMS 발송이 실패했습니다.');
                    }
                }
            }

            if($auth_data['IsAutoApproval'] === 'N') {
                $result_mg =  '신청되었습니다. 관리자 확인 후 해당강좌가 지급될 예정입니다.';
            } else {
                $result_mg =  '신청한 강좌가 지급되었습니다. \'내강의실 > 온라인강좌 > 수강중인강좌\' 메뉴에서 수강해 주세요.';
            }

            $this->_conn->trans_commit();
            return  [
                'ret_cd' => true,
                'ret_msg' => $result_mg,
            ];

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

    }

    /**
     * 개인 신청내역 확인 (미승인 / 승인완료)
     * @param array $arr_condition
     * @return bool|mixed|string
     */
    public function findAuthApplyInfo($arr_condition=[])
    {
        $mem_idx = $this->session->userdata('mem_idx');

        $column = 'ApplyStatusCcd';
        $from = '
            from 
                '. $this->_table['apply'] .'
            where IsStatus=\'Y\'
        ';
        $arr_condition = array_merge_recursive($arr_condition, ['EQ' => ['MemIdx' => $mem_idx], 'IN' => ['ApplyStatusCcd' => array_values($this->_apply_ccd)]]);
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $result = $this->_conn->query('select ' . $column . $from . $where . ' Order by AaIdx Desc Limit 1')->row_array();
        return $result;
    }

}