<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerModel extends WB_Model
{
    private $_table = [
        'banner' => 'lms_banner',
        'banner_r_category' => 'lms_banner_r_category',
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
            A.BIdx, A.SiteCode, G.SiteName, A.BannerName, A.DispCcd, H.CcdName AS DispName, A.BannerLocationCcd, I.CcdName AS BannerLocationName, A.DispStartDatm, A.DispEndDatm,
            A.BannerFullPath, A.BannerImgName, A.BannerImgRealName, A.OrderNum,
            A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            D.CateCode, E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['banner']} AS A
            LEFT JOIN (
                SELECT B.BIdx, GROUP_CONCAT(CONCAT(C.CateName,'[',B.CateCode,']')) AS CateCode
                FROM {$this->_table['banner_r_category']} AS B
                INNER JOIN {$this->_table['sys_category']} AS C ON B.CateCode = C.CateCode AND B.IsStatus = 'Y'
                GROUP BY B.BIdx
            ) AS D ON A.BIdx = D.BIdx
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS H ON A.DispCcd = H.Ccd
            INNER JOIN {$this->_table['sys_code']} AS I ON A.BannerLocationCcd = I.Ccd
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
            A.BIdx, A.SiteCode, G.SiteName, A.BannerName, A.DispCcd, H.CcdName AS DispName, A.BannerLocationCcd, I.CcdName AS BannerLocationName,
            A.DispStartDatm, A.DispEndDatm,
            DATE_FORMAT(A.DispStartDatm, '%Y-%m-%d') AS DispStartDay, DATE_FORMAT(A.DispStartDatm, '%H') AS DispStartHour,
            DATE_FORMAT(A.DispEndDatm, '%Y-%m-%d') AS DispEndDay, DATE_FORMAT(A.DispEndDatm, '%H') AS DispEndHour,
            A.BannerFullPath, A.BannerImgName, A.BannerImgRealName, A.LinkType, A.LinkUrl, A.OrderNum, A.Desc, A.IsUse, A.RegAdminIdx, A.RegDatm, A.UpdAdminIdx, A.UpdDatm,
            E.wAdminName AS RegAdminName, F.wAdminName AS UpdAdminName
            ";

        $from = "
            FROM {$this->_table['banner']} AS A
            INNER JOIN {$this->_table['site']} AS G ON A.SiteCode = G.SiteCode
            INNER JOIN {$this->_table['sys_code']} AS H ON A.DispCcd = H.Ccd
            INNER JOIN {$this->_table['sys_code']} AS I ON A.BannerLocationCcd = I.Ccd
            INNER JOIN {$this->_table['admin']} AS E ON A.RegAdminIdx = E.wAdminIdx AND E.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS F ON A.UpdAdminIdx = F.wAdminIdx AND F.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
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
            $site_code = element('site_code', $input);
            $banner_disp = element('banner_disp', $input);
            $banner_location = element('banner_location', $input);
            $order_num = get_var(element('order_num', $input), $this->_getBannerOrderNum($site_code, $banner_disp, $banner_location));
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
                'DispCcd' => element('banner_disp', $input),
                'BannerLocationCcd' => element('banner_location', $input),
                'BannerName' => element('banner_name', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
                'LinkType' => element('link_type', $input),
                'LinkUrl' => element('link_url', $input),
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

            //카테고리 저장
            if ($site_code != config_item('app_intg_site_code')) {
                $category_code = element('cate_code', $input);
                foreach ($category_code as $key => $val) {
                    $category_data['BIdx'] = $b_idx;
                    $category_data['CateCode'] = $val;
                    $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBannerCategory($category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
                    }
                }
            }

            //이미지 등록
            $this->load->library('upload');
            $upload_dir = SUB_DOMAIN . '/banner/' . date('Ymd');
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
     */
    public function modifyBanner($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $b_idx = element('b_idx', $input);

            // 기존 배너 기본정보 조회
            $row = $this->findBanner('BIdx, SiteCode, BannerFullPath, BannerImgName', ['EQ' => ['BIdx' => $b_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $banner_disp = element('banner_disp', $input);
            $banner_location = element('banner_location', $input);
            $order_num = get_var(element('order_num', $input), $this->_getBannerOrderNum($site_code, $banner_disp, $banner_location));

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
                'DispCcd' => element('banner_disp', $input),
                'BannerLocationCcd' => element('banner_location', $input),
                'BannerName' => element('banner_name', $input),
                'DispStartDatm' => $disp_start_datm,
                'DispEndDatm' => $disp_end_datm,
                'LinkType' => element('link_type', $input),
                'LinkUrl' => element('link_url', $input),
                'IsUse' => element('is_use', $input),
                'OrderNum' => $order_num,
                'Desc' => element('desc', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if ($this->_conn->set($data)->where('BIdx', $b_idx)->update($this->_table['banner']) === false) {
                throw new \Exception('배너 수정에 실패했습니다.');
            }

            //이미지 수정
            $this->load->library('upload');
            $paths = explode('/', $row['BannerFullPath']);  //날짜 형태의 값만 추출
            $upload_dir = SUB_DOMAIN . '/banner/' . $paths[5];
            /*$upload_dir = SUB_DOMAIN . '/banner/' . date('Ymd');*/

            $uploaded = $this->upload->uploadFile('file', ['attach_img'], $this->_getAttachImgNames(), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                //기존 파일 삭제
                $this->load->helper('file');
                $real_img_path = public_to_upload_path($row['BannerFullPath'].$row['BannerImgName']);
                if (@unlink($real_img_path) === false) {
                    throw new \Exception('이미지 삭제에 실패했습니다.');
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
     * 카테고리 연결 데이터 조회
     * @param $board_idx
     * @return array
     */
    public function listBannerCategory($board_idx)
    {
        $column = '
            CC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['banner_r_category'] . ' as CC
                inner join ' . $this->_table['sys_category'] . ' as C
                    on CC.CateCode = C.CateCode
                left join ' . $this->_table['sys_category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where CC.BIdx = ? and CC.IsStatus = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by CC.BIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$board_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
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
     * 사이트 코드, 노출섹션, 배너위치 별 정렬순서 값 조회
     * @param $site_code
     * @param $banner_disp
     * @param $banner_location
     * @return mixed
     */
    private function _getBannerOrderNum($site_code, $banner_disp, $banner_location)
    {
        return $this->_conn->getFindResult($this->_table['banner'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => [
                'SiteCode' => $site_code,
                'DispCcd' => $banner_disp,
                'BannerLocationCcd' => $banner_location
            ]
        ])['NextOrderNum'];
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addBannerCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['banner_r_category']) === false) {
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
        $attach_file_names[] = 'banner_' . date('YmdHis');
        return $attach_file_names;
    }
}