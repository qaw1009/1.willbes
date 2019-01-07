<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAirFModel extends WB_Model
{
    private $_table = [
        'onair' => 'lms_onair',
        'onair_date' => 'lms_onair_date',
        'onair_title' => 'lms_onair_title',
        'live_video' => 'lms_live_video',
        'classroom' => 'lms_classroom',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 금일 노출되는 온에어 조회
     * @param int $site_code [사이트코드]
     * @param array $arr_condition [추가 조회조건]
     * @return array
     */
    public function getLiveOnAir($site_code, $arr_condition = [])
    {
        if (empty($site_code) === true) {
            return [];
        }

        $column = 'O.OaIdx, O.LoginType, DATE_FORMAT(O.OnAirStartTime, \'%H:%i\') AS OnAirStartTime, DATE_FORMAT(O.OnAirEndTime, \'%H:%i\') AS OnAirEndTime, O.OnAirName, O.OnAirTabName, O.VideoPlayTime, O.VideoPlayCount
            , O.LeftExposureType, O.LeftFileName, O.LeftFileFullPath, O.LeftLink, O.RightExposureType, O.RightFileName, O.RightFileFullPath, O.RightLink
            , OTO.Title as OnAirTitle, OTP.ProfIdx, OTP.Title as ProfTitle
            , if(OTP.ProfIdx is not null, ifnull(json_value(fn_professor_refer_data(OTP.ProfIdx), "$.prof_index_img"), ""), "") as ProfImgFullPath
            , V.LiveVideoRoute
            ';

        $from = '
            from ' . $this->_table['onair'] . ' as O
                inner join ' . $this->_table['onair_date'] . ' as OD
                    on O.OaIdx = OD.OaIdx
                left join ' . $this->_table['onair_title'] . ' as OTO
                    on O.OaIdx = OTO.OaIdx and OTO.TitleType = "O" and OTO.IsStatus = "Y"
                left join ' . $this->_table['onair_title'] . ' as OTP
                    on O.OaIdx = OTP.OaIdx and OTP.TitleType = "P" and OTP.IsStatus = "Y"
                inner join ' . $this->_table['live_video'] . ' as V
                    on O.CIdx = V.CIdx and V.SiteCode = O.SiteCode and V.CampusCcd = O.CampusCcd
                inner join ' . $this->_table['classroom'] . ' as CR
                    on V.CIdx = CR.CIdx
            where O.SiteCode = ?
                and (O.OnAirStartType = "A" or DATE_FORMAT(NOW(), "%H:%i:%s") between O.OnAirStartTime and O.OnAirEndTime)
                and O.IsUse = "Y" and O.IsStatus = "Y"
                and OD.OnAirDate = DATE_FORMAT(NOW(), "%Y-%m-%d")
                and OD.IsUse = "Y" and OD.IsStatus = "Y"
                and V.IsStatus = "Y" and V.IsUse = "Y" and CR.IsStatus = "Y" and CR.IsUse = "Y"';

        // where 조건
        $where = '';
        if (empty($arr_condition) === false) {
            $where .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        }

        $order_by = ' order by O.OaIdx desc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$site_code]);

        return $query->result_array();
    }
}
