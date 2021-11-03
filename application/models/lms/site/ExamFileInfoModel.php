<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamFileInfoModel extends WB_Model
{
    private $_table = [
        'exam_file_info' => 'lms_exam_file_info',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 기본정보 리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listGroupData($arr_condition = [])
    {
        $column = 'a.ExamFileIdx, a.SiteCode, a.DataType, a.GroupCode, a.YearTarget, a.IsUse, a.RegDatm, b.SiteName, c.wAdminName as RegAdminName';

        $from = "
            from {$this->_table['exam_file_info']} as a
            inner join {$this->_table['site']} as b on a.SiteCode=b.SiteCode and b.IsStatus='Y'
            left join {$this->_table['admin']} c on a.RegAdminIdx=c.wAdminIdx and c.wIsStatus='Y'
        ";

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'a.SiteCode' => get_auth_site_codes()
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['a.ExamFileIdx' => 'desc'])->getMakeOrderBy();
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 기본정보 조회
     */
    public function findGroupData($arr_condition = [])
    {
        $column = 'a.ExamFileIdx, a.SiteCode, a.DataType, a.GroupCode, a.YearTarget, a.IsUse, a.RegDatm, a.UpdDatm, b.SiteName, c.wAdminName as RegAdminName, d.wAdminName as UpdAdminName';

        $from = "
            from {$this->_table['exam_file_info']} as a
            inner join {$this->_table['site']} as b on a.SiteCode=b.SiteCode and b.IsStatus='Y'
            left join {$this->_table['admin']} c on a.RegAdminIdx=c.wAdminIdx and c.wIsStatus='Y'
            left join {$this->_table['admin']} d on a.UpdAdminIdx=d.wAdminIdx and d.wIsStatus='Y'
        ";

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'a.SiteCode' => get_auth_site_codes()
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['a.ExamFileIdx' => 'desc'])->getMakeOrderBy();
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->row_array();
    }

    /**
     * 기본정보저장
     * @param array $form_data
     * @return array|bool
     */
    public function addExamFileInfo($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $where = [
                'SiteCode' => element('site_code', $form_data)
                ,'YearTarget' => element('year_target', $form_data)
                ,'DataType' => element('data_type', $form_data)
            ];
            $result = $this->_conn->select('*')->where($where)->get($this->_table['exam_file_info'])->result_array();
            if (empty($result) === false) {
                throw new \Exception('등록된 학년도가 있습니다. 중복으로 등록할 수 없습니다.');
            }

            $group_code = $this->getGroupCode();
            $input_data = [
                'SiteCode' => element('site_code', $form_data)
                ,'DataType' => element('data_type', $form_data)
                ,'GroupCode' => $group_code['GroupCode']
                ,'YearTarget' => element('year_target', $form_data)
                ,'IsUse' => element('is_use', $form_data)
                ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                ,'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($input_data)->insert($this->_table['exam_file_info']) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $idx = $this->_conn->insert_id();

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true, 'ret_data' => $idx];
    }

    public function modifyExamFileInfo($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $input_data = [
                'SiteCode' => element('site_code', $form_data)
                ,'YearTarget' => element('year_target', $form_data)
                ,'IsUse' => element('is_use', $form_data)
                ,'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['ExamFileIdx' => element('idx', $form_data)];
            $this->_conn->set($input_data)->where($where);
            if ($this->_conn->update($this->_table['exam_file_info']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return ['ret_cd' => true, 'ret_data' => element('idx', $form_data)];
    }

    /**
     * 자료데이터 리스트
     */
    public function listFileinfo($arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy(['AreaCcd' => 'asc'])->getMakeOrderBy();

        $query_string = /** @lang text */"
            select * from {$this->_table['exam_file_info']} {$where} {$order_by}
        ";
        $query = $this->_conn->query($query_string);
        return $query->result_array();
    }

    /**
     * 지역별 공고문 자료 정보 등록/수정
     * @param array $form_data
     * @return array|bool
     */
    public function storeExamFileData($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $upload_dir = config_item('upload_prefix_dir').'/area_exam/'.date('Y').'/'.element('group_code', $form_data);

            foreach (element('arr_area_data', $form_data) as $key => $val) {
                $uploaded[$val] = $this->upload->uploadFile('file', ['file_'.$val], $this->_getAttachImgNames($val), $upload_dir);
            }

            $ins_data = [];
            $modify_data = [];
            $bak_uploaded_files = [];

            foreach ($uploaded as $key => $row) {
                foreach ($row as $file_type => $file_info) {
                    if (empty($file_info) === false) {
                        if (empty(element('arr_file_idx_'.$key, $form_data)[$file_type]) === false) {
                            $modify_data[] = [
                                'ExamFileIdx' => element('arr_file_idx_'.$key, $form_data)[$file_type]
                                ,'DataType' => element('data_type', $form_data)
                                ,'GroupCode' => element('group_code', $form_data)
                                ,'AreaCcd' => $key
                                ,'FileType' => $file_type
                                ,'FilePath' => $this->upload->_upload_url . $upload_dir . '/'
                                ,'FileName' => $file_info['orig_name']
                                ,'FileRealName' => $file_info['client_name']
                                ,'IsUse' => element('is_use_' . $key, $form_data)[$file_type]
                                ,'UpdAdminIdx' => $this->session->userdata('admin_idx')
                            ];
                            $bak_uploaded_files[] = urldecode(element('arr_file_path_'.$key, $form_data)[$file_type]);
                        } else {
                            $ins_data[] = [
                                'DataType' => element('data_type', $form_data)
                                ,'GroupCode' => element('group_code', $form_data)
                                ,'AreaCcd' => $key
                                ,'FileType' => $file_type
                                ,'FilePath' => $this->upload->_upload_url . $upload_dir . '/'
                                ,'FileName' => $file_info['orig_name']
                                ,'FileRealName' => $file_info['client_name']
                                ,'IsUse' => element('is_use_' . $key, $form_data)[$file_type]
                                ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                                ,'RegIp' => $this->input->ip_address()
                            ];
                        }
                    }
                }
            }

            if($ins_data) $this->_conn->insert_batch($this->_table['exam_file_info'], $ins_data);
            if($modify_data) $this->_conn->update_batch($this->_table['exam_file_info'], $modify_data, 'ExamFileIdx');

            // 수정된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * Group데이터 사용/미사용 update
     * @param array $params
     * @return array|bool
     */
    public function modifyIsUse($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $idx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('ExamFileIdx', $idx);
                if ($this->_conn->update($this->_table['exam_file_info']) === false) {
                    throw new \Exception('정보 수정에 실패했습니다.');
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
     * 등록파일 단일 사용여부 수정
     * @param array $form_data
     * @return array|bool
     */
    public function storeIsuse($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $input = [
                'IsUse' => element('is_use',$form_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['ExamFileIdx' => element('exam_file_idx', $form_data)];
            $this->_conn->set($input)->where($where);
            if ($this->_conn->update($this->_table['exam_file_info']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    private function _getAttachImgNames($area_code = '')
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 0; $i <= 1; $i++) {
            $attach_file_names[] = 'exam_'.$area_code.'_'.$i.'_'.$temp_time;
        }
        return $attach_file_names;
    }

    /**
     * 그룹코드 셋팅
     * @return mixed
     */
    private function getGroupCode()
    {
        $column = 'IFNULL(MAX(GroupCode)+1,1001) AS GroupCode';
        $arr_condition = [
            'EQ' => [
                'DataType' => '0'
            ]
        ];
        $from = " from {$this->_table['exam_file_info']}";
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
    }
}