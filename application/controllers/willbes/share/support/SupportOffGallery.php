<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportOffGallery extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $get_params = http_build_query($arr_input);

        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = '&s_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;

        //카테고리목록
        $arr_base['category'] = $this->categoryFModel->listSiteCategory($this->_site_code);

        //캠퍼스목록
        $arr_base['campus'] = $this->supportBoardFModel->listCampusCcd($this->_site_code);

        $arr_condition = [
            'EQ' => [
                'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
                ,'b.SiteCode' => $this->_site_code
                ,'b.CampusCcd' => $s_campus

            ],
            'LKB' => [
                'Category_String'=>$s_cate_code
            ],
            'ORG' => [
                'LKB' => [
                    'b.Title' => $s_keyword
                    ,'b.Content' => $s_keyword
                ]
            ]
        ];

        $column = '
            b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
            ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
            ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
            ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
            ,(SELECT COUNT(*) AS cnt FROM lms_board_r_comment AS temp_c WHERE b.BoardIdx = temp_c.BoardIdx) AS TotalCommentCnt
            ,(SELECT COUNT(*) AS cnt FROM lms_board_attach AS temp_f WHERE b.BoardIdx = temp_f.BoardIdx) AS TotalFileCnt
        ';
        $order_by = ['b.IsBest'=>'Desc','b.BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }
        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,$column,$paging['limit'],$paging['offset'],$order_by);
            foreach ($list as $idx => $row) {
                $list[$idx]['AttachData'] = json_decode($row['AttachData'],true);       //첨부파일
            }
        }

        $this->load->view('site/off_info/gallery', [
            'default_path' => $this->_default_path,
            'arr_base' => $arr_base,
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list'=>$list,
            'paging' => $paging
        ]);
    }
}