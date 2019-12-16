<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteCampusModel extends WB_Model
{
    private $_table = [
        'site_campus_info' => 'lms_site_campus_info',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];
    private $_campus_group_ccd = '605';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 캠퍼스 정보 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSiteCampusInfo($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'SC.ScInfoIdx, SC.SiteCode, SC.CampusCcd, SC.DispName, SC.Tel, SC.Addr1, SC.Addr2, SC.MapPath, SC.OrderNum, SC.IsOrigin, SC.IsUse, SC.RegDatm, SC.RegAdminIdx
            , S.SiteName, CC.CcdName as CampusCcdName, A.wAdminName as RegAdminName';

        $from = '
            from ' . $this->_table['site_campus_info'] . ' as SC
                inner join ' . $this->_table['site'] . ' as S
                    on SC.SiteCode = S.SiteCode
                inner join ' . $this->_table['code'] . ' as CC
                    on SC.CampusCcd = CC.Ccd and CC.GroupCcd = "' . $this->_campus_group_ccd . '"
                left join ' . $this->_table['admin'] . ' as A
                    on SC.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where SC.IsStatus = "Y" and S.IsStatus = "Y" and CC.IsStatus = "Y" 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 사이트 캠퍼스 정보 수정 폼을 위한 데이터 조회
     * @param int $scinfo_idx [사이트캠퍼스정보식별자]
     * @return array
     */
    public function findSiteCampusInfoForModify($scinfo_idx)
    {
        $column = 'SC.ScInfoIdx, SC.SiteCode, SC.CampusCcd, SC.DispName, SC.Tel, SC.Addr1, SC.Addr2, SC.MapPath, SC.OrderNum, SC.IsOrigin, SC.IsUse, SC.RegDatm, SC.RegAdminIdx, SC.UpdDatm, SC.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = SC.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= ' , if(SC.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = SC.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['site_campus_info'] . ' as SC', $column, [
            'EQ' => ['SC.ScInfoIdx' => get_var($scinfo_idx, '0')]
        ]);
    }

    /**
     * 사이트 코드별 캠퍼스 정보 다음 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    public function getSiteCampusInfoOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table['site_campus_info'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }

    /**
     * 사이트 캠퍼스 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addSiteCampusInfo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $campus_ccd = element('campus_ccd', $input);
            $map_path = '';

            // 맵이미지 업로드
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/site/' . $site_code;
            $map_img_name = 'map_' . $site_code . '_' . substr($campus_ccd, 3) . '_' . time();

            $uploaded = $this->upload->uploadFile('img', ['map_img'], [$map_img_name], $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (empty($uploaded[0]['file_name']) === false) {
                $map_path = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
            }

            // 데이터 저장
            $data = [
                'SiteCode' => $site_code,
                'CampusCcd' => $campus_ccd,
                'DispName' => element('disp_name', $input),
                'Tel' => element('tel', $input),
                'Addr1' => element('addr1', $input),
                'Addr2' => element('addr2', $input),
                'MapPath' => $map_path,
                'OrderNum' => get_var(element('order_num', $input), $this->getSiteCampusInfoOrderNum($site_code)),
                'IsOrigin' => element('is_origin', $input, 'N'),
                'IsUse' => element('is_use', $input, 'Y'),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['site_campus_info']) === false) {
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
     * 사이트 캠퍼스 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySiteCampusInfo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $scinfo_idx = element('idx', $input);   // 사이트 캠퍼스 정보 식별자
            $campus_ccd = element('campus_ccd', $input);
            $map_path = '';

            // 기존 사이트 캠퍼스 정보 조회
            $row = $this->findSiteCampusInfoForModify($scinfo_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 맵이미지 업로드
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/site/' . $row['SiteCode'];
            $map_img_name = 'map_' . $row['SiteCode'] . '_' . substr($campus_ccd, 3) . '_' . time();

            $uploaded = $this->upload->uploadFile('img', ['map_img'], [$map_img_name], $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (empty($uploaded[0]['file_name']) === false) {
                $map_path = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
            }

            // 데이터 수정
            $data = [
                'CampusCcd' => $campus_ccd,
                'DispName' => element('disp_name', $input),
                'Tel' => element('tel', $input),
                'Addr1' => element('addr1', $input),
                'Addr2' => element('addr2', $input),
                'OrderNum' => get_var(element('order_num', $input), $this->getSiteCampusInfoOrderNum($row['SiteCode'])),
                'IsOrigin' => element('is_origin', $input, 'N'),
                'IsUse' => element('is_use', $input, 'Y'),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 신규 맵이미지가 있을 경우
            if (empty($map_path) === false) {
                // 기존 맵이미지 삭제
                $org_map_path = public_to_upload_path($row['MapPath']);

                if (is_file($org_map_path) === true && file_exists($org_map_path) === true) {
                    if (@unlink($org_map_path) === false) {
                        throw new \Exception('기존 맵이미지 삭제에 실패했습니다.');
                    }
                }

                // 맵이미지 데이터 수정
                $data['MapPath'] = $map_path;
            }

            if ($this->_conn->set($data)->where('ScInfoIdx', $scinfo_idx)->update($this->_table['site_campus_info']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 사이트 캠퍼스 정보 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifySiteCampusInfoReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $scinfo_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('ScInfoIdx', $scinfo_idx);

                if ($this->_conn->update($this->_table['site_campus_info']) === false) {
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
}
