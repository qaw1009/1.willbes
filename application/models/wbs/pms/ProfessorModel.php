<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = [
        'professor' => 'wbs_pms_professor',
        'professor_r_cp' => 'wbs_pms_professor_r_cp',
        'cp' => 'wbs_sys_cp',
        'admin' => 'wbs_sys_admin'
    ];
    // 첨부 이미지 수
    public $_attach_img_cnt = 4;

    public function __construct()
    {
        parent::__construct('wbs');
        // 사용 모델 로드
        $this->load->loadModels(['sys/admin']);
    }

    /**
     * 교수 기본정보 목록 조회
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
            $column = 'P.wProfIdx, P.wProfId, P.wProfName, P.wContentCcd, P.wIsUse, P.wRegDatm, P.wRegAdminIdx, A.wAdminName as wRegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['professor'] . ' as P
                left join ' . $this->_table['admin'] . ' as A 
                    on P.wRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where P.wIsStatus = "Y"  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교수별 CP사 목록 조회
     * @param int $prof_idx
     * @return array
     */
    public function listProfessorCp($prof_idx = 0)
    {
        $prof_idx = (is_null($prof_idx) === true) ? 0 : $prof_idx;
        $column = 'C.wCpIdx, C.wCpName, ifnull(PC.wCpIdx, 0) as wPCpIdx';
        $from = '
            from ' . $this->_table['cp'] . ' as C 
                left join ' . $this->_table['professor_r_cp'] . ' as PC
                    on C.wCpIdx = PC.wCpIdx and PC.wIsStatus = "Y" and PC.wProfIdx = ?	
            where C.wIsUse = "Y" and C.wIsStatus = "Y"        
        ';
        $order_by_offset_limit = ' order by C.wCpIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit, [$prof_idx]);

        return $query->result_array();
    }

    /**
     * 교수 코드/이름 목록 조회
     * @return array
     */
    public function getProfessorArray()
    {
        return $this->_conn->getListResult($this->_table['professor'], 'wProfIdx, wProfId, wProfName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wProfName' => 'asc'
        ]);
    }

    /**
     * 교수 기본정보 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findProfessor($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['professor'], $column, $arr_condition);
    }

    /**
     * 교수 기본정보 수정 폼에 필요한 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function findProfessorForModify($prof_idx)
    {
        $column = 'P.wProfIdx, P.wProfId, P.wProfName, P.wProfNickName, P.wContentCcd, P.wSampleUrl, P.wProfProfile, P.wBookContent';
        $column .= ' , P.wAttachImgPath, P.wAttachImgName1, P.wAttachImgName2, P.wAttachImgName3, P.wAttachImgName4, P.wIsUse, P.wRegDatm, P.wRegAdminIdx, P.wUpdDatm, P.wUpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(P.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';
        //운영자 등록
        $column .=', (SELECT wProfIdx FROM wbs_sys_admin WHERE wProfIdx = P.wProfIdx) AS admin_reg_check ';


        return $this->_conn->getFindResult($this->_table['professor'] . ' as P', $column, [
            'EQ' => ['P.wProfIdx' => $prof_idx, 'P.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 교수 아이디 중복 여부 리턴
     * @param string $prof_id
     * @return bool true : 중복 / false : 중복된 아이디 없음
     */
    public function isDuplicateProfId($prof_id)
    {
        $count = $this->_conn->getListResult($this->_table['professor'], true, [
            'EQ' => ['wProfId' => $prof_id]
        ]);
        $count2 = $this->adminModel->isDuplicateAdminId($prof_id); //운영자 아이디 중복여부 : 교수등록시 운영자까지 등록하므로 미리 체크

        return ($count > 0 || $count2 > 0) ? true : false;
    }

    /**
     * 교수 기본정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 아이디 중복 체크
            if ($this->isDuplicateProfId(element('prof_id', $input)) === true) {
                throw new \Exception('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
            }

            $data = [
                'wProfId' => element('prof_id', $input),
                'wProfName' => element('prof_name', $input),
                'wProfNickName' => element('prof_nickname', $input),
                'wContentCcd' => element('content_ccd', $input),
                'wSampleUrl' => element('sample_url', $input),
                'wProfProfile' => element('prof_profile', $input),
                'wBookContent' => element('book_content', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            // 비밀번호 : 운영자 등록시 운영자 항목에서
            //$this->_conn->set('wProfPasswd', 'fn_hash("' . get_var(element('prof_passwd', $input), '1111') . '")', false);

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['professor']) === false) {
                throw new \Exception('교수 기본정보 등록에 실패했습니다.');
            }

            // 등록된 교수 식별자
            $prof_idx = $this->_conn->insert_id();

            // 교수 기본정보별 CP사 정보 등록
            if ($this->replaceProfessorCp(element('cp_idx', $input), $prof_idx) !== true) {
                throw new \Exception('CP사 정보 등록에 실패했습니다.');
            }

            // 첨부 이미지 업로드
            $data = [];
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;

            $uploaded = $this->upload->uploadFile('img', ['attach_img'], $this->_getAttachImgNames($prof_idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_imgs) {
                if (count($attach_imgs) > 0) {
                    $data{'wAttachImgName' . ($idx + 1)} = $attach_imgs['file_name'];
                }
            }

            // 첨부 이미지 정보 업데이트
            if (count($data) > 0) {
                $data['wAttachImgPath'] = $this->upload->_upload_url . $upload_sub_dir . '/';

                if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table['professor']) === false) {
                    throw new \Exception('교수 이미지 등록에 실패했습니다.');
                }
            }

            //운영자 등록하기
            if(element('admin_make', $input)==='Y') {
                $input = array_merge($input,[
                    'wProfIdx' => $prof_idx
                ]);

                if ($this->_makeAddAdmin($input) !== true) {
                    throw new \Exception('운영자 등록에 실패했습니다.');
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
     * 교수 기본정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $prof_idx = element('idx', $input);

            // 기존 교수 기본정보 조회
            $row = $this->findProfessorForModify($prof_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 백업 데이터 등록
            $this->addBakData($this->_table['professor'], ['wProfIdx' => $prof_idx]);

            $data = [
                'wProfName' => element('prof_name', $input),
                'wProfNickName' => element('prof_nickname', $input),
                'wContentCcd' => element('content_ccd', $input),
                'wSampleUrl' => element('sample_url', $input),
                'wProfProfile' => element('prof_profile', $input),
                'wBookContent' => element('book_content', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            // 비밀번호 입력시
            if (empty(element('prof_passwd', $input)) === false) {
                $this->_conn->set('wProfPasswd', 'fn_hash("' . element('prof_passwd', $input) . '")', false);
            }

            if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table['professor']) === false) {
                throw new \Exception('교수 기본정보 수정에 실패했습니다.');
            }

            // 교수 기본정보별 CP사 정보 등록
            if ($this->replaceProfessorCp(element('cp_idx', $input), $prof_idx) !== true) {
                throw new \Exception('CP사 정보 등록에 실패했습니다.');
            }

            // 파일 업로드
            $data = [];
            $bak_uploaded_files = [];
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;

            // 첨부 이미지 삭제
            foreach (element('attach_img_delete', $input, []) as $img_idx) {
                $attach_img_url = $row['wAttachImgPath'] . $row{'wAttachImgName' . $img_idx};

                if (empty($attach_img_url) === false) {
                    $bak_uploaded_files[] = $attach_img_url;
                    $data{'wAttachImgName' . $img_idx} = '';
                }
            }

            // 첨부 이미지 업로드
            $uploaded = $this->upload->uploadFile('img', ['attach_img'], $this->_getAttachImgNames($prof_idx, false), $upload_sub_dir, 'overwrite:false');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_imgs) {
                if (count($attach_imgs) > 0) {
                    $img_idx = $idx + 1;
                    $data{'wAttachImgName' . $img_idx} = $attach_imgs['file_name'];

                    // 기존 업로드된 첨부 이미지 정보
                    $bak_uploaded_files[] = $row['wAttachImgPath'] . $row{'wAttachImgName' . $img_idx};
                }
            }

            // 수정, 삭제된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }
            
            // 첨부 이미지 정보 업데이트
            if (count($data) > 0) {
                $data['wAttachImgPath'] = $this->upload->_upload_url . $upload_sub_dir . '/';

                if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table['professor']) === false) {
                    throw new \Exception('교수 이미지 수정에 실패했습니다.');
                }
            }


            //운영자 등록하기
            if(element('admin_make', $input)==='Y') {
                $input = array_merge($input,[
                    'wProfIdx' => $prof_idx
                ]);

                if ($this->_makeAddAdmin($input) !== true) {
                    throw new \Exception('운영자 등록에 실패했습니다.');
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
     * 교수 기본정보별 CP사 등록
     * @param array $arr_cp_idx
     * @param $prof_idx
     * @return bool|string
     */
    public function replaceProfessorCp($arr_cp_idx = [], $prof_idx)
    {
        try {
            $_table = $this->_table['professor_r_cp'];
            $arr_cp_idx = (is_null($arr_cp_idx) === true) ? [] : array_values(array_unique($arr_cp_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 CP사 조회
            $data = $this->_conn->getListResult($_table, 'wCpIdx', ['EQ' => ['wProfIdx' => $prof_idx, 'wIsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'wCpIdx');

                // 기존 등록된 CP사 삭제 처리 (전달된 CP사 식별자 중에 기 등록된 CP사 식별자가 없다면 삭제 처리)
                foreach ($data as $ori_cp_idx) {
                    if (in_array($ori_cp_idx, $arr_cp_idx) === false) {
                        // 백업 데이터 등록
                        $this->addBakData($_table, ['wProfIdx' => $prof_idx, 'wCpIdx' => $ori_cp_idx]);

                        $is_update = $this->_conn->set([
                            'wIsStatus' => 'N',
                            'wUpdAdminIdx' => $admin_idx
                        ])->where('wProfIdx', $prof_idx)->where('wCpIdx', $ori_cp_idx)->update($_table);

                        if ($is_update === false) {
                            throw new \Exception('기 설정된 CP사 정보 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 CP사 식별자 중에 전달된 CP사 식별자가 없다면 등록 처리)
            foreach ($arr_cp_idx as $cp_idx) {
                if (in_array($cp_idx, $data) === false) {
                    $is_insert = $this->_conn->set([
                        'wProfIdx' => $prof_idx,
                        'wCpIdx' => $cp_idx,
                        'wRegAdminIdx' => $admin_idx
                    ])->insert($_table);

                    if ($is_insert === false) {
                        throw new \Exception('신규 CP사 정보 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 업로드 교수 이미지 파일명 배열 생성
     * @param $prof_idx
     * @param bool $is_add
     * @return array
     */
    private function _getAttachImgNames($prof_idx, $is_add = true)
    {
        $attach_img_names = [];
        $attach_img_postfix = ($is_add !== true) ? '_' . time() : '';

        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_img_names[] = 'prof_' . $prof_idx . '_0' . $i . $attach_img_postfix;
        }

        return $attach_img_names;
    }


    /**
     * 운영자 등록 : 교수 등록시 동시 생성
     * @param array $input
     * @param string $type
     * @return array|bool
     */
    public function _makeAddAdmin($input = [])
    {
        try {
            // 아이디 중복 체크
            if ($this->adminModel->isDuplicateAdminId(element('prof_id', $input)) === true) {
                throw new \Exception('이미 사용중인 운영자 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
            }

            $data = [
                'wAdminId' => element('prof_id', $input),
                'wAdminPasswd' => element('prof_id', $input),
                'wAdminName' => element('prof_name', $input),
                'wAdminPhone1' => '010',
                'wAdminPhone2' => '0000',
                'wAdminPhone3' => '0000',
                'wAdminMail' => 'empty@empty',
                'wAdminDeptCcd' => '109001',        //WCA 소속
                'wAdminPositionCcd' => '110010',    //교수
                'wAdminDesc' => '자동 생성 계정',
                'wIsUse' => element('is_use', $input),
                'wIsApproval' => 'Y',
                'wRoleIdx' => '1013',
                'wProfIdx' => element('wProfIdx', $input),      //교수식별자 삽입
                'wCertType' => 'E',      //인증제외
            ];

            if ($this->adminModel->_addAdmin($data) !== true) {
                //throw new \Exception('운영자 등록에 실패했습니다.');
                return false;
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }


}
