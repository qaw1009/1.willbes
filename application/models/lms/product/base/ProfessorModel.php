<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'professor_reference' => 'lms_professor_reference',
        'professor_r_subject_r_category' => 'lms_professor_r_subject_r_category',
        'professor_calculate_rate' => 'lms_professor_calculate_rate',
        'admin' => 'wbs_sys_admin'
    ];
    private $_refer_type = [
        'string' => ['ot_url', 'wsample_url', 'sample_url1', 'sample_url2', 'sample_url3', 'cafe_url'],
        'attach' => ['prof_index_img', 'prof_detail_img', 'lec_list_img', 'lec_detail_img', 'lec_review_img']
    ];
    private $_ccd = [
        'LearnPattern' => '615'
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
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                U.*, ifnull(C.CateName, "삭제된 카테고리") as CateName, ifnull(PS.SubjectName, "삭제된 과목") as SubjectName
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
                        , WP.wProfIdx, WP.wProfId, WP.wProfName, WP.wIsUse, S.SiteName, A.wAdminName as RegAdminName
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
                        left join ' . $this->_table['admin'] . ' as A
                            on P.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
                    where P.IsStatus = "Y" 
                        and WP.wIsStatus = "Y" 
                        and S.IsStatus = "Y"
                ) I 
            ) U left join ' . $this->_table['category'] . ' as C
                    on U.SiteCode = C.SiteCode and U.CateCode = C.CateCode and C.IsStatus = "Y"
                left join ' . $this->_table['subject'] . ' as PS
                    on U.SiteCode = PS.SiteCode and U.SubjectIdx = PS.SubjectIdx and PS.IsStatus = "Y"			
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['U.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교수 카테고리 + 과목 매핑 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function listProfessorSubjectMapping($prof_idx)
    {
        $column = '
            PSC.CateCode, PSC.SubjectIdx
                , C.CateName, PS.SubjectName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName, " > ", PS.SubjectName) as CateSubjectRouteName            
        ';
        $from = '
            from ' . $this->_table['professor_r_subject_r_category'] . ' as PSC
                inner join ' . $this->_table['category'] . ' as C
                    on PSC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx        
        ';
        $where = ' where PSC.ProfIdx = ? and PSC.IsStatus = "Y" and C.IsUse = "Y" and C.IsStatus = "Y" and PS.IsUse = "Y" and PS.IsStatus = "Y"';
        $order_by_offset_limit = ' order by PSC.PcIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$prof_idx])->result_array();

        $results = [];
        foreach ($query as $row) {
            $results[$row['CateCode'] . '_' . $row['SubjectIdx']] = $row['CateSubjectRouteName'];
        }
        
        return $results;
    }

    /**
     * 교수 참조 자료 조회
     * @param $prof_idx
     * @param string $key_type [idx : ReferIdx => ReferType, type : ReferType => ReferValue]
     * @return array
     */
    public function listProfessorRefer($prof_idx, $key_type = 'idx')
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
     * 교수 강사료 정산률 등록 대상 조회
     * @return array
     */
    public function listProfessorCalcRateTarget()
    {
        $results = [];
        $list = $this->_conn->getListResult($this->_table['code'], 'Ccd, CcdName, json_value(CcdEtc, "$.type") as OnOffType', [
            'EQ' => ['GroupCcd' => $this->_ccd['LearnPattern'], 'json_value(CcdEtc, "$.is_calc")' => 'Y', 'IsUse' => 'Y', 'IsStatus' => 'Y']
        ]);

        foreach ($list as $row) {
            $results[$row['OnOffType']][$row['Ccd']] = $row['CcdName'];
        }

        return $results;
    }

    /**
     * 교수 강사료 정산률 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function listProfessorCalcRate($prof_idx)
    {
        $results = [];
        $column = '
            PCR.ProfCalcIdx, PCR.LearnPatternCcd, left(PCR.ApplyStartDatm, 10) as ApplyStartDate, left(PCR.ApplyEndDatm, 10) as ApplyEndDate
                , PCR.CalcRate, PCR.ContribRate, PCR.CalcMemo
                , json_value(C.CcdEtc, "$.type") as OnOffType            
        ';
        
        $list = $this->_conn->getJoinListResult($this->_table['professor_calculate_rate'] . ' as PCR', 'inner', $this->_table['code'] . ' as C'
            , 'PCR.LearnPatternCcd = C.Ccd'
            , $column, ['EQ' => ['PCR.ProfIdx' => $prof_idx, 'PCR.IsStatus' => 'Y', 'C.GroupCcd' => $this->_ccd['LearnPattern'], 'C.IsUse' => 'Y', 'C.IsStatus' => 'Y']]
            , null, null, ['PCR.ProfCalcIdx', 'asc']
        );

        foreach ($list as $row) {
            $results[$row['OnOffType']][$row['LearnPatternCcd']][] = $row;
        }

        return $results;        
    }

    /**
     * 교수 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    public function getProfessorArray($site_code = '')
    {
        $arr_condition = ['EQ' => ['P.IsUse' => 'Y', 'P.IsStatus' => 'Y', 'WP.wIsUse' => 'Y', 'WP.wIsStatus' => 'Y']];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['P.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getJoinListResult($this->_table['professor'] . ' as P', 'inner', $this->_table['pms_professor'] . ' as WP'
            , 'P.wProfIdx = WP.wProfIdx'
            , 'P.SiteCode, P.ProfIdx, WP.wProfName', $arr_condition
            , null, null, ['P.SiteCode' => 'asc', 'P.ProfIdx' => 'asc']
        );

        return (empty($site_code) === false) ? array_pluck($data, 'wProfName', 'ProfIdx') : $data;
    }

    /**
     * 교수 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findProfessor($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['professor'], $column, $arr_condition);
    }
    
    /**
     * 교수 정보 수정 폼에 필요한 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function findProfessorForModify($prof_idx)
    {
        $column = '
            P.ProfIdx, P.wProfIdx, P.SiteCode, P.ProfNickName, P.ProfCurriculum, P.UseBoardJson, P.IsUse, P.RegDatm, P.RegAdminIdx, P.UpdDatm, P.UpdAdminIdx
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard
                , WP.wProfName, WP.wProfId, WP.wProfProfile, WP.wBookContent, WP.wIsUse 
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(P.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName        
        ';

        return $this->_conn->getJoinFindResult($this->_table['professor'] . ' as P', 'inner', $this->_table['pms_professor'] . ' as WP', 'P.wProfIdx = WP.wProfIdx'
            , $column, ['EQ' => ['P.ProfIdx' => $prof_idx, 'P.IsStatus' => 'Y', 'WP.wIsStatus' => 'Y']]);
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
                throw new \Exception('교수 정보 등록에 실패했습니다.');
            }

            // 등록된 교수 식별자
            $prof_idx = $this->_conn->insert_id();

            // 카테고리 정보 등록
            $is_subject_mapping = $this->_replaceProfessorSubjectMapping(element('subject_mapping_code', $input), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_subject_mapping);
            }

            // 교수 참조자료 등록
            $refer_input = elements($this->_refer_type['string'], $input);
            $is_refer = $this->_replaceProfessorRefer($refer_input, [], $prof_idx);
            if ($is_refer !== true) {
                throw new \Exception($is_refer);
            }
            
            // 교수영역 이미지 업로드
            $is_upload = $this->_attachProfessorImg([], $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_upload);
            }

            // 강사료 정산 데이터 등록/수정
            $calc_rate_input = elements(['calc_rate', 'contrib_rate', 'apply_start_date', 'apply_end_date', 'calc_memo', 'learn_pattern_ccd', 'prof_calc_idx'], $input);
            $is_calc_rate = $this->_replaceProfessorCalcRate($calc_rate_input, [], $prof_idx);
            if ($is_calc_rate !== true) {
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
     * 교수 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $prof_idx = element('idx', $input);

            // 기존 교수 기본정보 조회
            $row = $this->findProfessor('ProfIdx', ['EQ' => ['ProfIdx' => $prof_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $data = [
                'ProfNickName' => element('prof_nickname', $input),
                'UseBoardJson' => $this->_getUseBoardJson(element('use_board', $input)),
                'ProfCurriculum' => element('prof_curriculum', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 데이터 수정
            if ($this->_conn->set($data)->where('ProfIdx', $prof_idx)->update($this->_table['professor']) === false) {
                throw new \Exception('교수 정보 수정에 실패했습니다.');
            }

            // 카테고리 정보 등록
            $is_subject_mapping = $this->_replaceProfessorSubjectMapping(element('subject_mapping_code', $input), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_subject_mapping);
            }

            // 교수 참조자료 조회
            $refer_data = $this->listProfessorRefer($prof_idx);

            // 교수 참조자료 등록/수정
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

            // 강사료 정산 데이터 등록/수정
            $calc_rate_input = elements(['calc_rate', 'contrib_rate', 'apply_start_date', 'apply_end_date', 'calc_memo', 'learn_pattern_ccd', 'prof_calc_idx'], $input);
            $is_calc_rate = $this->_replaceProfessorCalcRate($calc_rate_input, element('del_prof_calc_idx', $input, []), $prof_idx);
            if ($is_calc_rate !== true) {
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
     * @param array $arr_use_board
     * @return string
     */
    private function _getUseBoardJson($arr_use_board)
    {
        $results = [];
        foreach ($this->_bm_idx as $bm_idx) {
            $results[][$bm_idx] = in_array($bm_idx, (array) $arr_use_board) === true ? 'Y' : 'N';
        }

        return json_encode($results);
    }

    /**
     * 교수 참조자료 데이터 저장
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
                if (in_array($key, $arr_string_refer) === true) {
                    $data = [
                        'ReferValue' => $value,
                        'UpdAdminIdx' => $admin_idx
                    ];

                    $_refer_idx = array_search($key, $arr_string_refer);
                    if ($_refer_idx !== false) {
                        if ($this->_conn->set($data)->where('ReferIdx', $_refer_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_reference']) === false) {
                            throw new \Exception('참조 데이터 수정에 실패했습니다.');
                        }
                    }
                } else {
                    if (empty($value) === false) {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'ReferType' => $key,
                            'ReferValue' => $value,
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
     * 강사료 정산 데이터 저장
     * @param array $input
     * @param array $arr_del_prof_calc_idx [삭제할 강사료 정산 식별자 배열]
     * @param $prof_idx
     * @return bool|string
     */
    private function _replaceProfessorCalcRate($input = [], $arr_del_prof_calc_idx = [], $prof_idx)
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 강사료 정산 등록/수정
            foreach ($input['learn_pattern_ccd'] as $idx => $learn_pattern_ccd) {
                $prof_calc_idx = element($idx, $input['prof_calc_idx']);
                $cal_rate = element($idx, $input['calc_rate']);
                $contrib_rate = element($idx, $input['contrib_rate']);
                $apply_start_date = element($idx, $input['apply_start_date']);
                $apply_end_date = element($idx, $input['apply_end_date']);

                // 필수 정보가 모두 있을 경우만 등록/수정
                if (strlen($cal_rate) > 0 && strlen($contrib_rate) > 0 && empty($apply_start_date) === false && empty($apply_end_date) === false) {
                    if (empty($prof_calc_idx) === true) {
                        // 데이터 등록
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'LearnPatternCcd' => $learn_pattern_ccd,
                            'ApplyStartDatm' => $apply_start_date . ' 00:00:00',
                            'ApplyEndDatm' => $apply_end_date . ' 23:59:59',
                            'CalcRate' => $cal_rate,
                            'ContribRate' => $contrib_rate,
                            'CalcMemo' => element($idx, $input['calc_memo'], ''),
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_calculate_rate']) === false) {
                            throw new \Exception('강사료 정산 데이터 등록에 실패했습니다.');
                        }
                    } else {
                        // 데이터 수정
                        $data = [
                            'ApplyStartDatm' => $apply_start_date . ' 00:00:00',
                            'ApplyEndDatm' => $apply_end_date . ' 23:59:59',
                            'CalcRate' => $cal_rate,
                            'ContribRate' => $contrib_rate,
                            'CalcMemo' => element($idx, $input['calc_memo'], ''),
                            'UpdAdminIdx' => $admin_idx
                        ];

                        if ($this->_conn->set($data)->where('ProfCalcIdx', $prof_calc_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_calculate_rate']) === false) {
                            throw new \Exception('강사료 정산 데이터 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 강사료 정산 데이터 삭제
            if (count($arr_del_prof_calc_idx) > 0) {
                $is_update = $this->_conn->set([
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $admin_idx
                ])->where_in('ProfCalcIdx', $arr_del_prof_calc_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_calculate_rate']);

                if ($is_update === false) {
                    throw new \Exception('강사료 정산 데이터 삭제에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 영역 이미지 업로드 및 데이터 저장
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
                $arr_delete_subject_mapping_code = array_diff($data, $arr_subject_mapping_code);
                if (count($arr_delete_subject_mapping_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('PcIdx', array_keys($arr_delete_subject_mapping_code))->where('ProfIdx', $prof_idx)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리_과목 식별자 중에 전달된 카테고리_과목 식별자가 없다면 등록 처리)
            $arr_insert_subject_mapping_code = array_diff($arr_subject_mapping_code, $data);
            foreach ($arr_insert_subject_mapping_code as $subject_mapping_code) {
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수영역 이미지 삭제
     * @param $img_type
     * @param $prof_idx
     * @return array|bool
     */
    public function removeImg($img_type, $prof_idx)
    {
        $this->_conn->trans_begin();

        try {
            // 데이터 조회
            $row = $this->_conn->getFindResult($this->_table['professor_reference'], 'ReferIdx, ReferValue', [
                'EQ' => ['ProfIdx' => $prof_idx, 'ReferType' => $img_type, 'IsStatus' => 'Y']    
            ]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 이미지 삭제
            $this->load->helper('file');

            $real_img_path = public_to_upload_path($row['ReferValue']);
            if (@unlink($real_img_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }

            // 데이터 수정
            $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $this->session->userdata('admin_idx'))
                ->where('ReferIdx', $row['ReferIdx'])->update($this->_table['professor_reference']);
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
