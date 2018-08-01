<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerFModel extends WB_Model
{
    private $_table = [
        'sample' => 'lms_product_lecture_sample',
        'unit' => 'wbs_cms_lecture_unit'
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
        if(empty($ProdCode) === true || empty($UnitIdx) === true){
            return [];
        }

        $cond = [
            'EQ' => [
                'PLS.IsStaus' => 'Y',
                'WCLU.wIsUse' => 'Y',
                'WCLU.wIsStatus' => 'Y',
                'PLS.ProdCode' => $ProdCode,
                'PLS.wUnitIdx' => $UnitIdx
            ]
        ];

        return $this->_conn->getJoinListResult(
            $this->_table['sample'] . ' AS PLS ',
            'inner',
            $this->_table['unit'] . ' AS WCLU ',
            'PLS.wUnitIdx = WCLU.wUnitIdx',
            'wSD, wHD, wWD ', $cond, null, null, null);
    }
}