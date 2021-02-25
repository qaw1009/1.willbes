<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthApply extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/authgive/authGive', 'site/authgive/authGiveApply');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_site_codes(true);
        $def_site_code = key($arr_site_code);

        $arr_apply_status_ccd = $this->codeModel->getCcd(741);  // 승인상태 코드값
        $auth_list = $this->authGiveModel->listAuthGive(false, [], null , null, ['A.AgIdx' => 'DESC']);

        $this->load->view('site/auth_give/apply/index', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'apply_ccd' => $arr_apply_status_ccd,
            'auth_list' => $auth_list,
        ]);
    }

    /**
     * 목록
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $excel = (empty($params) ? null : $params[0]);

        $search_member_opt = $this->_reqP('search_member_opt');
        $search_member = $this->_reqP('search_member');
        $search_product_opt = $this->_reqP('search_product_opt');
        $search_product = $this->_reqP('search_product');

        $arr_condition = [
            'EQ' => [
                'B.SiteCode' => $this->_reqP('search_site_code'),
                'A.ApplyStatusCcd' => $this->_reqP('search_apply_ccd'),
            ],
        ];

        if(empty($search_member) === false) {
            if($search_member_opt === 'A.PhoneEnc') {
                $arr_condition = array_merge_recursive($arr_condition, [
                    'RAW' => [
                        $search_member_opt => ' fn_enc(\''. $search_member .'\')',
                    ]
                ]);
            } else {
                $arr_condition = array_merge_recursive($arr_condition, [
                    'LKB' => [
                        $search_member_opt => $search_member,
                    ]
                ]);
            }
        }

        if(empty($search_product) === false) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'LKB' => [
                    $search_product_opt => $search_product,
                ]
            ]);
        }

        if(empty($excel)) {

            $list = [];
            $count = $this->authGiveApplyModel->listAuthApply(true, $arr_condition);

            if($count > 0) {
                $list = $this->authGiveApplyModel->listAuthApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
            }

            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $list,
            ]);

        } else {

            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $add_column = '
                A.AaIdx,J.MemId, J.MemName, fn_dec(A.PhoneEnc) as Phone, A.Affiliation
                ,concat(\'[\', G.SubjectName , \'] \', H.wProfName_String, \' \',D.ProdName)
                ,A.RegDatm
                ,K.wAdminName as ApprovalAdminName, A.ApprovalDatm
                ,L.wAdminName as CancelAdminName, A.CancelDatm
                ,M.CcdName as ApplyStatus_Name
            ';

            $list = $list = $this->authGiveApplyModel->listAuthApply(false, $arr_condition, null, null, [], $add_column);
            $file_name = '수강인증목록_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');

            $headers = ['신청식별자', '회원명', '회원아이디', '인증시연락처', '신청정보', '신청강좌', '인증신청일', '승인자', '승인일','취소자', '취소일', '승인상태'];

            // export excel
            /*----  다운로드 정보 저장  ----*/
            $download_query = $this->authGiveApplyModel->getLastQuery();

            $this->load->library('approval');
            if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
                show_alert('로그 저장 중 오류가 발생하였습니다.','back');
            }
            /*----  다운로드 정보 저장  ----*/

            $this->load->library('excel');
            $this->excel->exportHugeExcel($file_name, $list, $headers);
        }

    }

    //다운로드
    public function download()
    {
        $filename = urldecode($this->_req('filename', false));
        $filename_ori = urldecode($this->_req('filename_ori',false));
        public_download($filename, $filename_ori);
    }

    /**
     * 승인 / 취소
     * @return CI_Output
     */
    public function change()
    {
        if (empty($this->_reqP('check_idx')) && empty($this->_reqP('check_idx_each'))) {
            return $this->json_error('신청코드가 존재하지 않습니다.');
        }

        $result = $this->authGiveApplyModel->changeAuthApply($this->_reqP(null));

        if($result === true) {
            $this->json_result($result, '수정 되었습니다.', $result);
        } else {
            $this->json_result(false,'',$result);
        }
    }

}