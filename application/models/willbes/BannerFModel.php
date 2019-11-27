<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerFModel extends WB_Model
{
    private $_table = [
        'banner' => 'lms_banner',
        'banner_disp' => 'lms_banner_disp',
        'banner_imagemap' => 'lms_banner_imagemap'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 노출섹션명, 사이트코드, 대분류 카테고리 코드에 맞는 배너 조회
     * @param string|array $disp_name [노출섹션명 (섹션명 앞에 `GRP:`를 추가하면 언더스코어(_)를 포함하여 후위 섹션명으로 시작(right like)하는 배너 조회)]
     * @param int $site_code [사이트코드]
     * @param int $cate_code [카테고리코드, `0`이면 전체카테고리]
     * @param string $campus_code [캠퍼스공통코드]
     * @return array
     */
    public function findBanners($disp_name, $site_code, $cate_code = 0, $campus_code = '')
    {
        if (empty($disp_name) === true || empty($site_code) === true) {
            return [];
        }

        $column = 'B.BIdx, BD.BdIdx, B.BannerName, B.LinkType, B.LinkUrl, B.LinkUrlType, B.PopWidth, B.PopHeight, B.BannerFullPath, B.BannerImgName, B.Desc
            , BD.DispName, BD.DispTypeCcd, BD.DispRollingTypeCcd, BD.DispRollingTime
            , (SELECT CONCAT("[", GROUP_CONCAT(JSON_OBJECT("ImgType", `ImgType`, "ImgArea", `ImgArea`, "LinkUrl", LinkUrl)), "]")
                FROM '. $this->_table['banner_imagemap'] . '
                WHERE BIdx = B.BIdx AND IsUse = "Y" AND IsStatus = "Y" AND ImgType != "default"
            ) AS BannerImgMapData
            ';
        $arr_condition = [
            'EQ' => [
                'BD.SiteCode' => $site_code,
                'BD.CateCode' => $cate_code,
                'BD.IsUse' => 'Y',
                'BD.IsStatus' => 'Y',
                'B.CampusCcd' => $campus_code,
                'B.IsUse' => 'Y',
                'B.IsStatus' => 'Y'
            ],
            'RAW' => [
                'NOW() between ' => 'B.DispStartDatm and B.DispEndDatm'
            ]
        ];

        // 노출섹션명 조회 조건
        if (is_array($disp_name) === true) {
            $arr_condition['IN']['BD.DispName'] = $disp_name;
        } else {
            if (strpos($disp_name, 'GRP:') !== false) {
                $arr_condition['LKR']['BD.DispName'] = substr($disp_name, 4) . '_';
            } else {
                $arr_condition['EQ']['BD.DispName'] = $disp_name;
            }
        }

        $order_by = ['B.OrderNum' => 'asc'];

        return $this->_conn->getJoinListResult($this->_table['banner'] . ' as B', 'inner', $this->_table['banner_disp'] . ' as BD', 'B.BdIdx = BD.BdIdx',
            $column, $arr_condition, null, null, $order_by);
    }
}
