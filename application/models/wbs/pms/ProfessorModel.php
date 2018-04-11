<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = 'wbs_pms_professor';
    // 첨부 이미지 수
    public $_attach_img_cnt = 4;

    public function __construct()
    {
        parent::__construct('wbs');
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
            from ' . $this->_table . ' as P
                left join wbs_sys_admin as A 
                on P.wRegAdminIdx = A.wAdminIdx
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
            from wbs_sys_cp as C left join wbs_pms_professor_r_cp as PC
                on C.wCpIdx = PC.wCpIdx and PC.wIsStatus = "Y" and PC.wProfIdx = ?	
            where C.wIsStatus = "Y" and C.wIsUse = "Y"       
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
        return $this->_conn->getListResult($this->_table, 'wProfIdx, wProfId, wProfName', [
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

        return $this->_conn->getFindResult($this->_table, $column, $arr_condition);
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
        $column .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = P.wRegAdminIdx) as wRegAdminName';
        $column .= ' , if(P.wUpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = P.wUpdAdminIdx)) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as P', $column, [
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
        $count = $this->_conn->getListResult($this->_table, true, [
            'EQ' => ['wProfId' => $prof_id]
        ]);

        return ($count > 0) ? true : false;
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

            // 비밀번호
            $this->_conn->set('wProfPasswd', 'fn_hash_data("' . get_var(element('prof_passwd', $input), '1111') . '", 256)', false);

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
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

                if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table) === false) {
                    throw new \Exception('교수 이미지 등록에 실패했습니다.');
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
            $this->addBakData($this->_table, ['wProfIdx' => $prof_idx]);

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
                $this->_conn->set('wProfPasswd', 'fn_hash_data("' . element('prof_passwd', $input) . '", 256)', false);
            }

            if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table) === false) {
                throw new \Exception('교수 기본정보 수정에 실패했습니다.');
            }

            // 교수 기본정보별 CP사 정보 등록
            if ($this->replaceProfessorCp(element('cp_idx', $input), $prof_idx) !== true) {
                throw new \Exception('CP사 정보 등록에 실패했습니다.');
            }

            // 첨부 이미지 삭제
            $data = [];
            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;

            foreach (element('attach_img_delete', $input, []) as $img_idx) {
                $attach_img_url = $row['wAttachImgPath'] . $row{'wAttachImgName' . $img_idx};

                if (empty($attach_img_url) === false) {
                    $attach_img_realpath =  $this->upload->upload_path . $upload_sub_dir . '/' . $row{'wAttachImgName' . $img_idx};

                    if (unlink($attach_img_realpath) === false) {
                        throw new \Exception('교수 이미지 삭제에 실패했습니다.');
                    }

                    $data{'wAttachImgName' . $img_idx} = '';
                }
            }

            // 첨부 이미지 업로드
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

                if ($this->_conn->set($data)->where('wProfIdx', $prof_idx)->update($this->_table) === false) {
                    throw new \Exception('교수 이미지 수정에 실패했습니다.');
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
            $_table = 'wbs_pms_professor_r_cp';
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
     * @return array
     */
    private function _getAttachImgNames($prof_idx)
    {
        $attach_img_names = [];
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_img_names[] = 'prof_' . $prof_idx . '_0' . $i;
        }

        return $attach_img_names;
    }
}
