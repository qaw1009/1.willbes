<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchBoardComment extends \app\controllers\BaseController
{
    protected $models = array('board/board');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 게시판 댓글 리스트 공통 ajax 리스트
     * @param array $params
     * @return CI_Output
     */
    public function listAjax($params = [])
    {
        $board_idx = $params[0];
        $search_data = $this->_reqP(null, false);

        $arr_condition = [
            'EQ' => [
                'a.BoardIdx' => $board_idx,
                'a.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'b.MemName' => element('search_comment_value', $search_data),
                    'b.MemId' => element('search_comment_value', $search_data)
                ]
            ]
        ];

        $column = '
            a.BoardCmtIdx, a.BoardIdx, a.RegType, a.Comment, a.IsUse, a.IsStatus, a.RegDatm, a.RegNickName, a.RegMemIdx, a.RegAdminIdx, a.RegIp, a.UpdDatm, a.UpdMemIdx, a.UpdAdminIdx, a.UpdAdminDatm,
            b.MemId, b.MemName, c.wAdminName AS RegAdminName, d.wAdminName AS UpdAdminName
        ';

        $list = [];
        $count = $this->boardModel->listAllBoardForComment(true, $arr_condition);

        if ($count > 0) {
            $list = $this->boardModel->listAllBoardForComment(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.BoardCmtIdx' => 'DESC'], $column);
        }

        //XSS 방지
        if(empty($list) === false) {
            foreach ($list as $key => $val) {
                if(empty($val['Comment']) === false) $list[$key]['Comment'] = htmlspecialchars($val['Comment']);
                if(empty($val['RegNickName']) === false) $list[$key]['RegNickName'] = htmlspecialchars($val['RegNickName']);
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function update()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '상태값', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->boardModel->boardIsUseForComment(json_decode($this->_reqP('params'), true), $this->_reqP('is_use'));
        $this->json_result($result, '적용 되었습니다.', $result);
    }
}