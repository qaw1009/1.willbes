<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerRegistModel extends WB_Model
{
    private $_table = [
        'banner' => 'lms_banner',
        'banner_disp' => 'lms_banner_disp',
        'banner_imageMap' => 'lms_banner_imagemap',
        'event_lecture' => 'lms_event_lecture',
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
    public function listAllBanner($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.BIdx, A.SiteCode, A.CateCode, A.CampusCcd, A.BdIdx, A.BannerName, A.LinkUrlType, A.DispStartDatm, A.DispEndDatm,
            A.BannerFullPath, A.BannerImgName, A.BannerImgRealName, A.OrderNum,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            B.SiteName, IFNULL(E.CateName,"전체카테고리") AS CateName, F.DispName,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName,
            fn_ccd_name(A.CampusCcd) AS CampusCcdName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['banner']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            LEFT JOIN {$this->_table['sys_category']} AS E ON A.CateCode = E.CateCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
            INNER JOIN {$this->_table['banner_disp']} AS F ON A.BdIdx = F.BdIdx
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 배너 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findBanner($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['banner'], $column, $arr_condition);
    }

    public function findBannerForModify($arr_condition)
    {
        $column = "
            A.BIdx, A.SiteCode, A.CateCode, A.CampusCcd, A.BdIdx, A.BannerName, A.LinkUrlType, A.DispStartDatm, A.DispEndDatm,
            DATE_FORMAT(A.DispStartDatm, '%Y-%m-%d') AS DispStartDay, DATE_FORMAT(A.DispStartDatm, '%H') AS DispStartHour,
            DATE_FORMAT(A.DispEndDatm, '%Y-%m-%d') AS DispEndDay, DATE_FORMAT(A.DispEndDatm, '%H') AS DispEndHour,
            A.BannerFullPath, A.BannerImgName, A.BannerImgRealName, A.LinkType, A.LinkUrl, A.PopWidth, A.PopHeight, A.OrderNum, A.Desc, A.IsUse,
            A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            B.SiteName, E.CateName, F.DispName,
            C.wAdminName AS RegAdminName, D.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['banner']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            LEFT JOIN {$this->_table['sys_category']} AS E ON A.CateCode = E.CateCode
            INNER JOIN {$this->_table['admin']} AS C ON A.RegAdminIdx = C.wAdminIdx AND C.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS D ON A.UpdAdminIdx = D.wAdminIdx AND D.wIsStatus='Y'
            INNER JOIN {$this->_table['banner_disp']} AS F ON A.BdIdx = F.BdIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 이미지맵 연결 데이터 조회
     * @param $b_idx
     * @return mixed
     */
    public function listBannerImageMap($b_idx)
    {
        $column = "BiIdx, ImgArea, ImgType, LinkUrl";
        $from = "
            from {$this->_table['banner_imageMap']}
        ";

        $where = ' where BIdx = ? and IsStatus = "Y" and IsStatus = "Y"';
        $order_by_offset_limit = ' order by BIdx asc';

        return $this->_conn->query('select '.$column .$from .$where .$order_by_offset_limit, [$b_idx])->result_array();
    }

    /**
     * 배너 등록
     * @param array $input
     * @return array|bool
     */
    public function addBanner($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $site_code = element('site_code', $input);
            $arr_cate_code = explode('_',element('cate_code', $input));
            if (isset($arr_cate_code[1]) === false) {
                throw new \Exception('카테고리 정보가 올바르지 않습니다.');
            }

            $cate_code = $arr_cate_code[1];
            $banner_disp_idx = element('banner_disp_idx', $input);
            $link_type = element('link_type', $input);
            $order_num = get_var(element('order_num', $input), $this->_getBannerOrderNum($site_code, $cate_code, $banner_disp_idx));
            $pop_width = null;
            $pop_height = null;

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

            if ($link_type == 'popup') {
                $pop_width = element('pop_width', $input, 0);
                $pop_height = element('pop_height', $input, 0);
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CateCode' => $cate_code,
                'CampusCcd' => element('campus_ccd', $input),
                'BdIdx' => $banner_disp_idx,
                'BannerName' => element('banner_name', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
                'LinkType' => $link_type,
                'LinkUrl' => element('link_url', $input),
                'LinkUrlType' => element('link_url_type', $input, 'I'),
                'PopWidth' => $pop_width,
                'PopHeight' => $pop_height,
                'IsUse' => element('is_use', $input),
                'OrderNum' => $order_num,
                'Desc' => element('desc', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['banner']) === false) {
                throw new \Exception('배너 등록에 실패했습니다.');
            }
            $b_idx = $this->_conn->insert_id();

            //이미지맵 저장
            $image_map_types = element('image_map_type', $input);
            $image_map_areas = element('image_map_area', $input);
            $image_map_link_urls = element('image_map_link_url', $input);
            if (count($image_map_types) >= 0) {
                foreach ($image_map_types as $key => $val) {
                    $imageMap_data['BIdx'] = $b_idx;
                    $imageMap_data['ImgType'] = $val;
                    $imageMap_data['ImgArea'] = $image_map_areas[$key];
                    $imageMap_data['LinkUrl'] = $image_map_link_urls[$key];
                    $imageMap_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $imageMap_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBannerImageMap($imageMap_data) === false) {
                        throw new \Exception('이미지맵 등록에 실패했습니다.');
                    }
                }
            }

            //이미지 등록
            $this->load->library('upload');
            $upload_dir = config_item('upload_prefix_dir') . '/banner/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_img'], $this->_getAttachImgNames(), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                $img_data['BannerFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                $img_data['BannerImgName'] = $uploaded[0]['orig_name'];
                $img_data['BannerImgRealName'] = $uploaded[0]['client_name'];

                if ($this->_conn->set($img_data)->where('BIdx', $b_idx)->update($this->_table['banner']) === false) {
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
     * 배너 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyBanner($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $b_idx = element('b_idx', $input);

            // 기존 배너 기본정보 조회
            $row = $this->findBanner('BIdx, SiteCode, CateCode, BannerFullPath, BannerImgName', ['EQ' => ['BIdx' => $b_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $cate_code = $row['CateCode'];
            $site_code = $row['SiteCode'];
            $banner_disp_idx = element('banner_disp_idx', $input);
            $link_type = element('link_type', $input);
            $order_num = get_var(element('order_num', $input), $this->_getBannerOrderNum($site_code, $cate_code, $banner_disp_idx));
            $pop_width = null;
            $pop_height = null;

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

            if ($link_type == 'popup') {
                $pop_width = element('pop_width', $input, 0);
                $pop_height = element('pop_height', $input, 0);
            }

            $data = [
                'BdIdx' => $banner_disp_idx,
                'BannerName' => element('banner_name', $input),
                'CampusCcd' => element('campus_ccd', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
                'LinkType' => $link_type,
                'LinkUrl' => element('link_url', $input),
                'LinkUrlType' => element('link_url_type', $input, 'I'),
                'PopWidth' => $pop_width,
                'PopHeight' => $pop_height,
                'IsUse' => element('is_use', $input),
                'OrderNum' => $order_num,
                'Desc' => element('desc', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('BIdx', $b_idx)->update($this->_table['banner']) === false) {
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
                $upd_imageMap_data['BIdx'] = $b_idx;
                $this->_modifyBannerImageMap($upd_imageMap_data);

                foreach ($image_map_types as $key => $val) {
                    $imageMap_data['BIdx'] = $b_idx;
                    $imageMap_data['ImgType'] = $val;
                    $imageMap_data['ImgArea'] = $image_map_areas[$key];
                    $imageMap_data['LinkUrl'] = $image_map_link_urls[$key];
                    $imageMap_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $imageMap_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBannerImageMap($imageMap_data) === false) {
                        throw new \Exception('이미지맵 수정에 실패했습니다.');
                    }
                }
            }

            //이미지 수정
            $this->load->library('upload');
            $paths = explode('/', $row['BannerFullPath']);  //날짜 형태의 값만 추출
            $upload_dir = config_item('upload_prefix_dir') . '/banner/' . $paths[5] . '/' . $paths[6];
            /*$upload_dir = config_item('upload_prefix_dir') . '/banner/' . date('Ymd');*/

            $uploaded = $this->upload->uploadFile('file', ['attach_img'], $this->_getAttachImgNames(), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                //기존 파일 삭제
                $this->load->helper('file');
                $real_img_path = public_to_upload_path($row['BannerFullPath'].$row['BannerImgName']);
                if (@unlink($real_img_path) === false) {
                    // 로컬에서 등록한 이미지는 삭제가 안되기 때문에 에러 메시지 노출 안함으로 변경
                    //throw new \Exception('이미지 삭제에 실패했습니다.');
                }

                $img_data['BannerFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                $img_data['BannerImgName'] = $uploaded[0]['orig_name'];
                $img_data['BannerImgRealName'] = $uploaded[0]['client_name'];

                if ($this->_conn->set($img_data)->where('BIdx', $b_idx)->update($this->_table['banner']) === false) {
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
     * 배너 일괄 삭제
     * @param array $params
     * @return array|bool
     */
    public function delBanner($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }
            $set_banner_idx = implode(',', array_keys($params));
            $set_banner_optoin_val = implode(',', array_values($params));
            $arr_banner_idx = explode(',', $set_banner_idx);
            $arr_banner_optoin_val = explode(',', $set_banner_optoin_val);
            $set_data = $arr_banner_optoin_val[0];

            $this->_conn->set(['IsUse' => $set_data])->where_in('BIdx',$arr_banner_idx);

            if($this->_conn->update($this->_table['banner'])=== false) {
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
     * 배너 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyBannerReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $menu_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)->where('BIdx', $menu_idx);

                if ($this->_conn->update($this->_table['banner']) === false) {
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
     * 배너검색 [이벤트용 : 사용되지 않은 배너]
     * @param $is_count
     * @param array $arr_condition
     * @param $site_code
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSearchBannerForEvent($is_count, $arr_condition = [], $site_code, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.BIdx, a.SiteCode, a.CateCode, a.BannerName, a.DispName, a.DispStartDatm, a.DispEndDatm,
                a.wAdminName AS RegAdminName, a.RegDatm, IFNULL(c.CateName,"전체카테고리") AS CateName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM
            ( SELECT 
                a1.BIdx, a1.SiteCode, a1.CateCode, a1.BannerName, b1.DispName, a1.DispStartDatm, a1.DispEndDatm, c1.wAdminName, a1.RegDatm
                FROM {$this->_table['banner']} AS a1
                INNER JOIN {$this->_table['banner_disp']} AS b1 ON a1.BdIdx = b1.BdIdx AND b1.SiteCode = '{$site_code}'
                INNER JOIN {$this->_table['admin']} AS c1 ON a1.RegAdminIdx = c1.wAdminIdx
                WHERE a1.LinkType = 'layer' AND a1.SiteCode = '{$site_code}' AND a1.IsUse = 'Y' AND a1.IsStatus = 'Y'
            ) AS a                
            LEFT JOIN {$this->_table['event_lecture']} AS b ON a.BIdx = b.BIdx AND b.OptionCcds LIKE '%660004%'
            LEFT JOIN {$this->_table['sys_category']} AS c ON a.CateCode = c.CateCode AND c.IsStatus = 'Y'
        ";
        $arr_condition['IN']['a.SiteCode'] = get_auth_site_codes(false, true);

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $default_where = '
            where (b.BIdx = \'0\' OR b.BIdx IS NULL)
        ';
        $where = $default_where . $where;

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 이미지맵 개별 삭제 (N 업데이트)
     * @param $bi_idx
     * @return array|bool
     */
    public function removeBannerImageMap($bi_idx)
    {
        try {
            $upd_imageMap_data['BiIdx'] = $bi_idx;
            if ($this->_modifyBannerImageMap($upd_imageMap_data) === false) {
                throw new \Exception('이미지맵 개별 삭제에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 사이트 코드, 노출섹션, 배너위치 별 정렬순서 값 조회
     * @param $site_code
     * @param $cate_code
     * @param $banner_disp_idx
     * @return mixed
     */
    private function _getBannerOrderNum($site_code, $cate_code, $banner_disp_idx)
    {
        return $this->_conn->getFindResult($this->_table['banner'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => [
                'SiteCode' => $site_code,
                'CateCode' => $cate_code,
                'BdIdx' => $banner_disp_idx
            ]
        ])['NextOrderNum'];
    }

    /**
     * 파일명 배열 생성
     * @return array
     */
    private function _getAttachImgNames()
    {
        $attach_file_names[] = 'banner_' . date('YmdHis');
        return $attach_file_names;
    }

    /**
     * 이미지맵 등록
     * @param $input
     * @return bool
     */
    private function _addBannerImageMap($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['banner_imageMap']) === false) {
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
    private function _modifyBannerImageMap($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['banner_imageMap']) === false) {
                throw new \Exception('이미지맵 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}