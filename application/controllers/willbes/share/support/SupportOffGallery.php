<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportOffGallery extends BaseSupport
{
    protected $models = array('categoryF', 'support/supportBoardF', 'support/boardAttachF');
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
            ,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name
            ,b.SubjectName,b.CourseName,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
            ,(SELECT COUNT(*) AS cnt FROM lms_board_r_comment AS temp_c WHERE b.BoardIdx = temp_c.BoardIdx AND temp_c.IsStatus = \'Y\' AND temp_c.IsUse = \'Y\') AS TotalCommentCnt
            ,(SELECT COUNT(*) AS cnt FROM lms_board_attach AS temp_f WHERE b.BoardIdx = temp_f.BoardIdx AND temp_f.IsStatus = \'Y\') AS TotalFileCnt
        ';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }
        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, $s_cate_code);
        $paging = $this->pagination($this->_default_path.'/index/?'.$get_page_params,$total_rows,$this->_paging_limit,$paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition, $s_cate_code,$column,$paging['limit'],$paging['offset'],$order_by);
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

    public function show()
    {
        $arr_input = $this->_reqG(null, false);
        $get_params = http_build_query($arr_input);

        $board_idx = element('board_idx',$arr_input);
        $s_cate_code = element('s_cate_code',$arr_input);
        $s_campus = element('s_campus',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);
        $page = element('page',$arr_input);

        $get_params = 's_cate_code='.$s_cate_code.'&s_campus='.$s_campus.'&s_keyword='.$s_keyword;
        $get_params .= '&page='.$page;

        if (empty($board_idx)) {
            show_alert('게시글번호가 존재하지 않습니다.', 'back');
        }

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_site_code
                ,'b.BmIdx' => $this->_bm_idx
                ,'b.IsUse' => 'Y'
            ]
        ];

        $column = '
            b.BoardIdx,b.CampusCcd,b.TypeCcd,b.IsBest,b.AreaCcd
            ,b.Title,b.Content, (b.ReadCnt + b.SettingReadCnt) as TotalReadCnt
            ,b.IsCampus,b.CampusCcd_Name, b.TypeCcd_Name,b.AreaCcd_Name, Category_NameString
            ,b.SubjectName,b.CourseName,b.AttachData,DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm
        ';

        $data = $this->supportBoardFModel->findBoard($board_idx,$arr_condition,$column);
        if (empty($data)) {
            show_alert('게시글이 존재하지 않습니다.', 'back');
        }

        $column_attach = 'a.BoardFileIdx, a.BoardIdx, a.RegType, a.AttachFileType, a.AttachFilePath, a.AttachFileName, a.AttachRealFileName, a.AttachFileSize, a.RegDatm';
        $attach_data = $this->boardAttachFModel->findAttachData($this->_bm_idx, $board_idx, $column_attach);
        $data['AttachData'] = $attach_data;

        $result = $this->supportBoardFModel->modifyBoardRead($board_idx);
        if($result !== true) {
            show_alert('게시글 조회시 오류가 발생되었습니다.', 'back');
        }

        $this->load->view('site/off_info/gallery_show', [
                'default_path' => $this->_default_path,
                'board_idx' => $board_idx,
                'get_params' => $get_params,
                'arr_input' => $arr_input,
                'data' => $data
            ]
        );
    }
}