<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PopupFModel extends WB_Model
{
    private $_table = [
        'popup' => 'lms_popup',
        'popup_category' => 'lms_popup_r_category',
        'popup_imagemap' => 'lms_popup_imagemap'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 코드, 카테고리 코드, 노출섹션에 맞는 팝업 조회
     * @param int $disp_code [노출섹션공통코드]
     * @param int $site_code [사이트코드]
     * @param int $cate_code [대분류 카테고리코드, `0`이면 전체카테고리 노출]
     * @return array
     */
    public function findPopups($disp_code, $site_code, $cate_code = 0)
    {
        $column = 'P.PIdx, P.TopPixel, P.LeftPixel, P.Width, P.Height, P.LinkUrl, P.LinkType, P.PopUpFullPath, P.PopUpImgName
            , (select concat("[", GROUP_CONCAT(JSON_OBJECT("ImgType", ImgType, "ImgArea", ImgArea, "LinkUrl", LinkUrl)), "]")
                from ' . $this->_table['popup_imagemap'] . '
                where PIdx = P.PIdx and IsUse = "Y" and IsStatus = "Y" and ImgType != "default"
            ) as PopUpImgMapData';

        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $site_code,
                'P.DispCcd' => $disp_code,
                'P.IsUse' => 'Y',
                'P.IsStatus' => 'Y'
            ],
            'RAW' => [
                'NOW() between ' => 'P.DispStartDatm and P.DispEndDatm'
            ]
        ];

        if (empty($cate_code) === true) {
            $arr_condition['RAW']['PC.CateCode is '] = 'null';
        } else {
            $arr_condition['EQ']['PC.CateCode'] = $cate_code;
        }

        $order_by = ['P.OrderNum' => 'asc', 'P.PIdx' => 'desc'];

        return $this->_conn->getJoinListResult($this->_table['popup'] . ' as P', 'left', $this->_table['popup_category'] . ' as PC'
            , 'P.PIdx = PC.PIdx and PC.IsStatus = "Y"', $column, $arr_condition, null, null, $order_by);
    }
}
