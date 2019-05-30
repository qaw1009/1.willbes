<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProfTcc extends  BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF', 'categoryF', '_lms/sys/site');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 5;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $arr_base = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $prof_idx = element('prof_idx',$arr_input);
        $subject_idx = element('subject_idx',$arr_input);
        $view_type = element('view_type',$arr_input);
        $get_page_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_page_params .= '&prof_idx='.$prof_idx.'&subject_idx='.$subject_idx;
        $get_page_params .= '&view_type='.$view_type;

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = 'b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd, b.VideoUrl
                       ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
                       ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
                       ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm,
                       IF(IsCampus=\'Y\',\'학원\',\'온라인\') AS CampusType_Name
                       ';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];
        $paging_count = $this->_paging_count;
        $total_rows = $this->supportBoardFModel->listBoardForProf(true, $this->_site_code, $prof_idx, $arr_condition, '');
        $paging = $this->pagination($this->_default_path.'/tcc/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoardForProf(false, $this->_site_code, $prof_idx, $arr_condition, '', $column, $paging['limit'], $paging['offset'], $order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('support/'.$view_type.'/tcc', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list'=>$list,
            'paging' => $paging,
        ]);
    }
}