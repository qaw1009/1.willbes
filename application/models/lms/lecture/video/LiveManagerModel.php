<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiveManagerModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'live_video' => 'lms_lecture_live_video',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listLiveVideo($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'lms_lecture_live_video.LecLiveVideoIdx, lms_lecture_live_video.SiteCode,
                    lms_lecture_live_video.CampusCcd, lms_lecture_live_video.LecRoomName, lms_lecture_live_video.LiveVideoRoute,
                    lms_lecture_live_video.OrderNum, lms_lecture_live_video.IsUse, lms_lecture_live_video.RegDatm, lms_lecture_live_video.RegAdminIdx, lms_site.SiteName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_lecture_live_video.RegAdminIdx and wIsStatus = "Y") as RegAdminName';

        $arr_condition['EQ']['lms_site.IsStatus'] = 'Y';
        $arr_condition['EQ']['lms_lecture_live_video.IsStatus'] = 'Y';
        $arr_condition['IN']['lms_lecture_live_video.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table['live_video'] . ' as lms_lecture_live_video', 'inner', $this->_table['site'] . ' as lms_site'
            , 'lms_lecture_live_video.SiteCode = lms_site.SiteCode' , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 수정 폼을 위한 데이터 조회
     * @param $idx
     * @return array
     */
    public function findLiveVideoForModify($idx)
    {
        $column = 'lms_lecture_live_video.LecLiveVideoIdx, lms_lecture_live_video.SiteCode,
                    lms_lecture_live_video.CampusCcd, lms_lecture_live_video.LecRoomName, lms_lecture_live_video.LiveVideoRoute,
                    lms_lecture_live_video.OrderNum, lms_lecture_live_video.IsUse, lms_lecture_live_video.RegDatm, lms_lecture_live_video.RegAdminIdx, lms_lecture_live_video.UpdDatm, lms_lecture_live_video.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_lecture_live_video.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= ' , if(lms_lecture_live_video.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = lms_lecture_live_video.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['live_video'] . ' as lms_lecture_live_video', $column, [
            'EQ' => ['lms_lecture_live_video.LecLiveVideoIdx' => $idx]
        ]);
    }

    /**
     * 강의 라이브동영상 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addLiveVideo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->_getSubjectOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => element('campus_ccd', $input),
                'LecRoomName' => element('lec_room_name', $input),
                'LiveVideoRoute' => element('live_video_route', $input),
                'OrderNum' => $order_num,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 등록
            if ($this->_conn->set($data)->insert($this->_table['live_video']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyLiveVideoReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $lec_live_video_Idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('LecLiveVideoIdx', $lec_live_video_Idx);

                if ($this->_conn->update($this->_table['live_video']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사이트 코드별 과목 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    private function _getSubjectOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table['live_video'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }
}