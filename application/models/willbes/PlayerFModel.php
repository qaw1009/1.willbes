<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerFModel extends WB_Model
{
    private $_table = [
        'sample' => 'lms_product_lecture_sample',
        'lecture' => 'lms_product_lecture',
        'mstlec' => 'wbs_cms_lecture',
        'unit' => 'wbs_cms_lecture_unit_combine',
        'wbs_code' => 'wbs_sys_code',
        'bookmark' => 'lms_bookmark'
    ];

    public function __construct()
    {
        parent::__construct('lms');
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
        return empty($rows) === true ? [] : $rows->row_array();
    }

    /**
     * 북마크관리
     */
    public function getBookmark($input)
    {
        $query = "SELECT * FROM {$this->_table['bookmark']} ";
        $cond = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'prodCode' => element('sp', $input),
                'wLecIdx' =>  element('l', $input),
                'wUnitIdx' =>  element('u', $input)
            ]
        ];

        $where = $this->_conn->makeWhere($cond);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query($query . $where . ' ORDER BY bmIdx DESC');

        return empty($rows) === true ? [] : $rows->result_array();

    }

    public function storeBookmark($input)
    {
        $input = [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'ProdCode' => element('p', $input),
            'wLecIdx' => element('l', $input),
            'wUnitIdx' => element('u', $input),
            'Time' => element('bmtime', $input),
            'Title' => element('bmtitle', $input)
        ];
        try {
            if($this->_conn->set($input)->insert($this->_table['bookmark']) === false){
                throw new \Exception('북마크저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    public function deleteBookmark($input)
    {
        $where = [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'bmIdx' => element('bmidx', $input)
        ];

        try {
            if($this->_conn->delete($this->_table['bookmark'], $where) === false){
                throw new \Exception('북마크삭제에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    public function storeStudyLog($input)
    {

    }

    public function updateStudyLog($input)
    {

    }

}