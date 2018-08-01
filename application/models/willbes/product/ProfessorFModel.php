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
     * @return array|int
     */
    public function listProfessor($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($column !== true || $column == 'refer') {
            $refer_column = $column == 'refer' ? ', ifnull(fn_professor_refer_data(PF.ProfIdx), "N") as ProfReferData' : '';

            $column = 'PF.ProfIdx, PF.wProfIdx, PF.SiteCode, WPF.wProfName, PF.ProfNickName, PF.ProfSlogan, PF.UseBoardJson, PF.ProfCurriculum, WPF.wProfProfile, WPF.wBookContent, WPF.wSampleUrl 
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard' . $refer_column;
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
        $column = ($is_refer === true) ? 'refer' : false;
        $arr_condition = ['EQ' => ['PF.Profidx' => $prof_idx]];

        $data = $this->listProfessor($column, $arr_condition, null, null, []);

        return element('0', $data, []);
    }
}
