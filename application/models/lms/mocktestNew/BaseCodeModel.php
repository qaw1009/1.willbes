<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCodeModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
        'mock_base' => 'lms_mock',
        'mock_subject' => 'lms_mock_r_subject'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function list()
    {
        $order_by = $this->_conn->makeOrderBy(['C1.SiteCode' => 'ASC', 'C1.OrderNum' => 'ASC', 'SC.OrderNum' => 'ASC'])->getMakeOrderBy();
        $arr_condition['IN']['S.SiteCode'] = get_auth_site_codes();

        $column = '
            M.*, S.SiteName, A.wAdminName,
            C1.CateCode AS gCateCode, C1.CateName AS gCateName, C1.IsUse AS gIsUse,
            SC.Ccd AS mCateCode, SC.CcdName AS mCateName, SC.IsUse AS mIsUse
        ';
        $from = "
            FROM {$this->_table['site']} AS S
            JOIN {$this->_table['category']} AS C1 ON S.SiteCode = C1.SiteCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            RIGHT JOIN {$this->_table['mock_base']} AS M ON M.CateCode = C1.CateCode AND M.IsStatus = 'Y'
            JOIN {$this->_table['sys_code']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON M.RegAdminIdx = A.wAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);

        return $query->result_array();
    }

    /**
     * 모의고사 기본정보 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findMockData($arr_condition)
    {
        $column = '*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_base']} AS MB
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MB.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MB.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 직렬 등록
     */
    public function storeKind($input)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = array(
                'SiteCode' => element('site',$input),
                'CateCode' => element('cateD1',$input),
                'Ccd' => element('cateD2',$input),
                'OrderNum' => element('orderNum',$input),
                'IsUse' => element('isUse',$input),
                'RegAdminIdx' => element('admin_idx',$input),
                'RegIp' => $this->input->ip_address(),
                'RegDatm' => date("Y-m-d H:i:s")
            );

            $table = $this->_table['mock_base'];
            $keys = "`". implode("`, `", array_keys($input_data)) ."`";
            $values = "'". implode("', '", $this->_conn->escape_str(array_values($input_data))) ."'";
            $exist_where = "`CateCode` = '". $this->_conn->escape_str($input_data['CateCode']) ."' AND `Ccd` = '". $this->_conn->escape_str($input_data['Ccd']) ."'";

            $sql = "INSERT INTO $table ($keys) SELECT $values FROM DUAL
					WHERE NOT EXISTS (SELECT * FROM $table WHERE $exist_where)";
            $this->_conn->query($sql);
            if ($this->_conn->affected_rows() < 1) {
                throw new Exception('이미 존재하는 직렬입니다. 정보변경을 해 주세요.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 직렬 수정
     * @param $input_data
     * @return array|bool
     */
    public function updateKind($input_data)
    {
        $this->_conn->trans_begin();
        try {
            $input = [
                'OrderNum' => element('orderNum',$input_data),
                'IsUse' => element('isUse',$input_data),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['MmIdx' => element('idx', $input_data)];
            $this->_conn->set($input)->where($where);
            if ($this->_conn->update($this->_table['mock_base']) === false) {
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
     * 직렬 사용,미사용 전환
     * @param $input_data
     * @return bool
     */
    public function useToggle($input_data)
    {
        $this->_conn->trans_begin();
        try {
            $input = [
                'IsUse' => (element('isUse', $input_data) == 'Y') ? 'N' : 'Y',
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $where = ['MmIdx' => element('idx', $input_data)];
            $this->_conn->set($input)->where($where);
            if ($this->_conn->update($this->_table['mock_base']) === false) {
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
     * 과목 저장/수정
     * @param $input_data
     * @return array|bool
     */
    public function storeSubject($input_data)
    {
        $this->_conn->trans_begin();
        try {
            // 저장되어 있지 않은 과목 저장
            $result = [];
            if (empty(element('subjectIdx',$input_data)) === false) {
                foreach ($this->input->post('subjectIdx') as $key => $it) {
                    $data = [
                        'MmIdx' => element('idx',$input_data),
                        'SubjectIdx' => $it,
                        'SubjectType' => element('sjType',$input_data),
                        'IsUse' => 'Y',
                        'RegIp' => $this->input->ip_address(),
                        'RegDatm' => date("Y-m-d H:i:s"),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    ];

                    $keys = "`" . implode("`, `", array_keys($data)) . "`";
                    $values = "'" . implode("', '", $this->_conn->escape_str(array_values($data))) . "'";
                    $exist_where = "`MmIdx` = '" . $this->_conn->escape_str(element('idx',$input_data)) . "'";
                    $exist_where .= " AND `SubjectIdx` = '" . $this->_conn->escape_str($it) . "'";
                    $exist_where .= " AND `SubjectType` = '" . $this->_conn->escape_str(element('sjType',$input_data)) . "'";
                    $sql = "INSERT INTO {$this->_table['mock_subject']} ($keys) SELECT $values FROM DUAL
					        WHERE NOT EXISTS (SELECT * FROM {$this->_table['mock_subject']} WHERE $exist_where)";
                    $result[$key] = $this->_conn->query($sql);
                }
            }
            foreach ($result as $key => $val) {
                if ($val === false) {
                    throw new Exception('과목 저장에 실패했습니다.');
                }
            }

            // IsUse 모두 미사용으로 Update
            $data = array(
                'IsUse' => 'N',
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = ['MmIdx' => element('idx',$input_data), 'SubjectType' => element('sjType',$input_data)];
            $this->_conn->update($this->_table['mock_subject'], $data, $where);

            // 체크된 항목 IsUse 사용으로 Update
            if (empty(element('subjectIdx',$input_data)) === false) {
                $data = [
                    'IsUse' => 'Y',
                    'UpdDatm' => date("Y-m-d H:i:s"),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                $where = ['MmIdx' => element('idx',$input_data), 'SubjectType' => element('sjType',$input_data)];
                $result = $this->_conn->where($where)
                    ->where_in('SubjectIdx', element('subjectIdx',$input_data))
                    ->update($this->_table['mock_subject'], $data);
            }
            if ($result === false) {
                throw new Exception('과목 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}