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
     * 노출섹션공통코드, 사이트코드, 해당 대분류 카테고리 코드에 맞는 팝업 조회 (전체 카테고리 노출 팝업 포함)
     * @param int $disp_code [노출섹션공통코드]
     * @param int $site_code [사이트코드]
     * @param string $cate_code [대분류 카테고리코드]
     * @param string $campus_ccd [캠퍼스코드]
     * @param int $prof_idx [교수식별자]
     * @return array
     */
    public function findPopups($disp_code, $site_code, $cate_code = null, $campus_ccd = '', $prof_idx = '')
    {
        if (empty($disp_code) === true || empty($site_code) === true) {
            return [];
        }

        $column = 'P.PIdx, P.PopUpTypeCcd, P.DispCcd, P.TopPixel, P.LeftPixel, P.Width, P.Height, P.LinkUrl, P.LinkType, P.PopUpFullPath, P.PopUpImgName
            , (select concat("[", GROUP_CONCAT(JSON_OBJECT("ImgType", ImgType, "ImgArea", ImgArea, "LinkType", LinkType, "LinkUrlType", LinkUrlType, "LinkUrl", LinkUrl)), "]")
                from ' . $this->_table['popup_imagemap'] . '
                where PIdx = P.PIdx and IsUse = "Y" and IsStatus = "Y" and ImgType != "default"
            ) as PopUpImgMapData';

        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $site_code,
                'P.DispCcd' => $disp_code,
                'P.ProfIdx' => $prof_idx,
                //'P.CampusCcd' => $campus_ccd,
                'P.IsUse' => 'Y',
                'P.IsStatus' => 'Y',
                'PC.CateCode' => $cate_code
            ],
            'RAW' => [
                'NOW() between ' => 'P.DispStartDatm and P.DispEndDatm'
            ]
        ];

        if($campus_ccd === 'blank') {
            //$arr_condition['RAW'] = array_merge($arr_condition['RAW'], ['P.CampusCcd IS' => ' NULL']);
            $arr_condition['RAW'] = array_merge($arr_condition['RAW'], ['P.CampusCcd ' => ' ""']);
        } else {
            $arr_condition['EQ'] = array_merge($arr_condition['EQ'], ['P.CampusCcd' => $campus_ccd]);
        }

        $order_by = ['P.OrderNum' => 'asc', 'P.PIdx' => 'desc'];

        if (isset($cate_code) === false) {
            $result = $this->_conn->getListResult($this->_table['popup'] . ' as P', $column, $arr_condition, null, null, $order_by);
        } else {
            $result = $this->_conn->getJoinListResult($this->_table['popup'] . ' as P', 'left', $this->_table['popup_category'] . ' as PC'
                , 'P.PIdx = PC.PIdx and PC.IsStatus = "Y"', $column, $arr_condition, null, null, $order_by);
        }

        return $result;
    }
}
