<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseBoard extends \app\controllers\BaseController
{
    public $lms_prof_role_idx = '1011';     //LMS 교수관리자 역할식별자
    protected $models = array('sys/code', 'sys/site', 'sys/category', 'sys/adminSettings');
    protected $helpers = array();
    protected $boardDefaultParams = [];      //게시판 필수 기본 정보

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * bm_id, site_code 기본 셋팅
     */
    protected function setDefaultBoardParam()
    {
        $this->boardDefaultParams = [
            'bm_idx' => $this->_req('bm_idx')
        ];
    }

    /**
     * @return array
     */
    protected function getDefaultBoardParam()
    {
        return $this->boardDefaultParams;
    }

    /**
     * 기본화면 셋팅 값 조회
     * @param $bm_idx
     * @return mixed
     */
    protected function getBoardSearchingArray($bm_idx)
    {
        $search_data = null;
        $arr_search_data = 'null';
        $ret_search_site_code = '';

        if (empty(get_app_var('settings')['searchSetting_'.$bm_idx]) === false) {
            $search_data = get_app_var('settings')['searchSetting_'.$bm_idx];
        }

        if (empty($search_data) === false) {
            $arr_search_data = $search_data;
            $set_search_data = json_decode($search_data, true);
            $ret_search_site_code = (empty($set_search_data['search_site_code']) === true) ? '' : $set_search_data['search_site_code'];
        }

        $return = [
            'arr_search_data' => $arr_search_data,
            'ret_search_site_code' => $ret_search_site_code
        ];
        return $return;
    }

    /**
     * 게시글의 이전글, 다음글
     * @param $bm_idx
     * @param $board_idx
     * @param int $is_best          현재 게시글의 isBest 기준으로 검색
     * @param int $reg_type         사용자 등록글인 경우 isStatus 값 where 절에서 제외
     * @param array $search_datas   검색데이터
     * @param int $ccd_voc          상담게시판
     * @param null $prof_idx        강사게시판
     * @param null $prod_code       강좌코드 [t-pass게시판]
     * @return mixed
     */
    protected function _findBoardPrevious_Next($bm_idx, $board_idx, $is_best = 0, $reg_type = 1, $search_datas = [], $ccd_voc = 0, $prof_idx = null, $prod_code = null){
        $arr_condition = [
            'EQ' => [
                'A.BmIdx' => $bm_idx,
                'A.IsBest' => $is_best,
                'A.ProfIdx' => $prof_idx,
                'A.SiteCode' => element('search_site_code', $search_datas),
                'A.MdCateCode' => element('search_md_cate_code', $search_datas),
                'A.CampusCcd' => element('search_campus_ccd', $search_datas),
                'A.FaqGroupTypeCcd' => element('search_group_faq_ccd', $search_datas),
                'A.FaqTypeCcd' => element('search_faq_type', $search_datas),
                'A.AreaCcd' => element('search_area_ccd', $search_datas),
                'A.SubjectIdx' => element('search_subject', $search_datas),
                'A.IsUse' => element('search_is_use', $search_datas),
                'A.ProdCode' => $prod_code,
            ],
            'ORG' => [
                'LKB' => [
                    'A.Title' => element('search_value', $search_datas),
                    'A.Content' => element('search_value', $search_datas),
                    'A.ReplyContent' => element('search_replay_value', $search_datas),

                    'MEM.MemId' => element('search_member_value', $search_datas),
                    'MEM.MemName' => element('search_member_value', $search_datas),
                    'MEM.Phone3' => element('search_member_value', $search_datas)
                ]
            ],
            'BDT' => ['A.RegDatm' => [element('search_start_date', $search_datas), element('search_end_date', $search_datas)]]
        ];

        if ($reg_type == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['A.IsStatus' => 'Y']);
        }

        if (element('search_chk_vod_value', $search_datas) == 1) {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['A.VocCcd' => $ccd_voc]);
        }

        $sub_query_condition = [
            'EQ' => [
                'subLBrC.IsStatus' => 'Y',
                'subLBrC.CateCode' => element('search_category', $search_datas)
            ]
        ];

        $arr_condition_previous = array_merge($arr_condition, ['LT'=>['A.BoardIdx' => $board_idx]]);
        $data['previous'] = $this->boardModel->findBoardPrevious($arr_condition_previous, $sub_query_condition);

        $arr_condition_next = array_merge($arr_condition, ['GT'=>['A.BoardIdx' => $board_idx]]);
        $data['next'] = $this->boardModel->findBoardNext($arr_condition_next, $sub_query_condition);

        return $data;
    }

    /**
     * 권한유형별 캠퍼스 목록 조회
     * @param $site_code
     * @return array
     */
    protected function _getCampusArray($site_code)
    {
        return $this->siteModel->getSiteCampusArray($site_code);
    }

    /**
     * 권한유형별 운영사이트 목록 조회
     * @return array
     */
    protected function _getSiteArray()
    {
        return $this->siteModel->getSiteArray();
    }

    /**
     * 사이트 목록 조회
     * @param $column
     * @param $param
     * @return array|int
     */
    protected function _listSite($column, $param)
    {
        $arr_condition['EQ']['SiteCode'] = $param;
        return $this->siteModel->listSite($column, $arr_condition);
    }

    /**
     * FAQ GroupCcd 조회
     * @return array
     */
    protected function _getFaqGroupInfo()
    {
        $add_condition = [
            'EQ' => [
                'CcdDesc' => 'faq_use'
            ]
        ];
        return $this->codeModel->getCcd(0,'',$add_condition);
    }

    /**
     * 카테고리 조회
     * @param $site_code
     * @return array
     */
    protected function _getCategoryArray($site_code)
    {
        return $this->categoryModel->getCategoryArray($site_code, '', '', 1);
    }

    /**
     * 그룹공통코드에 해당하는 공통코드 조회
     * @param $group_ccd
     * @return array
     */
    protected function _getCcdArray($group_ccd)
    {
        return $this->codeModel->getCcd($group_ccd);
    }

    protected function _listAllCode($group_ccds = [])
    {
        $arr_condition = [
            'IN' => [
                'GroupCcd' => $group_ccds
            ]
        ];
        return $this->codeModel->listAllCode($arr_condition);
    }

    /**
     * 게시판 등록
     * @param $method
     * @param $inputData
     * @return mixed
     */
    protected function _addBoard($method, $inputData, $idx = '')
    {
        return $this->boardModel->{$method . 'Board'}($inputData);
    }

    /**
     * 게시판 수정
     * @param $method
     * @param $inputData
     * @param string $idx
     * @return mixed
     */
    protected function _modifyBoard($method, $inputData, $idx = '')
    {
        return $this->boardModel->{$method . 'Board'}($inputData, $idx);
    }

    /**
     * 게시판 삭제
     * @param $idx
     * @return bool
     */
    protected function _delete($idx)
    {
        return $this->boardModel->boardDelete($idx);
    }

    /**
     * 게시판 복제
     * @param $board_idx
     * @return array|bool
     */
    protected function _boardCopy($board_idx)
    {
        return $this->boardModel->boardCopy($board_idx);
    }

    /**
     * 게시판 Best 적용
     * @param array $params
     * @return array|bool
     */
    protected function _boardIsBest($params = [])
    {
        return $this->boardModel->boardIsBest($params);
    }

    /**
     * 게시판 사용/미사용 적용
     * @param $is_use_val
     * @param array $target
     * @return array|bool
     */
    protected function _boardIsUse($is_use_val, $target = [])
    {
        return $this->boardModel->boardIsUse($is_use_val, $target);
    }

    /**
     * 파일 삭제
     * @param $attach_idx
     * @return array|bool
     */
    protected function _removeFile($attach_idx)
    {
        return $this->boardModel->removeFile($attach_idx);
    }

    /**
     * @param $arr_condition
     * @return array|bool
     */
    protected function _getUnAnswerArray($arr_condition)
    {
        return $this->boardModel->getUnAnswerArray($arr_condition);
    }

    /**
     * 기존 교수 기본정보 조회
     * @param $prof_idx
     * @return array
     */
    protected function _findProfessor($prof_idx)
    {
        $arr_condition = [
            'EQ' => [
                'a.ProfIdx' => $prof_idx,
                'a.IsStatus' => 'Y'
            ]
        ];
        return $this->professorModel->findProfessorDetail('a.ProfNickName, a.SiteCode, b.SiteName, c.CateCode, c.CateName', $arr_condition);
    }

    /**
     * 과목 기본 정보
     * @return array
     */
    protected function _getSubjectArray()
    {
        return $this->subjectModel->getSubjectArray();
    }

    /**
     * 과정 기본 정보
     * @return array
     */
    protected function _getCourseArray()
    {
        return $this->courseModel->getCourseArray();
    }

    /**
     * 교수 기본 정보
     * @return array
     */
    protected function _getProfessorArray()
    {
        return $this->professorModel->getProfessorArray();
    }

    /**
     * 상품 정보 조회
     * @param $arr_condition
     * @param $column
     * @return mixed
     */
    protected function findProductForStudyBoard($arr_condition, $column)
    {
        return $this->lectureModel->findProductForStudyBoard($arr_condition, $column);
    }

    /**
     * MAX 정렬 값 조회
     * @param $arr_condition
     * @return mixed
     */
    protected function getMaxOrderNum($arr_condition)
    {
        return $this->boardModel->getMaxOrderNumData($arr_condition);
    }

    /**
     * 첨부파일 다운로드
     * @param array $fileinfo
     */
    protected function _download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }

    /**
     * 게시판 내용 재가공 처리
     * @param $content
     * @param $file_path
     * @param $file_name
     * @param $cnt
     * @return string
     */
    protected function _getBoardForContent($content, $file_path, $file_name, $cnt = 2)
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
}