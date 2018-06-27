<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PopupModel extends WB_Model
{
    private $_table = [
        'popup' => 'lms_popup',
        'popup_r_category' => 'lms_popup_r_category',
        'popup_imageMap' => 'lms_popup_imagemap',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 배너 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllPopup($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.PIdx, A.SiteCode, G.SiteName, A.PopUpName, A.DispCcd, H.CcdName AS DispName, A.DispStartDatm, A.DispStartTime, A.DispEndDatm, A.DispEndTime,
            A.PopUpFullPath, A.PopUpImgName, A.PopUpImgRealName, A.OrderNum,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['popup']} AS A
            INNER JOIN (
                SELECT B.PIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['popup_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.PIdx
            ) AS D ON A.PIdx = D.PIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS H ON A.DispCcd = H.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 팝업 등록
     * @param array $input
     * @return array|bool
     */
    public function addPopup($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $site_code = element('site_code', $input);
            $popup_disp = element('popup_disp', $input);
            $order_num = get_var(element('order_num', $input), $this->_getPopupOrderNum($site_code, $popup_disp));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'DispCcd' => element('popup_disp', $input),
                'PopUpName' => element('popup_name', $input),
                'DispStartDatm' => element('disp_start_datm', $input),
                'DispStartTime' => element('disp_start_time', $input),
                'DispEndDatm' => element('disp_end_datm', $input),
                'DispEndTime' => element('disp_end_time', $input),
                'TopPixel' => element('top_pixel', $input),
                'LeftPixel' => element('left_pixel', $input),
                'Width' => element('width_size', $input),
                'Height' => element('height_size', $input),
                'LinkType' => element('link_type', $input),
                'LinkUrl' => element('link_url', $input),
                'IsUse' => element('is_use', $input),
                'OrderNum' => $order_num,
                'Desc' => element('desc', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['popup']) === false) {
                throw new \Exception('배너 등록에 실패했습니다.');
            }
            $p_idx = $this->_conn->insert_id();
            $this->_conn->last_query();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['PIdx'] = $p_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addPopupCategory($category_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
                }
            }

            //이미지 등록
            $this->load->library('upload');
            $upload_dir = SUB_DOMAIN . '/popup/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_img'], $this->_getAttachImgNames(), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                $img_data['PopUpFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                $img_data['PopUpImgName'] = $uploaded[0]['orig_name'];
                $img_data['PopUpImgRealName'] = $uploaded[0]['client_name'];

                if ($this->_conn->set($img_data)->where('PIdx', $p_idx)->update($this->_table['popup']) === false) {
                    throw new \Exception('배너 이미지 등록에 실패했습니다.');
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
     * 사이트 코드, 노출섹션 별 정렬순서 값 조회
     * @param $site_code
     * @param $popup_disp
     * @return mixed
     */
    private function _getPopupOrderNum($site_code, $popup_disp)
    {
        return $this->_conn->getFindResult($this->_table['popup'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => [
                'SiteCode' => $site_code,
                'DispCcd' => $popup_disp
            ]
        ])['NextOrderNum'];
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addPopupCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['popup_r_category']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일명 배열 생성
     * @return array
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'popup_' . date('YmdHis');
        return $attach_file_names;
    }
}