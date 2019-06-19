<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/site/supporters/BaseSupporters.php';

class Notice extends BaseSupporters
{
    protected $temp_models = array('board/board', 'board/boardSupporters');
    protected $helpers = array('download','file');
    private $bm_idx = 103;
    private $site_code = '';
    private $_reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    private $_attach_reg_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    /**
     * 서포터즈 공지사항 리스트
     */
    public function index()
    {
        $arr_base['def_site_code'] = '2001';
        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();
        $this->load->view('site/supporters/notice/index', ['arr_base' => $arr_base]);
    }

    public function listAjax()
    {
        $this->site_code = $this->_reqP('search_site_code');

        $arr_condition = [
            'EQ' => [
                'LB.BmIdx' => $this->bm_idx,
                'LB.IsStatus' => 'Y',
                'SP.SupportersIdx' => $this->_reqP('search_supporters_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'LB.Title' => $this->_reqP('search_value'),
                    'LB.Content' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['LB.IsBest' => '0']);
        }

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['LB.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, ADMIN.wAdminName,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber
        ';

        $list = [];
        $count = $this->boardSupportersModel->listAllNoticeForSupporters(true, $arr_condition, $this->site_code);

        if ($count > 0) {
            $list = $this->boardSupportersModel->listAllNoticeForSupporters(false, $arr_condition, $this->site_code, $this->_reqP('length'), $this->_reqP('start'), ['LB.IsBest' => 'desc', 'LB.BoardIdx' => 'desc'], $column);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 게시글 복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'board_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->boardCopy($this->_reqP('board_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * BEST 적용
     */
    public function storeIsBest()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->boardIsBest(json_decode($this->_reqP('params'), true));
        /*$result = $this->_boardIsBest(json_decode($this->_reqP('params'), true));*/
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 서포터즈 공지사항 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $board_idx = null;

        $arr_base['arr_site_code'] = $this->_listSite();
        $arr_base['arr_supporters_data'] = $this->_getSupportersData();

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName,
            LB.SupportersIdx, SP.SupportersYear, SP.SupportersNumber
            ';
            $method = 'PUT';
            $board_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'LB.BoardIdx' => $board_idx,
                    'LB.IsStatus' => 'Y'
                ]
            ]);
            $arr_condition_file = [
                'reg_type' => $this->_reg_type['admin'],
                'attach_file_type' => $this->_attach_reg_type['default']
            ];
            $data = $this->boardSupportersModel->findNoticeForSupporters($column, $arr_condition, $arr_condition_file);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
            $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
            $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
            $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
            $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);
        }

        $this->load->view("site/supporters/notice/create", [
            'method' => $method,
            'arr_base' => $arr_base,
            'data' => $data,
            'board_idx' => $board_idx,
            'arr_reg_type' => $this->_reg_type,
            'attach_file_cnt' => $this->boardSupportersModel->_attach_img_cnt
        ]);
    }

    /**
     * 서포터즈 공지사항 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'supporters_idx', 'label' => '서포터즈', 'rules' => 'trim|required'],
            ['field' => 'title', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        $inputData = $this->_setInputData($this->_reqP(null, false));

        //_addBoard, _modifyBoard
        $result = $this->boardSupportersModel->{$method . 'NoticeForSupporters'}($inputData, $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 서포터즈 공지게시판 Read 페이지
     * @param array $params
     */
    public function read($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $column = '
            LB.BoardIdx, LB.RegType, LB.SiteCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName, ADMIN2.wAdminName AS UpdAdminName, LB.UpdDatm,
            LB.SupportersIdx, SP.Title AS SupportersTitle, SP.SupportersYear, SP.SupportersNumber
            ';
        $board_idx = $params[0];
        $arr_condition = ([
            'EQ'=>[
                'LB.BoardIdx' => $board_idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $arr_condition_file = [
            'reg_type' => $this->_reg_type['admin'],
            'attach_file_type' => $this->_attach_reg_type['default']
        ];
        $data = $this->boardSupportersModel->findNoticeForSupporters($column, $arr_condition, $arr_condition_file);
        // 첨부파일 이미지일 경우 해당 배열에 담기
        $data['Content'] = $this->_getBoardForContent($data['Content'], $data['AttachFilePath'], $data['AttachFileName']);

        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $query_string = base64_decode(element('q',$this->_reqG(null)));
        $search_datas = json_decode($query_string,true);

        $data_PN = $this->_findBoardPrevious_Next($board_idx, $data['RegType'], $search_datas);
        $board_previous = $data_PN['previous'];     //이전글
        $board_next = $data_PN['next'];             //다음글

        $data['arr_attach_file_idx'] = explode(',', $data['AttachFileIdx']);
        $data['arr_attach_file_path'] = explode(',', $data['AttachFilePath']);
        $data['arr_attach_file_name'] = explode(',', $data['AttachFileName']);
        $data['arr_attach_file_real_name'] = explode(',', $data['AttachRealFileName']);

        $this->load->view("site/supporters/notice/read", [
            'bm_idx' => $this->bm_idx,
            'data' => $data,
            'board_idx' => $board_idx,
            'attach_file_cnt' => $this->boardModel->_attach_img_cnt,
            'board_previous' => $board_previous,
            'board_next' => $board_next,
        ]);
    }

    /**
     * 게시판 삭제
     * @param array $params
     */
    public function delete($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $idx = $params[0];
        $result = $this->_delete($idx);
        $this->json_result($result, '정상 처리 되었습니다.', $result);
    }

    /**
     * 파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 첨부파일 다운로드
     */
    public function download()
    {
        $this->_download();
    }

    private function _setInputData($input){
        $input_data = [
            'SiteCode' => element('site_code', $input),
            'SupportersIdx' => element('supporters_idx', $input),
            'BmIdx' => $this->bm_idx,
            'RegType' => element('reg_type', $input),
            'Title' => element('title', $input),
            'IsBest' => (element('is_best', $input) == '1') ? '1' : '0',
            'Content' => element('board_content', $input),
            'IsUse' => element('is_use', $input),
            'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
            'SettingReadCnt' => element('setting_readCnt', $input),
        ];

        return$input_data;
    }

    /**
     * 게시판 내용 재가공 처리
     * @param $content
     * @param $file_path
     * @param $file_name
     * @param $cnt
     * @return string
     */
    private function _getBoardForContent($content, $file_path, $file_name, $cnt = 2)
    {
        $arr_file_path = explode(',', $file_path);
        $arr_file_name = explode(',', $file_name);

        $tmp_images = '';
        for ($i=0; $i<$cnt; $i++) {
            if (empty($arr_file_path[$i]) === false) {
                $tmp_images .= make_image_tag($arr_file_path[$i] . $arr_file_name[$i]);
            }
        }
        return $tmp_images . $content;
    }

    /**
     * 게시글의 이전글, 다음글
     * @param $board_idx
     * @param int $reg_type         사용자 등록글인 경우 isStatus 값 where 절에서 제외
     * @param array $search_datas   검색데이터
     * @return mixed
     */
    private function _findBoardPrevious_Next($board_idx, $reg_type = 1, $search_datas = []){
        $arr_condition = [
            'EQ' => [
                'A.BmIdx' => $this->bm_idx,
                'A.SiteCode' => element('search_site_code', $search_datas),
                'A.SupportersIdx' => element('search_supporters_idx', $search_datas),
                'A.IsUse' => element('search_is_use', $search_datas)
            ],
            'ORG' => [
                'LKB' => [
                    'A.Title' => element('search_value', $search_datas),
                    'A.Content' => element('search_value', $search_datas)
                ]
            ],
            'BDT' => ['A.RegDatm' => [element('search_start_date', $search_datas), element('search_end_date', $search_datas)]]
        ];

        if ($this->_reqP('search_chk_hot_display') == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['A.IsBest' => '0']);
        }

        if ($reg_type == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['A.IsStatus' => 'Y']);
        }

        $arr_condition_previous = array_merge($arr_condition, ['LT'=>['A.BoardIdx' => $board_idx]]);
        $data['previous'] = $this->boardSupportersModel->findNoticePreviousForSupporters($arr_condition_previous);

        $arr_condition_next = array_merge($arr_condition, ['GT'=>['A.BoardIdx' => $board_idx]]);
        $data['next'] = $this->boardSupportersModel->findNoticeNextForSupporters($arr_condition_next);

        return $data;
    }
}