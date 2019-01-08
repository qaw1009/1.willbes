<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnAirFModel extends WB_Model
{
    private $_table = [
        'onair' => 'lms_onair',
        'onair_date' => 'lms_onair_date',
        'onair_title' => 'lms_onair_title',
        'onair_member_play_log' => 'lms_onair_member_play_log',
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
                left join ' . $this->_table['onair_title'] . ' as OTP
                    on O.OaIdx = OTP.OaIdx and OTP.TitleType = "P" and OTP.IsStatus = "Y"
                inner join ' . $this->_table['live_video'] . ' as V
                    on O.CIdx = V.CIdx and V.SiteCode = O.SiteCode and V.CampusCcd = O.CampusCcd
                inner join ' . $this->_table['classroom'] . ' as CR
                    on V.CIdx = CR.CIdx
                    
                LEFT JOIN (
                    SELECT OaIdx, GROUP_CONCAT(Title,\'|\') AS Title
                    FROM ' . $this->_table['onair_title'] . '
                    WHERE TitleType = \'O\' AND IsStatus = \'Y\'
                    GROUP BY OaIdx
                ) AS OTO ON O.OaIdx = OTO.OaIdx
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

    /**
     * 동영상 플레이 횟수 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getUserPlayCount($arr_condition)
    {
        $column = 'PlayCount';
        $from = "
            FROM {$this->_table['onair_member_play_log']}
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row_array();
    }

    /**
     * 동영상플레이 로그 저장
     * @param $input_data
     * @return array|bool
     */
    public function addUserPlay($input_data)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_conn->set($input_data)->insert($this->_table['onair_member_play_log']) === false) {
                throw new \Exception('동영상 플레이 로그 저장에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 동영상플레이 로그 업데이트
     * @param $arr_condition
     * @return array|bool
     */
    public function updateUserPlay($arr_condition)
    {
        $this->_conn->trans_begin();
        try {
            $this->_conn->set('PlayCount', 'PlayCount + 1',false)->where($arr_condition);
            if ($this->_conn->update($this->_table['onair_member_play_log']) === false) {
                throw new \Exception('동영상플레이 로그 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}
