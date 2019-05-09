<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'site_r_campus' => 'lms_site_r_campus',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];    
    private $_ccd = [
        'Campus' => '605',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사이트 목록 조회
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSite($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['site'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사이트 관리 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listAllSite($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'S.SiteCode, S.SiteGroupCode, S.SiteName, S.SiteUrl, S.PgCcd, S.IsCampus, S.IsUse, S.RegDatm, S.RegAdminIdx, G.SiteGroupName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['EQ']['G.IsStatus'] = 'Y';

        return $this->_conn->getJoinListResult($this->_table['site'] . ' as S', 'inner', $this->_table['site_group'] . ' as G',
            'S.SiteGroupCode = G.SiteGroupCode', $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 사이트 코드 목록 조회
     * @param bool $is_auth
     * @param string $is_column [추가 컬럼 조회시 컬럼명 전달]
     * @return array
     */
    public function getSiteArray($is_auth = true, $is_column = 'SiteName')
    {
        // 운영자 사이트 권한 체크
        if ($is_auth === true) {
            $data = get_auth_site_codes(true);
        } else {
            $arr_condition = ['EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
            $data = $this->_conn->getListResult($this->_table['site'], 'SiteCode,'.$is_column ,$arr_condition, null, null, [
                'SiteCode' => 'asc'
            ]);
            $data = array_pluck($data, $is_column, 'SiteCode');
        }

        return $data;
    }

    /**
     * 캠퍼스'Y'상태 사이트 코드 목록 조회
     * @param string $site_code [사이트코드]
     * @return array
     */
    public function getOffLineSiteArray($site_code = '')
    {
        $column = 'SiteCode,SiteName';
        $arr_condition = ['EQ' => ['SiteCode' => $site_code, 'IsCampus' => 'Y', 'IsUse' => 'Y', 'IsStatus' => 'Y']];
        $arr_condition['IN']['SiteCode'] = get_auth_site_codes();

        $data = $this->_conn->getListResult($this->_table['site'], $column ,$arr_condition, null, null, [
            'SiteCode' => 'asc'
        ]);

        return array_pluck($data, 'SiteName', 'SiteCode');
    }

    /**
     * 사이트 코드별 운영자 권한이 있는 캠퍼스 코드 목록 조회
     * @param $site_code
     * @return array
     */
    public function getSiteCampusArray($site_code)
    {
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        if (empty($arr_auth_campus_ccds) === true) {
            return [];
        }
        $column = "SC.SiteCode, SC.CampusCcd, C.CcdName as CampusName";
        $from = "
            FROM {$this->_table['site_r_campus']} AS SC
            INNER JOIN {$this->_table['code']} AS C ON SC.CampusCcd = C.Ccd
        ";

        $arr_condition = [
            'EQ' => [
                'SC.IsStatus' => 'Y',
                'C.GroupCcd' => $this->_ccd['Campus'],
                'C.IsUse' => 'Y',
                'C.IsStatus' => 'Y'
            ]
        ];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['SC.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SC.SiteCode'] = get_auth_site_codes();
        }

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $where_campus = "";
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
                $where_campus->or_where('SC.SiteCode',$set_site_ccd);
                $where_campus->where_in('SC.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
        }
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . ' ORDER BY SC.SiteCode ASC, SC.CampusCcd ASC');
        $data = $query->result_array();
        return (empty($site_code) === false) ? array_pluck($data, 'CampusName', 'CampusCcd') : $data;
    }

    /**
     * 사이트 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findSite($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['site'], $column, $arr_condition);
    }

    /**
     * 사이트 수정 폼을 위한 데이터 조회
     * @param $site_code
     * @return array
     */
    public function findSiteForModify($site_code)
    {
        $column = '
            S.SiteCode, S.SiteGroupCode, S.SiteTypeCcd, S.SiteName, S.SiteUrl, S.UseDomain, S.UseMail, S.PgCcd, S.PgMid, S.PgBookMid, S.PayMethodCcds, S.DeliveryCompCcd, S.DeliveryPrice, S.DeliveryAddPrice, S.DeliveryFreePrice
                , S.Logo, S.Favicon, S.CsTel, S.HeadTitle, S.MetaKeyword, S.HeaderInfo, S.MetaDesc, S.FrontCss, S.FooterInfo, S.CommPcScript, S.CommMobileScript, S.CommAppScript
                , S.IsCampus, S.IsUse, S.RegDatm, S.RegAdminIdx, S.UpdDatm, S.UpdAdminIdx
                , if(IsCampus = "Y", (
                    select GROUP_CONCAT(CampusCcd separator ", ") from ' . $this->_table['site_r_campus'] . ' where SiteCode = S.SiteCode and IsStatus = "Y"
                  ), "") as CampusCcds
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(S.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = S.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName
        ';

        return $this->_conn->getFindResult($this->_table['site'] . ' as S', $column, [
            'EQ' => ['S.SiteCode' => $site_code]
        ]);
    }

    /**
     * 사이트 등록
     * @param array $input
     * @return array|bool
     */
    public function addSite($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_group_code = element('site_group_code', $input);

            // 등록될 사이트 코드,  정렬순서 조회
            $row = $this->_conn->getFindResult($this->_table['site'], 'ifnull(max(SiteCode) + 1, 2001) as SiteCode, ifnull(max(OrderNum) + 1, 1) as OrderNum');
            $site_code = $row['SiteCode'];

            // 로고, 파비콘 업로드
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/site/' . $site_code;

            $uploaded = $this->upload->uploadFile('img', ['logo', 'favicon'], ['logo_' . $site_code, 'favicon_' . $site_code], $upload_sub_dir, 'allowed_types:gif|jpg|jpeg|png|ico');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            // 고객센터 전화번호
            $cs_tel = element('cs_tel1', $input) . '-' . element('cs_tel2', $input);
            if (empty(element('cs_tel3', $input)) === false) {
                $cs_tel .= '-' . element('cs_tel3', $input);
            }

            // 데이터 저장
            $data = [
                'SiteCode' => $site_code,
                'SiteGroupCode' => $site_group_code,
                'SiteTypeCcd' => element('site_type_ccd', $input),
                'SiteName' => element('site_name', $input),
                'SiteUrl' => element('site_url', $input),
                'UseDomain' => element('use_domain', $input),
                'UseMail' => element('site_mail_id', $input) . '@' . element('site_mail_domain', $input),
                'PgCcd' => element('pg_ccd', $input),
                'PgMid' => element('pg_mid', $input),
                'PgBookMid' => element('pg_book_mid', $input),
                'PayMethodCcds' => implode(',', element('pay_method_ccd', $input)),
                'DeliveryCompCcd' => element('delivery_comp_ccd', $input),
                'DeliveryPrice' => element('delivery_price', $input),
                'DeliveryAddPrice' => element('delivery_add_price', $input),
                'DeliveryFreePrice' => element('delivery_free_price', $input),
                'CsTel' => $cs_tel,
                'HeadTitle' => element('head_title', $input),
                'MetaKeyword' => element('meta_keyword', $input),
                'MetaDesc' => element('meta_desc', $input),
                'HeaderInfo' => base64_encode(element('header_info', $input)),
                'FrontCss' => element('front_css', $input),
                'FooterInfo' => element('footer_info', $input),
                'CommPcScript' => base64_encode(element('comm_pc_script', $input)),
                'CommMobileScript' => base64_encode(element('comm_mobile_script', $input)),
                'CommAppScript' => base64_encode(element('comm_app_script', $input)),
                'OrderNum' => $row['OrderNum'],
                'IsUse' => element('is_use', $input),
                'IsCampus' => element('is_campus', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            isset($uploaded[0]['file_name']) === true && $data['Logo'] = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
            isset($uploaded[1]['file_name']) === true && $data['Favicon'] = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[1]['file_name'];

            if ($this->_conn->set($data)->insert($this->_table['site']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // 사이트별 캠퍼스 등록
            if ($this->replaceSiteCampus(element('campus_ccd', $input), element('is_campus', $input), $site_code) !== true) {
                throw new \Exception('캠퍼스 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $site_code];
    }

    /**
     * 사이트 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySite($input = [])
    {
        $this->_conn->trans_begin();

        // 사이트 코드
        $site_code = element('idx', $input);

        try {
            // 기존 사이트 정보 조회
            $row = $this->findSiteForModify($site_code);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 로고, 파비콘 업로드
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/site/' . $site_code;
            $attach_img_postfix = '_' . time();
            $bak_uploaded_files = [];

            $uploaded = $this->upload->uploadFile('img', ['logo', 'favicon'], ['logo_' . $site_code . $attach_img_postfix, 'favicon_' . $site_code . $attach_img_postfix], $upload_sub_dir, 'allowed_types:gif|jpg|jpeg|png|ico,overwrite:false');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            // 고객센터 전화번호
            $cs_tel = element('cs_tel1', $input) . '-' . element('cs_tel2', $input);
            if (empty(element('cs_tel3', $input)) === false) {
                $cs_tel .= '-' . element('cs_tel3', $input);
            }
            
            // 데이터 수정
            $data = [
                'SiteGroupCode' => element('site_group_code', $input),
                'SiteTypeCcd' => element('site_type_ccd', $input),
                'SiteName' => element('site_name', $input),
                'SiteUrl' => element('site_url', $input),
                'UseDomain' => element('use_domain', $input),
                'UseMail' => element('site_mail_id', $input) . '@' . element('site_mail_domain', $input),
                'PgCcd' => element('pg_ccd', $input),
                'PgMid' => element('pg_mid', $input),
                'PgBookMid' => element('pg_book_mid', $input),
                'PayMethodCcds' => implode(',', element('pay_method_ccd', $input)),
                'DeliveryCompCcd' => element('delivery_comp_ccd', $input),
                'DeliveryPrice' => element('delivery_price', $input),
                'DeliveryAddPrice' => element('delivery_add_price', $input),
                'DeliveryFreePrice' => element('delivery_free_price', $input),
                'CsTel' => $cs_tel,
                'HeadTitle' => element('head_title', $input),
                'MetaKeyword' => element('meta_keyword', $input),
                'MetaDesc' => element('meta_desc', $input),
                'HeaderInfo' => base64_encode(element('header_info', $input)),
                'FrontCss' => element('front_css', $input),
                'FooterInfo' => element('footer_info', $input),
                'CommPcScript' => base64_encode(element('comm_pc_script', $input)),
                'CommMobileScript' => base64_encode(element('comm_mobile_script', $input)),
                'CommAppScript' => base64_encode(element('comm_app_script', $input)),
                'IsUse' => element('is_use', $input),
                'IsCampus' => element('is_campus', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if (isset($uploaded[0]['file_name']) === true) {
                $data['Logo'] = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[0]['file_name'];
                $bak_uploaded_files[] = $row['Logo'];
            }

            if (isset($uploaded[1]['file_name']) === true) {
                $data['Favicon'] = $this->upload->_upload_url . $upload_sub_dir . '/' . $uploaded[1]['file_name'];
                $bak_uploaded_files[] = $row['Favicon'];
            }

            $this->_conn->set($data)->where('SiteCode', $site_code);

            if ($this->_conn->update($this->_table['site']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 수정된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile($bak_uploaded_files, true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            // 사이트별 캠퍼스 등록/삭제
            if ($this->replaceSiteCampus(element('campus_ccd', $input), element('is_campus', $input), $site_code) !== true) {
                throw new \Exception('캠퍼스 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $site_code];
    }

    /**
     * 사이트별 캠퍼스 등록/삭제
     * @param array $arr_campus_ccd
     * @param string $is_campus [Y/N]
     * @param string $site_code
     * @return bool|string
     */
    public function replaceSiteCampus($arr_campus_ccd = [], $is_campus, $site_code)
    {
        try {
            $_table = $this->_table['site_r_campus'];
            $arr_campus_ccd = (is_null($arr_campus_ccd) === true) ? [] : array_values(array_unique($arr_campus_ccd));
            $admin_idx = $this->session->userdata('admin_idx');
            
            if ($is_campus == 'Y') {
                // 기존 설정된 캠퍼스 조회
                $data = $this->_conn->getListResult($_table, 'CampusCcd', ['EQ' => ['SiteCode' => $site_code, 'IsStatus' => 'Y']]);
                if (count($data) > 0) {
                    $data = array_pluck($data, 'CampusCcd');

                    // 기존 등록된 캠퍼스 삭제 처리 (전달된 캠퍼스 공통코드 중에 기 등록된 캠퍼스 공통코드가 없다면 삭제 처리)
                    foreach ($data as $ori_campus_ccd) {
                        if (in_array($ori_campus_ccd, $arr_campus_ccd) === false) {
                            $is_update = $this->_conn->set([
                                'IsStatus' => 'N',
                                'UpdAdminIdx' => $admin_idx
                            ])->where('SiteCode', $site_code)->where('CampusCcd', $ori_campus_ccd)->update($_table);

                            if ($is_update === false) {
                                throw new \Exception('기 설정된 캠퍼스 수정에 실패했습니다.');
                            }
                        }
                    }
                }

                // 신규 등록 (기 등록된 캠퍼스 공통코드 중에 전달된 캠퍼스 공통코드가 없다면 등록 처리)
                foreach ($arr_campus_ccd as $campus_ccd) {
                    if (empty($campus_ccd) === false && in_array($campus_ccd, $data) === false) {
                        $is_insert = $this->_conn->set([
                            'SiteCode' => $site_code,
                            'CampusCcd' => $campus_ccd,
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $this->input->ip_address()
                        ])->insert($_table);

                        if ($is_insert === false) {
                            throw new \Exception('캠퍼스 등록에 실패했습니다.');
                        }
                    }
                }
            } else {
                // 기존 설정된 캠퍼스 전체 삭제 업데이트
                $is_update = $this->_conn->set([
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $admin_idx
                ])->where('SiteCode', $site_code)->where('IsStatus', 'Y')->update($_table);

                if ($is_update === false) {
                    throw new \Exception('기 설정된 캠퍼스 수정에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 사이트 로고, 파비콘 삭제
     * @param string $img_type
     * @param $site_code
     * @return array|bool
     */
    public function removeImg($img_type = 'logo', $site_code)
    {
        $this->_conn->trans_begin();

        try {
            $img_type = ucfirst($img_type);

            // 데이터 조회
            $row = $this->findSite('Logo, Favicon', ['EQ' => ['SiteCode' => $site_code]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 이미지 백업
            $this->load->library('upload');
            $bak_uploaded_file = $row[$img_type];
            $is_bak_uploaded_file = $this->upload->bakUploadedFile($bak_uploaded_file, true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            // 데이터 수정
            $is_update = $this->_conn->set($img_type, 'NULL', false)->where('SiteCode', $site_code)->update($this->_table['site']);
            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
