<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends \app\controllers\BaseController
{
    protected $models = array('member/manageMember','sys/code');
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $InterestCcd = $this->codeModel->getCcd('718');

        $search_interest = $this->_req('search_interest');
        $Sex = $this->_req("sex");
        (empty($this->_req("search_start_date")) == true) ? $search_start_date = Date('Y-01-01') : $search_start_date = $this->_req("search_start_date");
        (empty($this->_req("search_end_date")) == true) ? $search_end_date = Date('Y-m-d') : $search_end_date = $this->_req("search_end_date");

        (empty($this->_req("search_type")) == true) ? $search_type = 'M' : $search_type = $this->_req("search_type"); ;

        switch($search_type){
            case 'Y':
                $search_type_name = '년도별';
                break;
            case 'M':
                $search_type_name = '월별';
                break;
            case 'W':
                $search_type_name = '주별';
                break;
        }

        $join = array_pluck($this->manageMemberModel->chartData([
            'EQ' => [
                'info.InterestCode' => $search_interest,
                'm.Sex' => $Sex
            ],
            'GTE' => [
                'm.JoinDate' => $search_start_date.' 00:00:00'
            ],
            'LTE' => [
                'm.JoinDate' => $search_end_date.' 23:59:59'
            ]
        ], true, $search_type), 'count', 'date');
        $withdraw = array_pluck($this->manageMemberModel->chartData([
            'EQ' => [
                'info.InterestCode' => $search_interest,
                'm.Sex' => $Sex
            ],
            'GTE' => [
                'l.OutDatm' => $search_start_date.' 00:00:00'
            ],
            'LTE' => [
                'l.OutDatm' => $search_end_date.' 23:59:59'
            ],
            'RAW' => [
                'l.MemIdx IS NOT ' => 'NULL'
            ]
        ], false, $search_type), 'count', 'date');
        foreach ($join as $key => $row){
            $data[$key] = ['join' => $row];
            if(empty($withdraw[$key]) == true){
                $data[$key] = [
                    'join' => $row,
                    'withdraw' => 0];
            } else {
                $data[$key] = [
                    'join' => $row,
                    'withdraw' => $withdraw[$key]];
            }
        }

        $this->load->view('member/chart/list',[
            'InterestCcd' => $InterestCcd,
            'Sex' => $Sex,
            'search_type' => $search_type,
            'search_type_name' => $search_type_name,
            'search_start_date' => $search_start_date,
            'search_end_date' => $search_end_date,
            'search_interest' => $search_interest,
            'data' => $data
        ]);
    }

    public function excel()
    {
        $search_interest = $this->_req('search_interest');
        $Sex = $this->_req("sex");
        (empty($this->_req("search_start_date")) == true) ? $search_start_date = Date('Y-01-01') : $search_start_date = $this->_req("search_start_date");
        (empty($this->_req("search_end_date")) == true) ? $search_end_date = Date('Y-m-d') : $search_end_date = $this->_req("search_end_date");

        (empty($this->_req("search_type")) == true) ? $search_type = 'M' : $search_type = $this->_req("search_type"); ;

        switch($search_type){
            case 'Y':
                $search_type_name = '년도별';
                break;
            case 'M':
                $search_type_name = '월별';
                break;
            case 'W':
                $search_type_name = '주별';
                break;
        }

        $join = array_pluck($this->manageMemberModel->chartData([
            'EQ' => [
                'info.InterestCode' => $search_interest,
                'm.Sex' => $Sex
            ],
            'GTE' => [
                'm.JoinDate' => $search_start_date.' 00:00:00'
            ],
            'LTE' => [
                'm.JoinDate' => $search_end_date.' 23:59:59'
            ]
        ], true, $search_type), 'count', 'date');
        $download_query = $this->manageMemberModel->getLastQuery();

        $withdraw = array_pluck($this->manageMemberModel->chartData([
            'EQ' => [
                'info.InterestCode' => $search_interest,
                'm.Sex' => $Sex
            ],
            'GTE' => [
                'l.OutDatm' => $search_start_date.' 00:00:00'
            ],
            'LTE' => [
                'l.OutDatm' => $search_end_date.' 23:59:59'
            ],
            'RAW' => [
                'l.MemIdx IS NOT ' => 'NULL'
            ]
        ], false, $search_type), 'count', 'date');
        $download_query = $download_query.'||'.$this->manageMemberModel->getLastQuery();

        $i = 0;
        foreach ($join as $key => $row){
            if(empty($withdraw[$key]) == true){
                $data[$i] = [
                    'name' => $key,
                    'join' => $row,
                    'withdraw' => 0];
            } else {
                $data[$i] = [
                    'name' => $key,
                    'join' => $row,
                    'withdraw' => $withdraw[$key]];
            }
            $i++;
        }

        $headers = ['구분','가입자', '탈퇴자'];
        $file_name = '회원통계_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d", time());

        /*----  다운로드 정보 저장  ----*/
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($data)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $data, $headers);
    }

}