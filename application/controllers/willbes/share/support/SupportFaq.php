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

        $s_faq = $this->_reqG('s_faq');
        $s_sub_faq = $this->_reqG('s_sub_faq');

        if($s_faq === null) {
            $s_faq = $faq_ccd[0]['Ccd'];    //초기값
        }

        $is_campus = ($s_faq === '628') ? 'Y' : 'N'; //학원수강일경우 view단 캠퍼스 노출 여부

        $list = [];

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.FaqGroupTypeCcd' => $s_faq
                ,'b.FaqTypeCcd' => $s_sub_faq
            ]
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.FaqGroupTypeCcd,b.FaqTypeCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content,b.ReadCnt,b.SettingReadCnt
                       ,b.CampusCcd_Name,b.FaqGroupTypeCcd_Name, b.FaqTypeCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,b.AttachData
                       ';

        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition);

        $paging = $this->pagination('/support/faq/index/?s_faq='.$s_faq.'&s_sub_faq='.$s_sub_faq,$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
        }

        $this->load->view('support/faq', [
            'faq_ccd' => $faq_ccd,
            's_faq' => $s_faq,
            's_sub_faq' => $s_sub_faq,
            'list'=>$list,
            'paging' => $paging,
            'is_campus' => $is_campus
        ]);
    }



}