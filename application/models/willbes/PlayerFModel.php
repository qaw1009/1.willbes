<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerFModel extends WB_Model
{
    private $_table = [
        'sample' => 'lms_product_lecture_sample',
        'lecture' => 'lms_product_lecture',
        'mstlec' => 'wbs_cms_lecture',
        'unit' => 'wbs_cms_lecture_unit_combine',
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

        $column = '
            ML.wMediaUrl,
            U.wSD, U.wHD, U.wWD,
            IFNULL(C.wCcdValue, 16) AS wRatio
            ';

        $cond = [
            'EQ' => [
                'S.IsStatus' => 'Y',
                'S.ProdCode' => $ProdCode,
                'S.wUnitIdx' => $UnitIdx
            ]
        ];

        $from = " FROM
            {$this->_table['lecture']} AS L
            INNER JOIN {$this->_table['mstlec']} AS ML ON L.wLecIdx = ML.wLecIdx
            INNER JOIN {$this->_table['sample']} AS S ON L.ProdCode = S.ProdCode 
            INNER JOIN {$this->_table['unit']} AS U ON S.wUnitIdx = U.wUnitIdx
            LEFT JOIN {$this->_table['wbs_code']} AS C ON U.wContentSizeCcd = C.wCcd 
        ";

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT STRAIGHT_JOIN ' . $column . $from . $where);
        logger($from);
        return empty($rows) === true ? [] : $rows->row_array();
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