<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorFModel extends WB_Model
{
    private $_table = [
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
    ];

    // 교수 게시판관리 식별자
    private $_bm_idx = [
        'notice' => 63, 'qna' => 66, 'data' => 69
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 교수 목록 조회
     * @param bool|string $column
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param array $arr_add_column
     * @return array|int
     */
    public function listProfessor($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_add_column = [])
    {
        if ($column !== true) {
            // 추가 조회 컬럼
            $add_column = '';
            if (empty($arr_add_column) === false) {
                // 이미 정의된 추가 컬럼
                $arr_define_column = ['ProfReferData' => 'ifnull(fn_professor_refer_data(PF.ProfIdx), "N") as ProfReferData'];

                $arr_make_column = [];
                foreach ($arr_add_column as $col) {
                    // 이미 정의된 추가 컬럼일 경우 그 값을 사용하고 이외에는 전달받은 배열값(컬럼명)을 그대로 사용
                    $arr_make_column[] = isset($arr_define_column[$col]) === true ? $arr_define_column[$col] : $col;
                }

                $add_column = ',' . implode(',', $arr_make_column);
            }

            $column = 'PF.ProfIdx, PF.wProfIdx, PF.SiteCode, WPF.wProfName, PF.ProfNickName, PF.ProfSlogan, PF.UseBoardJson, PF.ProfCurriculum, WPF.wProfProfile, WPF.wBookContent 
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard' . $add_column;
        }

        $arr_condition = array_merge_recursive($arr_condition, [
            'EQ' => ['PF.IsUse' => 'Y', 'PF.IsStatus' => 'Y', 'WPF.wIsUse' => 'Y', 'WPF.wIsStatus' => 'Y']
        ]);

        return $this->_conn->getJoinListResult($this->_table['professor'] . ' as PF', 'inner', $this->_table['pms_professor'] . ' as WPF', 'PF.wProfIdx = WPF.wProfIdx'
            , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 단일교수 조회
     * @param $prof_idx
     * @param bool $is_refer
     * @return array
     */
    public function findProfessorByProfIdx($prof_idx, $is_refer = true)
    {
        $arr_add_column = ($is_refer === true) ? ['ProfReferData'] : null;
        $arr_condition = ['EQ' => ['PF.Profidx' => $prof_idx]];

        $data = $this->listProfessor(false, $arr_condition, null, null, [], $arr_add_column);

        return element('0', $data, []);
    }

    /**
     * 교수별 수강후기 게시판 데이터 조회
     * @param $prof_idx
     * @param $site_code
     * @param $cate_code
     * @param $subject_idx
     * @param $limit_cnt
     * @return array
     */
    public function findProfessorStudyCommentData($prof_idx, $site_code, $cate_code, $subject_idx, $limit_cnt)
    {
        $query = 'select ifnull(fn_professor_study_comment_data(?, ?, ?, ?, ?), "N") as StudyCommentData';
        
        // 쿼리 실행
        $query = $this->_conn->query($query, [$prof_idx, $site_code, $cate_code, $subject_idx, $limit_cnt]);

        return array_get($query->result_array(), '0.StudyCommentData', []);
    }
}
