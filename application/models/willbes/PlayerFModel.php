<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerFModel extends WB_Model
{
    private $_table = [
        'sample' => 'lms_product_lecture_sample',
        'unit' => 'wbs_cms_lecture_unit',
        'wbs_code' => 'wbs_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getProfSample($arr_cond)
    {

    }

    /**
     * 강좌코드와 유닛코드로 샘플강좌 데이타 읽어오기
     * @param $ProdCode
     * @param $UnitIdx
     * @return array|int
     */
    public function getLectureSample($ProdCode, $UnitIdx)
    {
        if (empty($ProdCode) === true || empty($UnitIdx) === true) {
            return [];
        }

        $column = 'wSD, wHD, wWD,
            IFNULL(C.wCcdValue, 16) AS wRatio
            ';

        $cond = [
            'EQ' => [
                'S.IsStatus' => 'Y',
                'U.wIsUse' => 'Y',
                'U.wIsStatus' => 'Y',
                'S.ProdCode' => $ProdCode,
                'S.wUnitIdx' => $UnitIdx
            ]
        ];

        $from = " FROM 
            {$this->_table['sample']} AS S
            INNER JOIN {$this->_table['unit']} AS U ON S.wUnitIdx = U.wUnitIdx
            LEFT JOIN {$this->_table['wbs_code']} AS C ON U.wContentSizeCcd = C.wCcd 
        ";

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where);

        return empty($rows) === true ? [] : $rows->row_array();
    }


    public function getCurriculum()
    {

    }

    /**
     * 북마크관리
     */
    public function getBookmark()
    {

    }

    public function storeBookmark()
    {

    }

    public function deleteBookmark()
    {

    }

}