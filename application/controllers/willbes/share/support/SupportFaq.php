<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportFaq extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '51';       //bmidx : faq 게시판
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $faq_ccd = $this->supportBoardFModel->listFaqCcd();

        foreach ($faq_ccd as $idx=>$row) {
            $faq_ccd[$idx]['subFaqData']  = json_decode($row['subFaqData'], true);
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $s_faq = element('s_faq',$arr_input);
        $s_sub_faq = element('s_sub_faq',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        if($s_faq === null) {
            $s_faq = $faq_ccd[0]['Ccd'];    //초기값
        }

        $list = [];

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.FaqGroupTypeCcd' => $s_faq
                ,'b.FaqTypeCcd' => $s_sub_faq
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.FaqGroupTypeCcd,b.FaqTypeCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name,b.FaqGroupTypeCcd_Name, b.FaqTypeCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.AttachData';

        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition);

        $paging = $this->pagination('/support/faq/index/?s_faq='.$s_faq.'&s_sub_faq='.$s_sub_faq.'&s_keyword='.$s_keyword,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
        }

        $this->load->view('support/faq', [
            'faq_ccd' => $faq_ccd,
            's_faq' => $s_faq,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }


}