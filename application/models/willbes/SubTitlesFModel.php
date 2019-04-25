<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubTitlesFModel extends WB_Model
{
    private $_table = [
        'predictSubtitles' => 'lms_Predict_subtitles'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 자막데이터 조회
     * @return mixed
     */
    public function getSubTitlesList()
    {
        $arr_condition = [
            'EQ' => [
                'IsUse' => 'Y',
                'IsStatus' => 'Y'
            ]
        ];

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = 'PstIdx, Title, Content, AttachFileFullPath, AttachFileRealName';
        $from = " FROM {$this->_table['predictSubtitles']} ";

        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }
}