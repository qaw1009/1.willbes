<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerFModel extends WB_Model
{
    private $_table = [
        'banner' => 'lms_banner',
        'banner_r_category' => 'lms_banner_r_category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 코드, 카테고리 코드, 노출섹션, 배너위치에 맞는 배너 조회
     * @param $disp_ccd
     * @param $location_ccd
     * @param $site_code
     * @param null $cate_code
     * @return array
     */
    public function findBanners($disp_ccd, $location_ccd, $site_code, $cate_code = null)
    {
        $column = 'B.BIdx, B.BannerName, B.LinkUrl, B.LinkType, B.BannerFullPath, B.BannerImgName';
        $arr_condition = [
            'EQ' => [
                'B.DispCcd' => $disp_ccd,
                'B.BannerLocationCcd' => $location_ccd,
                'B.SiteCode' => $site_code,
                'B.IsUse' => 'Y',
                'B.IsStatus' => 'Y'
            ],
            'RAW' => [
                'NOW() between ' => 'B.DispStartDatm and B.DispEndDatm'
            ]
        ];
        $order_by = ['B.BIdx' => 'desc'];

        if (empty($cate_code) === true) {
            return $this->_conn->getListResult($this->_table['banner'] . ' as B', $column, $arr_condition, null, null, $order_by);
        } else {
            $from = '
                from ' . $this->_table['banner'] . ' as B
                    inner join ' . $this->_table['banner_r_category'] . ' as BC
                        on B.BIdx = BC.BIdx and BC.IsStatus = "Y" and BC.CateCode = ?
            ';
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
            $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();

            $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$cate_code]);
            return $query->result_array();
        }
    }
}
