<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportMain extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = ['faq'=>'51','notice'=>'45'];       //bmidx

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $faq_ccd = $this->supportBoardFModel->listFaqCcd($this->_site_code);
        foreach ($faq_ccd as $idx => $row) {
            $faq_ccd[$idx]['subFaqData']  = json_decode($row['subFaqData'], true);
        }

        $program_ccd = $this->supportBoardFModel->listProgramCcd();

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.IsUse' => 'Y'
            ],
        ];

        $arr_condition_faq = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx['faq']
                ,'b.IsBest' => '1'
            ],
        ]);

        $arr_condition_notice = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx['notice']
            ],
        ]);


        $column = 'b.BoardIdx,b.CampusCcd,b.FaqGroupTypeCcd,b.FaqTypeCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name,b.FaqGroupTypeCcd_Name, b.FaqTypeCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['b.BoardIdx'=>'desc'];

        $list_faq = $this->supportBoardFModel->listBoard(false,$arr_condition_faq, '',$column,null,null,$order_by);     //best 로 등록된것 모두 가져오기(뷰에서 5개씩 제어 노출)
        $list_notice = $this->supportBoardFModel->listBoard(false,$arr_condition_notice, '',$column,4,null,$order_by);

        $this->load->view('support/main', [
            'faq_ccd' => $faq_ccd,
            'program_ccd' => $program_ccd,
            'list_faq'=>$list_faq,
            'list_notice'=>$list_notice,
        ]);
    }

}