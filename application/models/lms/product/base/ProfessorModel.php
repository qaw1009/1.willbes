<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'professor_reference' => 'lms_professor_reference',
        'professor_r_subject_r_category' => 'lms_professor_r_subject_r_category',
        'admin' => 'wbs_sys_admin'
    ];
    private $_refer_type = [
        'string' => ['ot_url', 'wsample_url', 'sample_url1', 'sample_url2', 'sample_url3', 'cafe_url'],
        'attach' => ['prof_index_img', 'prof_detail_img', 'lec_list_img', 'lec_detail_img', 'lec_review_img']
    ];
    public $_bm_idx = [
        'notice' => 63, 'qna' => 66, 'data' => 69
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 교수관리 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listProfessor($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $colum = '
                U.*, C.CateName, PS.SubjectName
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard                
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from (
                select I.*, substring_index(I.SubjectMapping, "_", 1) as CateCode, substring_index(I.SubjectMapping, "_", -1) as SubjectIdx
                from (
                    select P.ProfIdx, P.SiteCode, P.UseBoardJson, P.IsUse, P.RegDatm, P.RegAdminIdx
                        , WP.wProfIdx, WP.wProfId, WP.wProfName, S.SiteName, A.wAdminName as RegAdminName
                        , (select concat(CateCode, "_", SubjectIdx)
                            from ' . $this->_table['professor_r_subject_r_category'] . '
                            where ProfIdx = P.ProfIdx and IsStatus = "Y"
                            group by CateCode, SubjectIdx
                            order by max(PcIdx) asc limit 1		
                          ) as SubjectMapping
                    from ' . $this->_table['professor'] . ' as P
                        inner join ' . $this->_table['pms_professor'] . ' as WP
                            on P.wProfIdx = WP.wProfIdx
                        inner join ' . $this->_table['site'] . ' as S
                            on P.SiteCode = S.SiteCode
                        inner join ' . $this->_table['admin'] . ' as A
                            on P.RegAdminIdx = A.wAdminIdx
                    where P.IsStatus = "Y" 
                        and WP.wIsUse = "Y" and WP.wIsStatus = "Y" 
                        and S.IsUse = "Y" and S.IsStatus = "Y"
                ) I 
            ) U inner join ' . $this->_table['category'] . ' as C
                    on U.SiteCode = C.SiteCode and U.CateCode = C.CateCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on U.SiteCode = PS.SiteCode and U.SubjectIdx = PS.SubjectIdx			
            where C.IsUse = "Y" and C.IsStatus = "Y" 
                and PS.IsUse = "Y" and PS.IsStatus = "Y"  
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['U.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 등록된 교수 참조데이터 리턴
     * @param $prof_idx
     * @param string $key_type [idx : ReferIdx => ReferType, type : ReferType => ReferValue]
     * @return array
     */
    public function listPrefessorRefer($prof_idx, $key_type = 'idx')
    {
        $results = [];
        if ($key_type == 'idx') {
            $_key = 'ReferIdx';
            $_value = 'ReferType';
        } else {
            $_key = 'ReferType';
            $_value = 'ReferValue';
        }

        $data = $this->_conn->getListResult($this->_table['professor_reference'], 'ReferIdx, ReferType, ReferValue', [
            'EQ' => ['ProfIdx' => $prof_idx, 'IsStatus' => 'Y'],
        ]);

        foreach ($data as $idx => $row) {
            if (ends_with($row['ReferType'], '_img') === true) {
                $results['attach'][$row[$_key]] = $row[$_value];
            } else {
                $results['string'][$row[$_key]] = $row[$_value];
            }
        }

        return $results;
    }

    /**
     * 교수 등록
     * @param array $input
     * @return array|bool
     */
    public function addProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wProfIdx' => element('wprof_idx', $input),
                'SiteCode' => element('site_code', $input),
                'ProfNickName' => element('prof_nickname', $input),
                'UseBoardJson' => $this->_getUseBoardJson(element('use_board', $input)),
                'ProfCurriculum' => element('prof_curriculum', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['professor']) === false) {
                throw new \Exception('교수 기본정보 등록에 실패했습니다.');
            }

            // 등록된 교수 식별자
            $prof_idx = $this->_conn->insert_id();

            // 카테고리 정보 등록
            $is_subject_mapping = $this->_replaceProfessorSubjectMapping(element('subject_mapping_code', $input), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_subject_mapping);
            }

            // 교수 참조자료 조회
            $refer_data = $this->listPrefessorRefer($prof_idx);

            // 교수 참조자료 등록
            $refer_input = elements($this->_refer_type['string'], $input);
            $is_refer = $this->_replaceProfessorRefer($refer_input, element('string', $refer_data, []), $prof_idx);
            if ($is_refer !== true) {
                throw new \Exception($is_refer);
            }
            
            // 교수영역 이미지 업로드
            $is_upload = $this->_attachProfessorImg(element('attach', $refer_data, []), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_upload);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 교수 사용게시판 JSON 데이터 리턴
     * @param $arr_use_board
     * @return string
     */
    private function _getUseBoardJson($arr_use_board)
    {
        $results = [];
        foreach ($this->_bm_idx as $bm_idx) {
            $results[][$bm_idx] = in_array($bm_idx, $arr_use_board) === true ? 'Y' : 'N';
        }

        return json_encode($results);
    }

    /**
     * @param array $input [폼 참조 데이터 배열]
     * @param array $arr_string_refer [등록된 이미지를 제외한 참조 데이터 배열, ReferIdx => ReferType]
     * @param $prof_idx
     * @return bool|string
     */
    private function _replaceProfessorRefer($input = [], $arr_string_refer = [], $prof_idx)
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            foreach ($input as $key => $value) {
                if (empty($value) === false) {
                    if (in_array($key, $arr_string_refer) === true) {
                        $data = [
                            'ReferValue' => element($key, $input),
                            'UpdAdminIdx' => $admin_idx
                        ];

                        $_refer_idx = array_search($key, $arr_string_refer);
                        if ($_refer_idx !== false) {
                            if ($this->_conn->set($data)->where('ReferIdx', $_refer_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_reference']) === false) {
                                throw new \Exception('참조 데이터 수정에 실패했습니다.');
                            }
                        }
                    } else {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'ReferType' => $key,
                            'ReferValue' => element($key, $input),
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_reference']) === false) {
                            throw new \Exception('참조 데이터 등록에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 영역 이미지 업로드 및 참조자료 저장
     * @param array $arr_attach_refer [등록된 교수영역 이미지 데이터 배열, ReferIdx => ReferType]
     * @param $prof_idx
     * @return bool|string
     */
    private function _attachProfessorImg($arr_attach_refer = [], $prof_idx)
    {
        try {
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile('img', $this->_refer_type['attach'], [], $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_imgs) {
                if (count($attach_imgs) > 0) {
                    $_refer_type = $this->_refer_type['attach'][$idx];
                    if (in_array($_refer_type, $arr_attach_refer) === true) {
                        $data = [
                            'ReferValue' => $this->upload->_upload_url . $upload_sub_dir . '/' . $attach_imgs['file_name'],
                            'UpdAdminIdx' => $admin_idx
                        ];

                        $_refer_idx = array_search($_refer_type, $arr_attach_refer);
                        if ($_refer_idx !== false) {
                            if ($this->_conn->set($data)->where('ReferIdx', $_refer_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_reference']) === false) {
                                throw new \Exception('교수 영역 이미지 수정에 실패했습니다.');
                            }
                        }
                    } else {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'ReferType' => $this->_refer_type['attach'][$idx],
                            'ReferValue' => $this->upload->_upload_url . $upload_sub_dir . '/' . $attach_imgs['file_name'],
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_reference']) === false) {
                            throw new \Exception('교수 영역 이미지 등록에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 카테고리 과목 연결 데이터 저장
     * @param $arr_subject_mapping_code
     * @param $prof_idx
     * @return bool|string
     */
    private function _replaceProfessorSubjectMapping($arr_subject_mapping_code, $prof_idx)
    {
        $_table_key = 'professor_r_subject_r_category';
        $_arr_condition = ['ProfIdx' => $prof_idx, 'IsStatus' => 'Y'];

        try {
            $_table = $this->_table[$_table_key];
            $arr_subject_mapping_code = (is_null($arr_subject_mapping_code) === true) ? [] : array_values(array_unique($arr_subject_mapping_code));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 과목 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'PcIdx, CateCode, SubjectIdx, concat(CateCode, "_", SubjectIdx) as SubjectMappingCode', ['EQ' => $_arr_condition]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'SubjectMappingCode', 'PcIdx');

                // 기존 등록된 과목 연결 데이터 삭제 처리 (전달된 카테고리_과목 식별자 중에 기 등록된 카테고리_과목 식별자가 없다면 삭제 처리)
                foreach ($data as $ori_pc_idx => $ori_subject_mapping_code) {
                    if (in_array($ori_subject_mapping_code, $arr_subject_mapping_code) === false) {
                        $is_update = $this->_conn->set([
                            'IsStatus' => 'N',
                            'UpdAdminIdx' => $admin_idx
                        ])->where('PcIdx', $ori_pc_idx)->update($_table);;

                        if ($is_update === false) {
                            throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리_과목 식별자 중에 전달된 카테고리_과목 식별자가 없다면 등록 처리)
            foreach ($arr_subject_mapping_code as $subject_mapping_code) {
                if (in_array($subject_mapping_code, $data) === false) {
                    $_arr_subject_mapping_code = explode('_', $subject_mapping_code);

                    $is_insert = $this->_conn->set([
                        'ProfIdx' => $prof_idx,
                        'CateCode' => element('0', $_arr_subject_mapping_code),
                        'SubjectIdx' => element('1', $_arr_subject_mapping_code),
                        'RegAdminIdx' => $admin_idx,
                        'RegIp' => $this->input->ip_address()
                    ])->insert($_table);

                    if ($is_insert === false) {
                        throw new \Exception('카테고리 정보 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
