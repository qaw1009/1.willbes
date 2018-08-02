<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerFModel extends WB_Model
{
    private $_table = [
        'banner' => 'lms_banner',
        'banner_disp' => 'lms_banner_disp',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 코드, 카테고리 코드, 노출섹션에 맞는 배너 조회
     * @param $disp_name
     * @param $site_code
     * @param null $cate_code
     * @return array
     */
    public function findBanners($disp_name, $site_code, $cate_code = null)
    {
        $column = 'B.BIdx, BD.BdIdx, B.BannerName, B.LinkType, B.LinkUrl, B.BannerFullPath, B.BannerImgName, BD.DispTypeCcd, BD.DispRollingTypeCcd, BD.DispRollingTime';
        $arr_condition = [
            'EQ' => [
                'BD.SiteCode' => $site_code,
                'BD.CateCode' => $cate_code,
                'BD.DispName' => $disp_name,
                'BD.IsUse' => 'Y',
                'BD.IsStatus' => 'Y',
                'B.IsUse' => 'Y',
                'B.IsStatus' => 'Y'
            ],
            'RAW' => [
                'NOW() between ' => 'B.DispStartDatm and B.DispEndDatm'
            ]
        ];
        $order_by = ['B.OrderNum' => 'asc'];

        return $this->_conn->getJoinListResult($this->_table['banner'] . ' as B', 'inner', $this->_table['banner_disp'] . ' as BD', 'B.BdIdx = BD.BdIdx',
            $column, $arr_condition, null, null, $order_by);
    }
}
