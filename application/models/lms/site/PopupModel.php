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
            A.PIdx, A.SiteCode, G.SiteName, A.PopUpName, A.PopUpTypeCcd, I.CcdName as PopUpTypeName, A.DispCcd, H.CcdName AS DispName, A.DispStartDatm, A.DispEndDatm,
            A.PopUpFullPath, A.PopUpImgName, A.PopUpImgRealName, A.OrderNum,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['popup']} AS A
            LEFT JOIN (
                SELECT B.PIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['popup_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.PIdx
            ) AS D ON A.PIdx = D.PIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS H ON A.DispCcd = H.Ccd
            INNER JOIN {$this->_table['sys_code']} AS I ON A.PopUpTypeCcd = I.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 팝업 기본 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findPopup($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['popup'], $column, $arr_condition);
    }

    /**
     * 수정 폼 데이터 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findPopupForModify($arr_condition)
    {
        $column = "
            A.PIdx, A.SiteCode, G.SiteName, A.PopUpName, A.PopUpTypeCcd, I.CcdName as PopUpTypeName, A.DispCcd, H.CcdName AS DispName, A.TopPixel, A.LeftPixel, A.Width, A.Height,
            A.DispStartDatm, A.DispEndDatm, DATE_FORMAT(A.DispStartDatm, '%Y-%m-%d') AS DispStartDay, DATE_FORMAT(A.DispStartDatm, '%H') AS DispStartHour,
            A.PopUpFullPath, A.PopUpImgName, A.PopUpImgRealName, A.LinkType, A.LinkUrl, A.OrderNum, A.Desc, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['popup']} AS A
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS H ON A.DispCcd = H.Ccd
            INNER JOIN {$this->_table['sys_code']} AS I ON A.PopUpTypeCcd = I.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 카테고리 연결 데이터 조회
     * @param $p_idx
     * @return array
     */
    public function listPopupCategory($p_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['popup_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.PIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.PIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$p_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 이미지맵 연결 데이터 조회
     * @param $p_idx
     * @return mixed
     */
    public function listPopupImageMap($p_idx)
    {
        $column = "PuiIdx, ImgArea, ImgType, LinkUrl";
        $from = "
            from {$this->_table['popup_imageMap']}
        ";

        $where = ' where PIdx = ? and IsStatus = "Y" and IsStatus = "Y"';
        $order_by_offset_limit = ' order by PIdx asc';

        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit, [$p_idx])->result_array();
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

            if (empty(element('disp_start_datm', $input)) === true) {
                $disp_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $disp_start_datm = element('disp_start_datm', $input) . ' ' . element('disp_start_time', $input) . ':00:00';
            }

            if (empty(element('disp_end_datm', $input)) === true) {
                $disp_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $disp_end_datm = element('disp_end_datm', $input) . ' ' . element('disp_end_time', $input) . ':00:00';
            }

            $data = [
                'SiteCode' => $site_code,
                'DispCcd' => element('popup_disp', $input),
                'PopUpTypeCcd' => element('popup_type', $input),
                'PopUpName' => element('popup_name', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
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

            //카테고리 저장
            if ($site_code != config_item('app_intg_site_code')) {
                $category_code = element('cate_code', $input, []);
                foreach ($category_code as $key => $val) {
                    $category_data['PIdx'] = $p_idx;
                    $category_data['CateCode'] = $val;
                    $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addPopupCategory($category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
                    }
                }
            }

            //이미지맵 저장
            $image_map_types = element('image_map_type', $input);
            $image_map_areas = element('image_map_area', $input);
            $image_map_link_urls = element('image_map_link_url', $input);
            if (count($image_map_types) >= 0) {
                foreach ($image_map_types as $key => $val) {
                    $imageMap_data['PIdx'] = $p_idx;
                    $imageMap_data['ImgType'] = $val;
                    $imageMap_data['ImgArea'] = $image_map_areas[$key];
                    $imageMap_data['LinkUrl'] = $image_map_link_urls[$key];
                    $imageMap_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $imageMap_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addPopupImageMap($imageMap_data) === false) {
                        throw new \Exception('이미지맵 등록에 실패했습니다.');
                    }
                }
            }

            //이미지 등록
            $this->load->library('upload');
            $upload_dir = config_item('upload_prefix_dir') . '/popup/' . date('Y') . '/' . date('md');
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
     * 팝업 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyPopup($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $p_idx = element('p_idx', $input);

            // 기존 배너 기본정보 조회
            $row = $this->findPopup('PIdx, SiteCode, PopUpFullPath, PopUpImgName', ['EQ' => ['PIdx' => $p_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $popup_disp = element('popup_disp', $input);
            $order_num = get_var(element('order_num', $input), $this->_getPopupOrderNum($site_code, $popup_disp));

            if (empty(element('disp_start_datm', $input)) === true) {
                $disp_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $disp_start_datm = element('disp_start_datm', $input) . ' ' . element('disp_start_time', $input) . ':00:00';
            }

            if (empty(element('disp_end_datm', $input)) === true) {
                $disp_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $disp_end_datm = element('disp_end_datm', $input) . ' ' . element('disp_end_time', $input) . ':00:00';
            }

            $data = [
                'DispCcd' => element('popup_disp', $input),
                'PopUpTypeCcd' => element('popup_type', $input),
                'PopUpName' => element('popup_name', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
                'TopPixel' => element('top_pixel', $input),
                'LeftPixel' => element('left_pixel', $input),
                'Width' => element('width_size', $input),
                'Height' => element('height_size', $input),
                'LinkType' => element('link_type', $input),
                'LinkUrl' => element('link_url', $input),
                'IsUse' => element('is_use', $input),
                'OrderNum' => $order_num,
                'Desc' => element('desc', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('PIdx', $p_idx)->update($this->_table['popup']) === false) {
                throw new \Exception('배너 수정에 실패했습니다.');
            }

            /**
             * 이미지맵 수정
             * 1. 기존 데이터 N 업데이트 -> 넘어온 데이터 저장
             * 2. 빈값이 들어올 경우에도 기존 데이터 N 업데이트 진행
             */
            $image_map_types = element('image_map_type', $input);
            $image_map_areas = element('image_map_area', $input);
            $image_map_link_urls = element('image_map_link_url', $input);
            if (count($image_map_types) >= 0) {
                $upd_imageMap_data['PIdx'] = $p_idx;
                $this->_modifyPopupImageMap($upd_imageMap_data);

                foreach ($image_map_types as $key => $val) {
                    $imageMap_data['PIdx'] = $p_idx;
                    $imageMap_data['ImgType'] = $val;
                    $imageMap_data['ImgArea'] = $image_map_areas[$key];
                    $imageMap_data['LinkUrl'] = $image_map_link_urls[$key];
                    $imageMap_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $imageMap_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addPopupImageMap($imageMap_data) === false) {
                        throw new \Exception('이미지맵 수정에 실패했습니다.');
                    }
                }
            }

            //이미지 수정
            $this->load->library('upload');
            $paths = explode('/', $row['PopUpFullPath']);  //날짜 형태의 값만 추출
            $upload_dir = config_item('upload_prefix_dir') . '/popup/' . $paths[5] . '/' . $paths[6];
            /*$upload_dir = config_item('upload_prefix_dir') . '/popup/' . date('Ymd');*/

            $uploaded = $this->upload->uploadFile('file', ['attach_img'], $this->_getAttachImgNames(), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                //기존 파일 삭제
                $this->load->helper('file');
                $real_img_path = public_to_upload_path($row['PopUpFullPath'].$row['PopUpImgName']);
                if (@unlink($real_img_path) === false) {
                    /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                }

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
     * 팝업 일괄 삭제
     * @param array $params
     * @return array|bool
     */
    public function delPopup($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }
            $set_popup_idx = implode(',', array_keys($params));
            $set_popup_optoin_val = implode(',', array_values($params));
            $arr_popup_idx = explode(',', $set_popup_idx);
            $arr_popup_optoin_val = explode(',', $set_popup_optoin_val);
            $set_data = $arr_popup_optoin_val[0];

            $this->_conn->set(['IsUse' => $set_data])->where_in('PIdx',$arr_popup_idx);

            if($this->_conn->update($this->_table['popup'])=== false) {
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
     * 이미지맵 개별 삭제 (N 업데이트)
     * @param $pui_idx
     * @return array|bool
     */
    public function removePopupImageMap($pui_idx)
    {
        try {
            $upd_imageMap_data['PuiIdx'] = $pui_idx;
            if ($this->_modifyPopupImageMap($upd_imageMap_data) === false) {
                throw new \Exception('이미지맵 개별 삭제에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 배너 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyPopupReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $menu_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('PIdx', $menu_idx);

                if ($this->_conn->update($this->_table['popup']) === false) {
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
     * 이미지맵 등록
     * @param $input
     * @return bool
     */
    private function _addPopupImageMap($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['popup_imageMap']) === false) {
                throw new \Exception('이미지맵 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 이미지맵 수정
     * @param $whereData
     * @return bool
     */
    private function _modifyPopupImageMap($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['popup_imageMap']) === false) {
                throw new \Exception('이미지맵 수정에 실패했습니다.');
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