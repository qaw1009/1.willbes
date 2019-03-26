<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportFaq extends BaseSupport
{
    protected $models = array('support/supportBoardF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = '51';       //bmidx : faq 게시판
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $s_faq = element('s_faq',$arr_input);
        $s_sub_faq = element('s_sub_faq',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        //FAQ구분
        $faq_ccd = $this->supportBoardFModel->listFaqCcd($this->_site_code);
        foreach ($faq_ccd as $idx => $row) {
            $faq_ccd[$idx]['subFaqData']  = json_decode($row['subFaqData'], true);
        }

        //pc일 경우에만 초기값
        if(APP_DEVICE == 'pc' && empty($s_faq) == true) {
            $s_faq = $faq_ccd[0]['Ccd'];
        }

        //FAQ분류
        $faq_sub_ccd = [];
        if (empty($s_faq) === false) {
            $faq_sub_ccd = $this->codeModel->getCcd($s_faq);
        }
        if (empty($faq_sub_ccd) === false && empty($s_sub_faq) === true) {
            $s_sub_faq = array_keys($faq_sub_ccd)[0];
        }

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

        $cate_code = '';
        if ($this->_site_code != config_item('app_intg_site_code')) {
            $cate_code = $this->_cate_code;
        }

        $column = 'b.BoardIdx,b.CampusCcd,b.FaqGroupTypeCcd,b.FaqTypeCcd,b.TypeCcd,b.IsBest,b.AreaCcd
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.IsCampus,b.CampusCcd_Name,b.FaqGroupTypeCcd_Name, b.FaqTypeCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name';
        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }
        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, $cate_code);
        $paging = $this->pagination('/support/faq/index/?s_faq='.$s_faq.'&s_sub_faq='.$s_sub_faq.'&s_keyword='.$s_keyword,$total_rows,$this->_paging_limit,$paging_count,true);
        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false, $arr_condition, $cate_code, $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $key => $row) {
                // 첨부파일 이미지일 경우 해당 배열에 담기
                $list[$key]['Content'] = $this->_getBoardForContent($row['Content'], $row['AttachData']);
            }
        }

        $this->load->view('support/faq', [
            'faq_ccd' => $faq_ccd,
            'faq_sub_ccd' => $faq_sub_ccd,
            's_faq' => $s_faq,
            'arr_input' => $arr_input,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }


}