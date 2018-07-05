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
     * 교수 식별자 기준 교수 정보 조회
     * @param string|array $prof_idx
     * @param bool $is_refer
     * @param null|string $site_code
     * @return array
     */
    public function findProfessors($prof_idx, $is_refer = false, $site_code = null)
    {
        $column = 'PF.ProfIdx, PF.wProfIdx, PF.SiteCode, WPF.wProfName, PF.ProfNickName, PF.UseBoardJson, PF.ProfCurriculum, WPF.wProfProfile, WPF.wBookContent
            , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
            , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
            , json_value(PF.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard              
        ';
        $is_refer === true && $column .= ', ifnull(fn_professor_refer_data(ProfIdx), "N") as ProfReferData';

        $arr_condition = [
            'EQ' => ['PF.SiteCode' => $site_code, 'PF.IsUse' => 'Y', 'PF.IsStatus' => 'Y', 'WPF.wIsUse' => 'Y', 'WPF.wIsStatus' => 'Y'],
            'IN' => ['PF.ProfIdx' => (array) $prof_idx]
        ];

        return $this->_conn->getJoinListResult($this->_table['professor'] . ' as PF', 'inner', $this->_table['pms_professor'] . ' as WPF', 'PF.wProfIdx = WPF.wProfIdx'
            , $column, $arr_condition, null, null, []
        );
    }
}
