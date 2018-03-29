<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectModel extends WB_Model
{
    private $_table = 'lms_product_subject';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 과목 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSubject($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $colum = 'PS.SubjectIdx, PS.SiteCode, PS.SubjectName, PS.OrderNum, PS.IsUse, PS.RegDatm, PS.RegAdminIdx, S.SiteName';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PS.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['PS.IsStatus'] = 'Y';
        $arr_condition['EQ']['S.IsUse'] = 'Y';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['IN']['PS.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table . ' as PS', 'inner', 'lms_site as S', 'PS.SiteCode = S.SiteCode'
            , $colum, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 과목 수정 폼을 위한 데이터 조회
     * @param $subject_idx
     * @return array
     */
    public function findSubjectForModify($subject_idx)
    {
        $colum = 'PS.SubjectIdx, PS.SiteCode, PS.SubjectName, PS.OrderNum, PS.Keyword, PS.IsUse, PS.RegDatm, PS.RegAdminIdx, PS.UpdDatm, PS.UpdAdminIdx';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PS.RegAdminIdx) as RegAdminName';
        $colum .= ' , if(PS.UpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = PS.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as PS', $colum, [
            'EQ' => ['PS.SubjectIdx' => $subject_idx]
        ]);
    }

    /**
     * 사이트 코드별 과목 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    public function getSubjectOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table, 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }

    /**
     * 과목 등록
     * @param array $input
     * @return array|bool
     */
    public function addSubject($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->getSubjectOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'SubjectName' => element('subject_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 과목 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySubject($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $subject_idx = element('idx', $input);

            // 기존 과목 정보 조회
            $row = $this->findSubjectForModify($subject_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $order_num = get_var(element('order_num', $input), $this->getSubjectOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SubjectName' => element('subject_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx,
            ];

            // 과목 수정
            if ($this->_conn->set($data)->where('SubjectIdx', $subject_idx)->update($this->_table) === false) {
                throw new \Exception('과목 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifySubjectReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $subject_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->where('SubjectIdx', $subject_idx);

                if ($this->_conn->update($this->_table) === false) {
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
}
