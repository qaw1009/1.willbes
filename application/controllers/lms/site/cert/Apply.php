<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'site/cert', 'site/certApply');
    protected $helpers = array('download','file');
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값1

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강인증현황
     */
    public function index()
    {
        //카테고리 조회
        $arr_category = $this->categoryModel->getCategoryArray('', '', '', 1);
        $codes = $this->codeModel->getCcdInArray(['684','685']);

        $arr_search = [
            'search_type' => $this->_req('search_type')
            ,'search_no' => $this->_req('search_no')
        ];

        $this->load->view("site/cert/apply_index", [
            'arr_category' => $arr_category,
            'CertType_ccd' => $codes['684'],
            'CertCondition_ccd' => $codes['685'],
            'arr_search'=>$arr_search
        ]);
    }

    /**
     * 목록
     */
    public function listAjax($params=[])
    {
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->certApplyModel->getEncString($search_value); // 검색어 암호화

        $param_check = '';
        if(empty($params) === false) {
            $param_check = $params[0];
        }


        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.CateCode' => $this->_reqP('search_category'),
                'A.CertTypeCcd' => !empty($this->_reqP('search_type')) ? $this->_reqP('search_type') : '!!!!',          //인증구분이 필수로 있어야 검색함
                'A.CertConditionCcd' =>$this->_reqP('search_condition'),
                'A.No' =>$this->_reqP('search_no'),
                'SA.ApprovalStatus' =>$this->_reqP('search_approval'),
            ],
        ];

        $arr_condition_add = null;

        if($this->_reqP('search_order') === 'Y') {
            $arr_condition = array_merge_recursive($arr_condition, [
                'EQ' => [
                    'op.PayStatusCcd' => '676001'
                ]
            ]);
        } else if($this->_reqP('search_order') === 'N') {
            $arr_condition_add = ' op.PayStatusCcd is null ';
        }

        if(empty($search_value) === false) {
            $arr_condition = array_merge_recursive($arr_condition, [
                'ORG' => [
                    'LKB' => [
                        'F.MemId' => $search_value,
                        'F.MemName' => $search_value,
                    ],
                    'EQ' => [
                        'F.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                        'F.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                        'F.Phone3' => $search_value, // 전화번호 뒷자리
                    ]
                ]
            ]);
        }

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    $this->_reqP('search_date_type') => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }


        if (empty($param_check)) {
            $list = [];
            $count = $this->certApplyModel->listApply(true, $arr_condition, null, null, [], $arr_condition_add);

            if ($count > 0) {
                $list = $this->certApplyModel->listApply(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['SA.RegDatm' => 'desc'], $arr_condition_add);
            }

            return $this->response([
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $list,
            ]);

        }else{

            set_time_limit(0);
            ini_set('memory_limit', $this->_memory_limit_size);

            $list = $this->certApplyModel->listApplyExcel($arr_condition, ['SA.RegDatm' => 'desc'], $arr_condition_add);
            $file_name = '수강인증목록_'.$this->session->userdata('admin_idx').'_'.date('Y-m-d');
            $headers = ['사이트', '카테고리', '인증코드', '인증구분', '회차', '회차명', '회원아이디', '회원명','전화번호', '등록일', '소속/군무기관', '직위/직급/계급', '재직구분/군별', '군번/수강사이트', '응시지역', '응시직렬', '응시번호', '승인자', '승인일', '승인취소자', '승인취소일', '승인여부','추가정보1','추가정보2'];

            // export excel
            /*----  다운로드 정보 저장  ----*/
            $download_query = $this->certApplyModel->getLastQuery();

            $this->load->library('approval');
            if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
                show_alert('로그 저장 중 오류가 발생하였습니다.','back');
            }
            /*----  다운로드 정보 저장  ----*/

            $this->load->library('excel');
            $this->excel->exportHugeExcel($file_name, $list, $headers);
        }
    }

    /**
     * 상세정보 확인
     * @param $info
     */
    public function info($info)
    {
        $CaIdx = $info[0];

        $arr_condition = [
            'EQ' => [
                'SA.CaIdx' => $CaIdx
            ]
        ];

        $data = $this->certApplyModel->listApply(false, $arr_condition, null, null, [],null);
        $data = $data[0];

        $this->load->view('site/cert/apply_info_modal',[
            'data' => $data
        ]);
    }

    /**
     * 승인/취소 변경
     */
    public function change()
    {

        if (empty($this->_reqP('checkIdx')) && empty($this->_reqP('checkIdx_each'))) {
            return $this->json_error('인증 신청코드가 존재하지 않습니다.');
        }

        $result = $this->certApplyModel->changeApply($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '수정 되었습니다.', $result);
    }


    public function download()
    {
        $filename = urldecode($this->_req('filename', false));
        $filename_ori = urldecode($this->_req('filename_ori',false));
        public_download($filename, $filename_ori);
    }
}

