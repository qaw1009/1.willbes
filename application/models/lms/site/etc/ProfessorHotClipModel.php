<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorHotClipModel extends WB_Model
{
    private $_upload_file_rule = [
        'allowed_types' => 'gif|jpg|jpeg|png',
        'overwrite' => 'false',
        'max_size' => 5120 //2560
    ];
    private $_table = [
        'professor_hot_clip' => 'lms_professor_hot_clip'
        ,'professor_hot_clip_thumbnail' => 'lms_professor_hot_clip_thumbnail'
        ,'product_subject' => 'lms_product_subject'
        ,'professor' => 'lms_professor'
        ,'sys_category' => 'lms_sys_category'
        ,'w_pms_professor' => 'wbs_pms_professor'
        ,'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function list()
    {
        $order_by = $this->_conn->makeOrderBy(['hc.OrderNum' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'hc.IsStatus' => 'Y'
            ]
        ];
        $arr_condition['IN']['hc.SiteCode'] = get_auth_site_codes();

        $column = "
            hc.PhcIdx,hc.SiteCode,hc.CateCode,hc.OrderNum
            ,hc.ProfBtnIsUse,hc.CurriculumBtnIsUse,hc.StudyCommentBtnIsUse,hc.RegDatm
            ,ps.SubjectName,wp.wProfName,a.wAdminName AS RegAdminName
            ,(SELECT COUNT(*) AS cnt FROM {$this->_table['professor_hot_clip_thumbnail']} AS hct WHERE hc.PhcIdx = hct.PhcIdx AND hct.IsStatus = 'Y') AS ThumbnailCnt
        ";
        $from = "
            FROM {$this->_table['professor_hot_clip']} AS hc
            INNER JOIN {$this->_table['product_subject']} AS ps ON hc.SubjectIdx = ps.SubjectIdx
            INNER JOIN {$this->_table['professor']} AS pf ON hc.ProfIdx = pf.ProfIdx
            INNER JOIN {$this->_table['w_pms_professor']} AS wp ON pf.wProfIdx = wp.wProfIdx
            INNER JOIN {$this->_table['admin']} AS a ON hc.RegAdminIdx = a.wAdminIdx AND a.wIsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);

        return $query->result_array();
    }

    public function findProfessorHotClip($arr_condition = [])
    {
        $column = "
            hc.PhcIdx,hc.SiteCode,hc.CateCode,hc.OrderNum
            ,hc.ProfBgImagePath,hc.ProfBgImageName,hc.ProfBgImageRealName
            ,hc.ProfBtnIsUse,hc.CurriculumBtnIsUse,hc.StudyCommentBtnIsUse,hc.RegDatm,hc.UpdDatm
            ,c.CateName AS CateRouteName,ps.SubjectName,wp.wProfName
            ,CONCAT(ps.SubjectName,'>',wp.wProfName) AS ProfSubjectName
            ,CONCAT(hc.ProfIdx,'_',hc.SubjectIdx) AS ProfSubjectIdx
            ,admin.wAdminName AS RegAdminName,admin2.wAdminName AS UpdAdminName
            ,(SELECT COUNT(*) AS cnt FROM {$this->_table['professor_hot_clip_thumbnail']} AS hct WHERE hc.PhcIdx = hct.PhcIdx AND hct.IsStatus = 'Y') AS ThumbnailCnt
        ";
        $from = "
            FROM {$this->_table['professor_hot_clip']} AS hc
            INNER JOIN {$this->_table['sys_category']} AS c ON hc.CateCode = c.CateCode
            INNER JOIN {$this->_table['product_subject']} AS ps ON hc.SubjectIdx = ps.SubjectIdx
            INNER JOIN {$this->_table['professor']} AS pf ON hc.ProfIdx = pf.ProfIdx
            INNER JOIN {$this->_table['w_pms_professor']} AS wp ON pf.wProfIdx = wp.wProfIdx
            INNER JOIN {$this->_table['admin']} AS admin ON hc.RegAdminIdx = admin.wAdminIdx AND admin.wIsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS admin2 ON hc.UpdAdminIdx = admin2.wAdminIdx AND admin2.wIsStatus = 'Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->row_array();
    }

    public function listProfessorHotClipThumbnail($phc_idx)
    {
        $order_by = $this->_conn->makeOrderBy(['PhctIdx' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'PhcIdx' => $phc_idx
                ,'IsStatus' => 'Y'
            ]
        ];
        $column = "PhctIdx,PhcIdx,LinkType,LinkUrl,ThumbnailPath,ThumbnailFileName,ThumbnailRealName";
        $from = " FROM {$this->_table['professor_hot_clip_thumbnail']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 교수 핫클립 데이터 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addProfessorHotClip($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');

            $upload_sub_dir = config_item('upload_prefix_dir') . '/etc/hotclip/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['professor_bg_image'], $this->_getAttachImgNames('professor_bg_image'), $upload_sub_dir
                ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('교수배경이미지 등록에 실패했습니다.');
            }
            $file_data['ProfBgImagePath'] = (empty($uploaded[0]) === false) ? $this->upload->_upload_url . $upload_sub_dir . '/' : '';
            $file_data['ProfBgImageName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['orig_name'] : '';
            $file_data['ProfBgImageRealName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['client_name'] : '';

            // 데이터 등록
            $input_data = array_merge($this->_setInputData($form_data), $file_data);

            if ($this->_conn->set($input_data)->insert($this->_table['professor_hot_clip']) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $insert_idx = $this->_conn->insert_id();

            $thumbnail_data = $this->_addSetThumbnailData($form_data,$insert_idx);
            if($thumbnail_data) $this->_conn->insert_batch($this->_table['professor_hot_clip_thumbnail'], $thumbnail_data);

            if ($this->_conn->trans_status() === false) {
                throw new Exception('로그저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 교수 핫클립 데이터 수정
     * @param array $form_data
     * @return array|bool
     */
    public function modifyProfessorHotClip($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');

            $file_data = [];
            if ($_FILES['professor_bg_image']['size'] > 0) {
                $upload_sub_dir = config_item('upload_prefix_dir') . '/etc/hotclip/' . date('Y') . '/' . date('md');
                $uploaded = $this->upload->uploadFile('file', ['professor_bg_image'], $this->_getAttachImgNames('professor_bg_image'), $upload_sub_dir
                    ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);

                if (is_array($uploaded) === false) {
                    throw new \Exception('교수배경이미지 등록에 실패했습니다.');
                }
                $file_data['ProfBgImagePath'] = (empty($uploaded[0]) === false) ? $this->upload->_upload_url . $upload_sub_dir . '/' : '';
                $file_data['ProfBgImageName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['orig_name'] : '';
                $file_data['ProfBgImageRealName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['client_name'] : '';
            }

            $input_data = array_merge($this->_setInputData($form_data,'modify'), $file_data);
            $where = [
                'PhcIdx' => element('idx', $form_data),
                'IsStatus' => 'Y'
            ];
            $this->_conn->set($input_data)->where($where);
            if ($this->_conn->update($this->_table['professor_hot_clip']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $thumbnail_data = $this->_modifySetThumbnailData($form_data);
            if(empty($thumbnail_data['insert']) === false) $this->_conn->insert_batch($this->_table['professor_hot_clip_thumbnail'], $thumbnail_data['insert']);
            if(empty($thumbnail_data['update']) === false) $this->_conn->update_batch($this->_table['professor_hot_clip_thumbnail'], $thumbnail_data['update'], 'PhctIdx');
            if (empty(element('del_thumbnail', $form_data)) === false) {
                $del_data = [
                    'IsStatus' => 'N'
                    ,'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];
                $is_update = $this->_conn->set($del_data)
                    ->where('IsStatus', 'Y')
                    ->where_in('PhctIdx', element('del_thumbnail', $form_data))
                    ->update($this->_table['professor_hot_clip_thumbnail']);
                if ($is_update === false) {
                    throw new \Exception('썸네일 데이터 삭제 실패했습니다.');
                }
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('수정 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 정렬순서 update
     * @param array $params
     */
    public function modifyOrderNum($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }
            foreach ($params as $phc_idx => $order_num) {
                if(empty($phc_idx) === true) throw new \Exception('필수 파라미터 오류입니다.');

                $data = [
                    'OrderNum' => $order_num,
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];
                $this->_conn->set($data)->where('PhcIdx', $phc_idx);

                if ($this->_conn->update($this->_table['professor_hot_clip']) === false) {
                    throw new \Exception('정렬정보 수정에 실패했습니다.');
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
     * 데이터 삭제
     * @param $phct_idx
     * @return array|bool
     */
    public function deleteProfessorHotClip($phc_idx)
    {
        $this->_conn->trans_begin();
        try {
            $del_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = [
                'PhcIdx' => $phc_idx,
                'IsStatus' => 'Y'
            ];
            $this->_conn->set($del_data)->where($where);
            if ($this->_conn->update($this->_table['professor_hot_clip']) === false) {
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
     * 썸네일 데이터 개별삭제
     * @param $phct_idx
     * @return array|bool
     */
    public function deleteProfessorHotClipThumbnail($phct_idx)
    {
        $this->_conn->trans_begin();
        try {
            $del_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = [
                'PhctIdx' => $phct_idx,
                'IsStatus' => 'Y'
            ];
            $this->_conn->set($del_data)->where($where);
            if ($this->_conn->update($this->_table['professor_hot_clip_thumbnail']) === false) {
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
     * 핫클립 썸네일 등록
     * @param array $form_data
     * @param string $insert_idx
     * @return array
     */
    private function _addSetThumbnailData($form_data = [], $insert_idx = '')
    {
        $thumbnail_data = [];
        $upload_sub_dir = config_item('upload_prefix_dir') . '/etc/hotclip/' . date('Y') . '/' . date('md');
        $uploaded = $this->upload->uploadFile('file', ['thumbnail'], $this->_getAttachImgNames('thumbnail'), $upload_sub_dir,
            'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);

        if (empty($uploaded) === false) {
            foreach ($uploaded as $key => $val) {
                if (empty($uploaded[$key]['orig_name']) === false) {
                    $thumbnail_data[] = [
                        'PhcIdx' => $insert_idx,
                        'LinkType' => (empty(element('link_type', $form_data, 'Y')[$key]) === true) ? '' : element('link_type', $form_data, 'Y')[$key],
                        'LinkUrl' => (empty(element('link_url', $form_data, 'Y')[$key]) === true) ? '' : element('link_url', $form_data, 'Y')[$key],
                        'ThumbnailPath' => $this->upload->_upload_url . $upload_sub_dir . '/',
                        'ThumbnailFileName' => $uploaded[$key]['orig_name'],
                        'ThumbnailRealName' => $uploaded[$key]['client_name'],
                        'IsStatus' => element('IsStatus', $form_data, 'Y'),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        'RegIp' => $this->input->ip_address()
                    ];
                }
            }
        }
        return $thumbnail_data;
    }

    /**
     * 핫클립 썸네일 등록/수정 데이터 셋팅
     * @param array $form_data
     * @return array
     */
    private function _modifySetThumbnailData($form_data = [])
    {
        $arr_link_type = element('link_type', $form_data);
        $arr_thumbnail_idx = element('thumbnail_idx', $form_data, []);
        $thumbnail_data = [];

        $upload_sub_dir = config_item('upload_prefix_dir') . '/etc/hotclip/' . date('Y') . '/' . date('md');
        $uploaded = $this->upload->uploadFile('file', ['thumbnail'], $this->_getAttachImgNames('thumbnail'), $upload_sub_dir
            ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);

        foreach ($arr_link_type as $key => $val) {
            if (empty($arr_thumbnail_idx[$key]) === true) {
                //insert
                if (empty($uploaded[$key]) === false) {
                    $thumbnail_data['insert'][] = [
                        'PhcIdx' => element('idx', $form_data),
                        'LinkType' => (empty(element('link_type', $form_data, 'Y')[$key]) === true) ? '' : element('link_type', $form_data, 'Y')[$key],
                        'LinkUrl' => (empty(element('link_url', $form_data, 'Y')[$key]) === true) ? '' : element('link_url', $form_data, 'Y')[$key],
                        'ThumbnailPath' => $this->upload->_upload_url . $upload_sub_dir . '/',
                        'ThumbnailFileName' => $uploaded[$key]['orig_name'],
                        'ThumbnailRealName' => $uploaded[$key]['client_name'],
                        'IsStatus' => element('IsStatus', $form_data, 'Y'),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        'RegIp' => $this->input->ip_address()
                    ];
                }
            } else {
                //update
                $thumbnail_data['update'][$key] = [
                    'PhctIdx' => $arr_thumbnail_idx[$key],
                    'LinkType' => (empty(element('link_type', $form_data, 'Y')[$key]) === true) ? '' : element('link_type', $form_data, 'Y')[$key],
                    'LinkUrl' => (empty(element('link_url', $form_data, 'Y')[$key]) === true) ? '' : element('link_url', $form_data, 'Y')[$key],
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];
                if (empty($uploaded[$key]) === false) {
                    $thumbnail_data['update'][$key] = array_merge($thumbnail_data['update'][$key], [
                        'ThumbnailPath' => $this->upload->_upload_url . $upload_sub_dir . '/',
                        'ThumbnailFileName' => $uploaded[$key]['orig_name'],
                        'ThumbnailRealName' => $uploaded[$key]['client_name'],
                    ]);
                }
            }
        }
        
        return $thumbnail_data;
    }

    /**
     * 핫클립 데이터 셋팅
     * @param array $form_data
     * @param string $mode
     * @return array
     */
    private function _setInputData($form_data = [],$mode = 'add')
    {
        $prof_subject_idx = element('prof_subject_idx',$form_data)[0];
        $_arr_prof_subject_idx = explode('_', $prof_subject_idx);
        $input_data = [
            'SiteCode' => element('site_code',$form_data),
            'CateCode' => element('cate_code',$form_data),
            'SubjectIdx' => element('1', $_arr_prof_subject_idx),
            'ProfIdx' => element('0', $_arr_prof_subject_idx),
            'ProfBtnIsUse' => element('prof_btn_isUse',$form_data),
            'CurriculumBtnIsUse' => element('curriculum_btn_is_use',$form_data),
            'StudyCommentBtnIsUse' => element('studycomment_btn_is_use',$form_data),
            'IsStatus' => element('is_status',$form_data,'Y'),
        ];

        if ($mode == 'add') {
            $query_string = "Max(OrderNum) as MaxOrderNum FROM {$this->_table['professor_hot_clip']} WHERE SiteCode = ?";
            $result = $this->_conn->query('select '.$query_string,element('site_code',$form_data))->row_array();

            $input_data = array_merge($input_data,[
                'OrderNum' => (empty($result['MaxOrderNum']) === true) ? 1 : $result['MaxOrderNum'] + 1,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);
        } else {
            $input_data = array_merge($input_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);
        }
        return $input_data;
    }

    private function _getAttachImgNames($set_name = 'image')
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 0; $i <= 10; $i++) {
            $attach_file_names[] = $set_name . '_' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}