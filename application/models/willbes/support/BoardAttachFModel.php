<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardAttachFModel extends WB_Model
{
    protected $_table = [
        'lms_board' => 'lms_board',
        'board_attach' => 'lms_board_attach'
    ];
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 갤러리 게시판 첨부파일 조회
     * @param $bm_idx
     * @param $board_idx
     * @param string $column
     * @return mixed
     */
    public function findAttachData($bm_idx, $board_idx, $column = '*')
    {
        $arr_condition_1 = [
            'RAW' => ['a.BoardIdx = ' => $this->_conn->escape($board_idx)],
            'EQ' => ['a.IsStatus' => 'Y']
        ];
        $where_main = $this->_conn->makeWhere($arr_condition_1);
        $where_main = $where_main->getMakeWhere(false);

        $arr_condition_2 = [
            'RAW' => ['BoardIdx' => $this->_conn->escape($board_idx), 'BmIdx = ' => $this->_conn->escape($bm_idx),],
            'EQ' => ['IsStatus' => 'Y', 'IsUse' => 'Y']
        ];
        $where_sub = $this->_conn->makeWhere($arr_condition_2);
        $where_sub = $where_sub->getMakeWhere(false);

        $from = "
            FROM {$this->_table['board_attach']} as a
            INNER JOIN (
                SELECT BoardIdx FROM {$this->_table['lms_board']} {$where_sub}
            ) AS b ON a.BoardIdx = b.BoardIdx
        ";

        $query = $this->_conn->query('select STRAIGHT_JOIN ' . $column . $from . $where_main);
        return $query->result_array();
    }
}