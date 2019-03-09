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
     * 노출섹션명, 사이트코드, 대분류 카테고리 코드에 맞는 배너 조회
     * @param string|array $disp_name [노출섹션명]
     * @param int $site_code [사이트코드]
     * @param int $cate_code [대분류 카테고리 코드, `0`이면 전체카테고리]
     * @return array
     */
    public function findBanners($disp_name, $site_code, $cate_code = 0)
    {
        if (empty($disp_name) === true || empty($site_code) === true) {
            return [];
        }

        $column = 'B.BIdx, BD.BdIdx, B.BannerName, B.LinkType, B.LinkUrl, B.LinkUrlType, B.BannerFullPath, B.BannerImgName, B.Desc
            , BD.DispName, BD.DispTypeCcd, BD.DispRollingTypeCcd, BD.DispRollingTime';
        $arr_condition = [
            'EQ' => [
                'BD.SiteCode' => $site_code,
                'BD.CateCode' => $cate_code,
                'BD.IsUse' => 'Y',
                'BD.IsStatus' => 'Y',
                'B.IsUse' => 'Y',
                'B.IsStatus' => 'Y'
            ],
            'RAW' => [
                'NOW() between ' => 'B.DispStartDatm and B.DispEndDatm'
            ]
        ];

        if (is_array($disp_name) === true) {
            $arr_condition['IN']['BD.DispName'] = $disp_name;
        } else {
            $arr_condition['EQ']['BD.DispName'] = $disp_name;
        }

        $order_by = ['B.OrderNum' => 'asc'];

        return $this->_conn->getJoinListResult($this->_table['banner'] . ' as B', 'inner', $this->_table['banner_disp'] . ' as BD', 'B.BdIdx = BD.BdIdx',
            $column, $arr_condition, null, null, $order_by);
    }
}
